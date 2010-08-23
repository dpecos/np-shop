<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
		    <?php include_once('javascript.js'); ?>
        </script>
    </head>
    <body>
        <div style="float:left; width:35%"><h1><?= _("Listado de productos") ?></h1></div>
        <div style="float:left; text-align:center; width:35%">
            <br/><br/><a href="editItem.php"><?= _("Insertar nuevo producto") ?></a> - <a href="index.php"><?=_("Volver")?></a>
        </div>
        <div style="float:right; width:30%; text-align:right;">
        <form method="get" id="categoryForm">
            <br/>
            <? foreach ($npshop["avaliable_languages"] as $lang => $name) {?>
            <img src="../sites/davidbenavente/admin/flags/<?= $lang ?>.gif" onclick="javascript:changeLanguage('<?= $lang ?>');" alt="<?= _($name) ?>"/>&nbsp;
            <? } ?>&nbsp;&nbsp;
			<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?php
global $categories, $items, $deletedRows;
foreach ($categories as $cat) { 
?>					    
			    <option value="<?php echo $cat[0]?>" <?php echo $_GET['categoryId']==$cat[0]?"selected":""?>><?php echo NP_get_i18n($cat[1])?></option>
<?php
}
?>
		    </select>
	    </form>&nbsp;&nbsp;&nbsp;
	    </div>
	    
	    <div style="clear:both"/>

        <center>
        
        <?php if (isset($deletedRows)) {
            if ($deletedRows > 0) { ?>
        <h3><font color="green"><?= sprintf(_("Borrado del producto %s realizado correctamente"), $_POST['deleteId']) ?></font></h3>
         <?php } else { ?>
        <h3><font color="red"><?= sprintf(_("Problemas con el borrado del producto %s"), $_POST['deleteId']) ?></font></h3>
        <?php }
        } 
        ?>
        
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="10%"><?= _("Codigo") ?></th>
                    <th width="40%"><?= _("Nombre") ?></th>
                    <th width="20%"><?= _("Marca") ?></th>
                    <th width="10%"><?= _("Peso") ?></th>
                    <th width="10%"><?= _("Stock") ?></th>
                    <th width="10%"><?= _("Precio") ?></th>
                    <th width="10%"><?= _("Retirado") ?></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($items as $item) { ?>
                <tr>
                    <td><a href="itemDetail.php?itemId=<?php echo $item->id ?>"><?php echo $item->id ?></a></td>
                    <td><?php echo NP_get_i18n($item->name) ?></td>
                    <td><?php echo $item->tradeMark ?></td>
                    <td align="right"><?php echo $item->weight ?></td>
                    <td align="right"><?php echo $item->stock ?></td>
                    <td align="right"><?php echo $item->prize ?> &euro;</td>
                    <td align="center"><?php echo $item->retired?_("Sí"):_("No") ?></td>
                    <td><img src="../sites/davidbenavente/admin/papelera.gif" onclick="javascript:deleteItem('<?php echo $item->id ?>')"/></td>
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>
        <form method="post" id="deleteForm">
            <input type="hidden" name="deleteId" value=""/>
        </form>
    </body>
</html>