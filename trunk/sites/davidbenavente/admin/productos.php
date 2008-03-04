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
        </script>
    </head>
    <body>
        <div style="float:left"><h1>Listado de productos</h1></div>
        <div style="float:right">
        <form method="get" id="categoryForm">
            <br/>
			<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?php
global $categories, $items;
foreach ($categories as $cat) { 
?>					    
			    <option value="<?php echo $cat[0]?>" <?php echo $_GET['categoryId']==$cat[0]?"selected":""?>><?php echo $cat[1]?></option>
<?php
}
?>
		    </select>
	    <form>
	    </div>
	    
	    <div style="clear:both"/>

        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="10%">Codigo</th>
                    <th width="40%">Nombre</th>
                    <th width="20%">Marca</th>
                    <th width="10%">Stock</th>
                    <th width="10%">Precio</th>
                    <th width="10%">Retirado</th>
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
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>

    </body>
</html>