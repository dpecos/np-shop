<?php global $item, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
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
            <div style="float:left"><h1>Edici�n del producto <?php echo $item->id." - ".$item->name ?></h1></div>
            <?php if (isset($_GET['orderId'])) { ?>
            <div style="float:right"><a href="itemDetail.php?itemId=<?php echo $item->id ?>&orderId=<?php echo $_GET['orderId']?>">Volver a detalle del producto</a></div>
            <?php } else { ?>
            <div style="float:right"><a href="itemDetail.php?itemId=<?php echo $item->id ?>">Volver a detalle del producto</a></div>
    	    <?php } ?>
	    <?php } else { ?>
	        <div style="float:left"><h1>Edici�n del producto - Nuevo producto</h1></div>
            <div style="float:right"><a href="listItems.php">Volver a listado de productos</a></div>
	    <?php } ?>
        
	    <div style="clear:both"/>
		<?php if (isset($_POST['item_id'])) { ?>
			<h2><font color="green"><b>Producto modificado correctamente.</b></font></h2>
		<?php } ?> 
        <h2>Informaci�n del producto</h2>
        <center>
        <form method="post">
            <?php if (isset($item)) { ?>
                <input type="hidden" name="item_id" value="<?php echo $item->id ?>"/>
                <input type="hidden" name="item_retired" value="<?php echo $item->retired?"true":"false" ?>"/>
            <?php } else { ?>
                <input type="hidden" name="isNew" value="true"/>
            <?php } ?>
             
            <table boder="0" width="50%">
                <tr><td width="140px">Nombre:</td><td><input name="item_name" type="text" value="<?php echo $item->name ?>"/></td></tr>
                <?php if (isset($item)) { ?>
                <tr><td>Referencia:</td><td><?php echo $item->id ?></td></tr>
                <?php } else { ?>
                <tr><td>Referencia:</td><td><input type="text" name="item_id"/></td></tr>
                <?php } ?> 
                
                <tr><td>Precio:</td><td><input name="item_prize" type="text" value="<?php echo $item->prize ?>"/> &euro;</td></tr>
                <tr><td>Categor�a:</td><td>
                	<select name="item_categoryId">			
									<?php
									foreach ($categories as $cat) { 
									?>					    
			    					<option value="<?php echo $cat[0]?>" <?php echo $item->categoryId==$cat[0]?"selected":""?>><?php echo $cat[1]?></option>
									<?php
									}
									?>
		    					</select>
                </td></tr>
                <?php if (isset($item)) { ?>
                <tr><td>Stock:</td><td><?php echo $item->stock ?></td></tr>
                <?php } else { ?>
                <tr><td>Stock:</td><td><input type="text" name="item_stock"/></td></tr>
                <?php } ?> 
                
                <tr><td>Stock m�nimo:</td><td><input name="item_stockLimit" type="text" value="<?php echo $item->stockLimit ?>"/></td></tr>
                <tr><td>D�as de env�o:</td><td><input name="item_shippingDays" type="text" value="<?php echo $item->shippingDays ?>"/></td></tr>
                <tr><td>Env�o especial:</td><td><input type="checkbox" name="item_specialShipping" value="true" <?php echo $item->specialShipping?"checked":"" ?>/></td></tr>
                <?php if (showValue($item->specialShipping) || !isset($item)) { ?><tr><td>Coste de env�o especial:</td><td><input name="item_specialShippingCost" type="text" value="<?php echo $item->specialShippingCost ?>"/></td></tr><?php } ?>
                <tr><td>N�mero de orden:</td><td><input name="item_order" type="text" value="<?php echo $item->order ?>"/></td></tr>
                <tr><td>Retirado:</td><td><input type="checkbox" name="item_retired" value="true" <?php echo isset($item)?"disabled":""?> <?php echo $item->retired?"checked":"" ?>/></td></tr>
                <tr><td>Novedad:</td><td><input type="checkbox" name="item_new" value="true" <?php echo $item->new?"checked":"" ?>/></td></tr>
            </table>
            <br/><br/>
        </center>
        
        <h2>Caracter�sticas del producto</h2>
        <center>
            <table boder="0" width="80%">             
                <?php if (showValue($item->tradeMark) || !isset($item)) { ?><tr><td>Marca:</td><td><input name="item_tradeMark" type="text" value="<?php echo $item->tradeMark ?>"/></td></tr><?php } ?>
                <?php if (showValue($item->height) || !isset($item)) { ?><tr><td>Altura:</td><td><input name="item_height" type="text" value="<?php echo $item->height ?>"/> mm </td></tr><?php } ?>
    			<?php if (showValue($item->depth) || !isset($item)) { ?><tr><td>Profundidad:</td><td><input name="item_depth" type="text" value="<?php echo $item->depth ?>"/> mm </td></tr><?php } ?>
    			<?php if (showValue($item->length) || !isset($item)) { ?><tr><td>Longitud:</td><td><input name="item_length" type="text" value="<?php echo $item->length ?>"/> mm </td></tr><?php } ?>								    
    			<?php if (showValue($item->weight) || !isset($item)) { ?><tr><td>Peso:</td><td><input name="item_weight" type="text" value="<?php echo $item->weight ?>"/> gr </td></tr><?php } ?>								    
    			<tr><td width="140px">Descripci�n:</td><td><input name="item_description" type="text" value="<?php echo $item->description ?>"/></td></tr>
    			<?php if (showValue($item->complement) || !isset($item)) { ?><tr><td>Detalle 1</td><td><input name="item_complement" type="text" value="<?php echo $item->complement ?>"/></td></tr><?php } ?>
    			<?php if (showValue($item->complement2) || !isset($item)) { ?><tr><td>Detalle 2</td><td><input name="item_complement2" type="text" value="<?php echo $item->complement2 ?>"/></td></tr><?php } ?>    
            </table>
        </center>
        <input type="button" value="Guardar" onclick="javascript:storeItem()"/>
        </form>
    </body>
</html>