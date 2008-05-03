<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            function showCategory() {
			    form = document.getElementById("categoryForm");
			    form.submit();
			}
			function deleteItem(id) {
			    var ok = confirm("¿Seguro que desea borrar el producto con identificador " + id + "?");
			    if (ok) {
    			    form = document.getElementById("deleteForm");
                    form['deleteId'].value = id;
    			    form.submit();
			    }
			}
        </script>
    </head>
    <body>
        <div style="float:left; width:35%"><h1>Listado de productos</h1></div>
        <div style="float:left; text-align:center; width:35%">
            <br/><br/><a href="editItem.php">Insertar nuevo producto</a> - <a href="index.php">Volver</a>
        </div>
        <div style="float:right; width:30%; text-align:right;">
        <form method="get" id="categoryForm">
            <br/>
			<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?php
global $categories, $items, $deletedRows;
foreach ($categories as $cat) { 
?>					    
			    <option value="<?php echo $cat[0]?>" <?php echo $_GET['categoryId']==$cat[0]?"selected":""?>><?php echo $cat[1]?></option>
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
        <h3><font color="green">Borrado del producto <?php echo $_POST['deleteId']?> realizado correctamente</font></h3>
         <?php } else { ?>
        <h3><font color="red">Problemas con el borrado del producto <?php echo $_POST['deleteId']?></font></h3>
        <?php }
        } 
        ?>
        
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="10%">Codigo</th>
                    <th width="40%">Nombre</th>
                    <th width="20%">Marca</th>
                    <th width="10%">Stock</th>
                    <th width="10%">Precio</th>
                    <th width="10%">Retirado</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($items as $item) { ?>
                <tr>
                    <td><a href="itemDetail.php?itemId=<?php echo $item->id ?>"><?php echo $item->id ?></a></td>
                    <td><?php echo $item->name ?></td>
                    <td><?php echo $item->tradeMark ?></td>
                    <td align="right"><?php echo $item->stock ?></td>
                    <td align="right"><?php echo $item->prize ?> &euro;</td>
                    <td align="center"><?php echo $item->retired?"Si":"No" ?></td>
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