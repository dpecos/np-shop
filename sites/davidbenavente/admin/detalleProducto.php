<?php global $item, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            function updateItem(event) {
                form = document.getElementsByTagName("form")[0];
                form['event'].value = event;
                form.submit();
            }
        </script>
    </head>
    <body>
        <div style="float:left"><h1>Detalle del producto <?php echo $item->id." - ".$item->name ?></h1></div>
        <?php if (isset($_GET['orderId'])) { ?>
        <div style="float:right"><a href="orderDetail.php?orderId=<?php echo $_GET['orderId']?>">Volver a detalle del pedido</a></div>
        <?php } else { ?>
        <div style="float:right"><a href="listItems.php">Volver a listado de productos</a></div>
	    <?php } ?>
	    
	    <div style="clear:both"/>

        <?php if (isset($_GET['orderId'])) { ?>
		<input type="button" value="Editar producto" onclick="javascript:window.location.href='editItem.php?itemId=<?php echo $item->id ?>&orderId=<?php echo $_GET['orderId']?>'"/>
		<?php } else { ?>
        <input type="button" value="Editar producto" onclick="javascript:window.location.href='editItem.php?itemId=<?php echo $item->id ?>'"/>
	    <?php } ?>
		<!--input type="button" value="Borrar producto" onclick="javascript:updateItem('delete')"/-->
		<br/>
				
        <h2>Información del producto</h2>
        <center>
        <form method="post">
            <input type="hidden" name="item_id" value="<?php echo $item->id ?>"/>
            <input type="hidden" name="event" value=""/>
            
            <table boder="0" width="50%">
                <tr><td width="140px">Nombre:</td><td><?php echo $item->name ?></td></tr>
                <tr><td>Referencia:</td><td><?php echo $item->id ?></td></tr>
                
                <tr><td>Precio:</td><td><?php echo $item->prize ?> &euro;</td></tr>
                <tr><td>Categoría:</td><td><?php echo $categoryTitle ?></td></tr>
                <tr><td>Stock:</td>
                    <td>
                        <input type="text" name="item_stock" value="<?php echo $item->stock ?>" size="5"/>
                        <input type="button" value="Modificar" onclick="javascript:updateItem('stock')"/>
<?php if (isset($_POST['event']) && $_POST['event'] == "stock") { ?>
                            <font color="green"><b>Stock modificado correctamente.</b></font>
<?php } ?>  
                    </td>
                </tr>
                <tr><td>Stock mínimo:</td><td><?php echo $item->stockLimit ?></td></tr>
                <tr><td>Días de envío:</td><td><?php echo $item->shippingDays ?></td></tr>
                <tr><td>Envío especial:</td><td><?php echo $item->specialShipping?"Si":"No" ?></td></tr>
                <?php if (showValue($item->specialShipping)) { ?><tr><td>Coste de envío especial:</td><td><?php echo $item->specialShippingCost ?></td></tr><?php } ?>
                <tr><td>Número de orden:</td><td><?php echo $item->order ?></td></tr>
                <tr><td>Retirado:</td><td><input type="checkbox" name="item_retired" value="true" <?php echo $item->retired?"checked":"" ?> onclick="javascript:updateItem('retire')"/>
<?php if (isset($_POST['event']) && $_POST['event'] == "retire") { ?>
                            <font color="green"><b>Indicador modificado correctamente.</b></font>
<?php } ?>  
                    </td></tr>
                <tr><td>Novedad:</td><td><input type="checkbox" disabled <?php echo $item->new?"checked":"" ?>/></td></tr>
            </table>
            <br/><br/>
        </center>
        
        <h2>Características del producto</h2>
        <center>
            <table boder="0" width="80%">             
                <?php if (showValue($item->tradeMark)) { ?><tr><td>Marca:</td><td><?php echo $item->tradeMark ?></td></tr><?php } ?>
                <?php if (showValue($item->height)) { ?><tr><td>Altura:</td><td><?php echo $item->height ?> mm </td></tr><?php } ?>
    			<?php if (showValue($item->depth)) { ?><tr><td>Profundidad:</td><td><?php echo $item->depth ?> mm </td></tr><?php } ?>
    			<?php if (showValue($item->length)) { ?><tr><td>Longitud:</td><td><?php echo $item->length ?> mm </td></tr><?php } ?>								    
    			<?php if (showValue($item->weight)) { ?><tr><td>Peso:</td><td><?php echo $item->weight ?> gr </td></tr><?php } ?>								    
    			<?php if (showValue($item->complement)) { ?><tr><td>Detalle 1</td><td><?php echo $item->complement ?></td></tr><?php } ?>
    			<tr><td width="140px">Descripción:</td><td><?php echo $item->description ?></td></tr>
    			<?php if (showValue($item->complement2)) { ?><tr><td>Detalle 2</td><td><?php echo $item->complement2 ?></td></tr><?php } ?>    
            </table>
        </center>
        </form>
    </body>
</html>