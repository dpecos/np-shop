<?php global $item, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            <?php include_once('javascript.js'); ?>
            function storeItem() {
                form = document.getElementsByTagName("form")[0];
                for (var i=0; i < form.elements.length; i++) {
					var element = form.elements[i];
					if (element.type == "checkbox" && !element.checked) {
						element.value = "false";
						element.checked = true;
					}
				}
                form.submit();
            }
        </script>
    </head>
    <body>
        <?php if (isset($item)) { ?>
            <div style="float:left"><h1><?= sprintf(_("Edición del producto %s"), $item->id." - ".NP_get_i18n($item->name)) ?></h1></div>
            <div style="float:right">
                <? foreach ($npshop["avaliable_languages"] as $lang => $name) {?>
                <img src="../sites/davidbenavente/admin/flags/<?= $lang ?>.gif" onclick="javascript:changeLanguage('<?= $lang ?>');" alt="<?= _($name) ?>"/>&nbsp;
                <? } ?>&nbsp;&nbsp;            
                <?php if (isset($_GET['orderId'])) { ?>
                <a href="itemDetail.php?itemId=<?php echo $item->id ?>&orderId=<?php echo $_GET['orderId']?>"><?= _("Volver a detalle del producto") ?></a>
                <?php } else { ?>
                <a href="itemDetail.php?itemId=<?php echo $item->id ?>"><?= _("Volver a detalle del producto") ?></a>
        	    <?php } ?>
        	</div>
	    <?php } else { ?>
	        <div style="float:left"><h1><?= _("Edición del producto - Nuevo producto") ?></h1></div>
            <div style="float:right">
                <? foreach ($npshop["avaliable_languages"] as $lang => $name) {?>
                <img src="../sites/davidbenavente/admin/flags/<?= $lang ?>.gif" onclick="javascript:changeLanguage('<?= $lang ?>');" alt="<?= _($name) ?>"/>&nbsp;
                <? } ?>&nbsp;&nbsp;
                <a href="listItems.php"><?= _("Volver a listado de productos") ?></a>
            </div>
	    <?php } ?>
        
	    <div style="clear:both"/>
	    
            <?php if (isset($_POST['item_id'])) { ?>
		<h2><font color="green"><b><?= _("Producto modificado correctamente.") ?></b></font></h2>
	    <?php } ?> 
        <h2><?= _("Información del producto") ?></h2>
        <center>
        <form method="post">
            <?php if (isset($item)) { ?>
                <input type="hidden" name="item_id" value="<?php echo $item->id ?>"/>
                <input type="hidden" name="item_retired" value="<?php echo $item->retired?"true":"false" ?>"/>
            <?php } else { 
                $item = new Item();
            ?>
                <input type="hidden" name="isNew" value="true"/>
            <?php } ?>
             
            <table boder="0" width="50%">
                <tr><td width="140px"><?= _("Nombre:") ?></td><td><input name="item_name" type="text" value="<?php echo NP_get_i18n($item->name) ?>"/></td></tr>
                <?php if (isset($item->id)) { ?>
                <tr><td><?= _("Referencia:") ?></td><td><?php echo $item->id ?></td></tr>
                <?php } else { ?>
                <tr><td><?= _("Referencia:") ?></td><td><input type="text" name="item_id"/></td></tr>
                <?php } ?> 
                
                <tr><td><?= _("Precio:") ?></td><td><input name="item_prize" type="text" value="<?php echo $item->prize ?>"/> &euro;</td></tr>
                <tr><td><?= _("Categoría:") ?></td><td>
                	<select name="item_categoryId">			
									<?php
									foreach ($categories as $cat) { 
									?>					    
			    					<option value="<?php echo $cat[0]?>" <?php echo $item->categoryId==$cat[0]?"selected":""?>><?php echo NP_get_i18n($cat[1])?></option>
									<?php
									}
									?>
		    					</select>
                </td></tr>
                <?php if (isset($item->stock)) { ?>
                <tr><td><?= _("Stock:") ?></td><td><?php echo $item->stock ?></td></tr>
                <?php } else { ?>
                <tr><td><?= _("Stock:") ?></td><td><input type="text" name="item_stock"/></td></tr>
                <?php } ?> 
                
                <tr><td><?= _("Stock mínimo:") ?></td><td><input name="item_stockLimit" type="text" value="<?php echo $item->stockLimit ?>"/></td></tr>
                <tr><td><?= _("Días de envío:") ?></td><td><input name="item_shippingDays" type="text" value="<?php echo $item->shippingDays ?>"/></td></tr>
                <tr><td><?= _("Envío especial:") ?></td><td><input type="checkbox" name="item_specialShipping" value="true" <?php echo $item->specialShipping?"checked":"" ?>/></td></tr>
                <?php if (showValue($item->specialShipping) || !isset($item->id)) { ?><tr><td><?= _("Coste de envío especial:") ?></td><td><input name="item_specialShippingCost" type="text" value="<?php echo $item->specialShippingCost ?>"/></td></tr><?php } ?>
                <tr><td><?= _("Número de orden:") ?></td><td><input name="item_order" type="text" value="<?php echo $item->order ?>"/></td></tr>
                <tr><td><?= _("Retirado:") ?></td><td><input type="checkbox" name="item_retired" value="true" <?php echo isset($item->id)?"disabled":""?> <?php echo $item->retired?"checked":"" ?>/></td></tr>
                <tr><td><?= _("Novedad:") ?></td><td><input type="checkbox" name="item_new" value="true" <?php echo $item->new?"checked":"" ?>/></td></tr>
            </table>
            <br/><br/>
        </center>
        
        <h2><?= _("Características del producto") ?></h2>
        <center>
            <table boder="0" width="80%">             
                <tr><td><?= _("Marca:") ?></td><td><input name="item_tradeMark" type="text" value="<?php echo $item->tradeMark ?>"/></td></tr>
                <tr><td><?= _("Altura:") ?></td><td><input name="item_height" type="text" value="<?php echo $item->height ?>"/> mm </td></tr>
    			<tr><td><?= _("Profundidad:") ?></td><td><input name="item_depth" type="text" value="<?php echo $item->depth ?>"/> mm </td></tr>
    			<tr><td><?= _("Longitud:") ?></td><td><input name="item_length" type="text" value="<?php echo $item->length ?>"/> mm </td></tr>
    			<tr><td><?= _("Peso:") ?></td><td><input name="item_weight" type="text" value="<?php echo $item->weight ?>"/> gr </td></tr>
    			<tr><td width="140px"><?= _("Descripción:") ?></td><td><textarea rows="8" cols="100" name="item_description"><?php echo NP_get_i18n($item->description) ?></textarea></td></tr>
    			<tr><td><?= _("Detalle 1") ?></td><td><input name="item_complement" type="text" value="<?php echo NP_get_i18n($item->complement) ?>"/></td></tr>
    			<tr><td><?= _("Detalle 2") ?></td><td><input name="item_complement2" type="text" value="<?php echo NP_get_i18n($item->complement2) ?>"/></td></tr>    
            </table>
        </center>
        <input type="button" value="<?= _("Guardar") ?>" onclick="javascript:storeItem()"/>
        </form>
    </body>
</html>
