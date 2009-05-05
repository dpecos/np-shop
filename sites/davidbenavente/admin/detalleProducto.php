<?php global $item, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            <?php include_once('javascript.js'); ?>
            function updateItem(event) {
                form = document.getElementsByTagName("form")[0];
                form['event'].value = event;
                form.submit();
            }
            function checkImage(image_input)
            {
                var re_text = /\.jpg|\.jpeg/i;
                var filename = image_input.value;
            
                /* Checking file type */
                if (filename.search(re_text) == -1)
                {
                    image_input.form.reset();
                    document.getElementById('image_submit').disabled = true;
                    document.getElementById('upload_status').innerHTML = "<font color='red'><b><?= _("Formato de fichero incorrecto") ?></b></font>";
                    return false;
                } else {
                    document.getElementById('image_submit').disabled = false;
                    document.getElementById('upload_status').innerHTML = "<font color='orange'><b><?= _("Preparado para subir") ?></b></font>";
                    return true;
                }
            }
            function uploadImage(form) {
                //document.getElementById("image_input").disabled = true;
                document.getElementById('image_submit').disabled = true;
                document.getElementById('upload_status').innerHTML = "<font color='orange'><b><?= _("Subiendo imagen...") ?></b></font>";
                
                //setTimeout("document.getElementById('image_input').form.submit()", 100);
                return true;
            }
            function uploadResult(ok, msg, img) {
                if (ok) {
                    document.getElementById("upload_status").innerHTML = "<font color='green'><b>" + msg + "</b></font>";
                } else {
                    document.getElementById("upload_status").innerHTML = "<font color='red'><b>" + msg + "</b></font>";
                }
                var image_submit = document.getElementById('image_submit');
                if (ok) {
                    image_submit.disabled = true;
                    image_submit.form.reset();
                    
                    var table = document.getElementById("imageList");
                    var tr = document.createElement("tr");
                    tr.setAttribute("id", img);
                    tr.setAttribute("align", "center");
                    var td = document.createElement("td");
                    var imagen = document.createElement("img");
                    imagen.setAttribute("src", "../images/" + img);
                    imagen.setAttribute("width", "30px");
                    var papelera = document.createElement("img");
                    papelera.setAttribute("src", "../sites/davidbenavente/admin/papelera.gif");
                    papelera.setAttribute("onclick", "javascript:deleteImage('" + img + "')");
                    table.appendChild(tr);
                    tr.appendChild(td);
                    td.appendChild(papelera);
                    td.appendChild(document.createTextNode(" "));
                    td.appendChild(imagen);
                    td.appendChild(document.createTextNode(" ../images/" + img));
                    
                } else {
                    image_submit.disabled = false;
                }
            }
            function deleteImage(img) {
                if (confirm("<?= _("¿Seguro que desea borrar esta imagen?") ?>")) 
                    document.getElementById("upload_iframe").src="<?= $_SERVER['PHP_SELF'] ?>?deleteImage=" + img;
            }
            function removeImage(img, msg) {
                var tr = document.getElementById(img);
                tr.parentNode.removeChild(tr);
                
                document.getElementById("upload_status").innerHTML = "<font color='green'><b>" + msg + "</b></font>";
            }
        </script>
    </head>
    <body>
        <div style="float:left"><h1><?= sprintf(_("Detalle del producto %s"), $item->id." - ".NP_get_i18n($item->name)) ?></h1></div>
        <div style="float:right">
            <? foreach ($npshop["avaliable_languages"] as $lang => $name) {?>
            <img src="../sites/davidbenavente/admin/flags/<?= $lang ?>.gif" onclick="javascript:changeLanguage('<?= $lang ?>');" alt="<?= _($name) ?>"/>&nbsp;
            <? } ?>&nbsp;&nbsp;
            <?php if (isset($_GET['orderId'])) { ?>
            <a href="orderDetail.php?orderId=<?php echo $_GET['orderId']?>"><?= _("Volver a detalle del pedido") ?></a>
            <?php } else { ?>
            <a href="listItems.php"><?= _("Volver a listado de productos") ?></a>
    	    <?php } ?>
	    </div>
	    
	    <div style="clear:both"/>

            <?php if (isset($_GET['item_edit_ok'])) { ?>
		<h2><font color="green"><b><?= _("Producto modificado correctamente.") ?></b></font></h2>
	    <?php } ?> 

        <?php if (isset($_GET['orderId'])) { ?>
		<input type="button" value="<?= _("Editar producto") ?>" onclick="javascript:window.location.href='editItem.php?itemId=<?php echo $item->id ?>&orderId=<?php echo $_GET['orderId']?>'"/>
		<?php } else { ?>
        <input type="button" value="<?= _("Editar producto") ?>" onclick="javascript:window.location.href='editItem.php?itemId=<?php echo $item->id ?>'"/>
	    <?php } ?>
		<!--input type="button" value="<?= _("Borrar producto") ?>" onclick="javascript:updateItem('delete')"/-->
		<br/>
				
        <h2><?= _("Información del producto") ?></h2>
        <center>
        <form method="post">
            <input type="hidden" name="item_id" value="<?php echo $item->id ?>"/>
            <input type="hidden" name="event" value=""/>
            
            <table boder="0" width="50%">
                <tr><td width="140px"><?= _("Nombre:") ?></td><td><?php echo NP_get_i18n($item->name) ?></td></tr>
                <tr><td><?= _("Referencia:") ?></td><td><?php echo $item->id ?></td></tr>
                
                <tr><td><?= _("Precio:") ?></td><td><?php echo $item->prize ?> &euro;</td></tr>
                <tr><td><?= _("Categoría:") ?></td><td><?php echo NP_get_i18n($categoryTitle) ?></td></tr>
                <tr><td><?= _("Stock:") ?></td>
                    <td>
                        <input type="text" name="item_stock" value="<?php echo $item->stock ?>" size="5"/>
                        <input type="button" value="<?= _("Modificar") ?>" onclick="javascript:updateItem('stock')"/>
<?php if (isset($_POST['event']) && $_POST['event'] == "stock") { ?>
                            <font color="green"><b><?= _("Stock modificado correctamente.") ?></b></font>
<?php } ?>  
                    </td>
                </tr>
                <tr><td><?= _("Stock mínimo:") ?></td><td><?php echo $item->stockLimit ?></td></tr>
                <tr><td><?= _("Días de envío:") ?></td><td><?php echo $item->shippingDays ?></td></tr>
                <tr><td><?= _("Envío especial:") ?></td><td><?php echo $item->specialShipping?_("Sí"):_("No") ?></td></tr>
                <?php if (showValue($item->specialShipping)) { ?><tr><td><?= _("Coste de envío especial:") ?></td><td><?php echo $item->specialShippingCost ?></td></tr><?php } ?>
                <tr><td><?= _("Número de orden:") ?></td><td><?php echo $item->order ?></td></tr>
                <tr><td><?= _("Retirado:") ?></td><td><input type="checkbox" name="item_retired" value="true" <?php echo $item->retired?"checked":"" ?> onclick="javascript:updateItem('retire')"/>
<?php if (isset($_POST['event']) && $_POST['event'] == "retire") { ?>
                            <font color="green"><b><?= _("Indicador modificado correctamente.") ?></b></font>
<?php } ?>  
                    </td></tr>
                <tr><td><?= _("Novedad:") ?></td><td><input type="checkbox" disabled <?php echo $item->new?"checked":"" ?>/></td></tr>
            </table>
            <br/><br/>
        </center>
        
        <h2><?= _("Características del producto") ?></h2>
        <center>
            <table boder="0" width="80%">             
                <?php if (showValue($item->tradeMark)) { ?><tr><td><?= _("Marca:") ?></td><td><?php echo $item->tradeMark ?></td></tr><?php } ?>
                <?php if (showValue($item->height)) { ?><tr><td><?= _("Altura:") ?></td><td><?php echo $item->height ?> mm </td></tr><?php } ?>
    			<?php if (showValue($item->depth)) { ?><tr><td><?= _("Profundidad:") ?></td><td><?php echo $item->depth ?> mm </td></tr><?php } ?>
    			<?php if (showValue($item->length)) { ?><tr><td><?= _("Longitud:") ?></td><td><?php echo $item->length ?> mm </td></tr><?php } ?>								    
    			<?php if (showValue($item->weight)) { ?><tr><td><?= _("Peso:") ?></td><td><?php echo $item->weight ?> gr </td></tr><?php } ?>		
    			<tr><td width="140px"><?= _("Descripción:") ?></td><td><?php echo NP_get_i18n($item->description) ?></td></tr>						    
    			<?php if (showValue($item->complement)) { ?><tr><td><?= _("Detalle 1") ?></td><td><?php echo NP_get_i18n($item->complement) ?></td></tr><?php } ?>
    			<?php if (showValue($item->complement2)) { ?><tr><td><?= _("Detalle 2") ?></td><td><?php echo NP_get_i18n($item->complement2) ?></td></tr><?php } ?>    
            </table>
        </center>
        </form>
        <br/><br/>
        
        <h2><?= _("Imágenes del producto") ?></h2>
        <form action="" target="upload_iframe" method="post" enctype="multipart/form-data" onSubmit="return uploadImage(this);">
            <input type="hidden" name="item_id" value="<?php echo $item->id ?>"/>
            <center>
            <table boder="0" width="50%"> 
                <tbody id="imageList">
                <tr><td>
                    <label for="product_image"><?= _("Selecciona la imagen a subir:") ?></label>
                    <input type="file" id="image_input" accept="image/jpeg" name="product_image" onChange="javascript:checkImage(this)"/>
                </td></tr>
                <tr><td>
                    <label for="filename_mask"><?= _("Tipo de imagen:") ?></label>
                    <select name="filename_mask">
                        <option value="%s_p.jpg"><?= _("Pequeña") ?></option>
                        <option value="%s_g.jpg"><?= _("Grande") ?></option>
                        <option value="%s_v.jpg"><?= _("Uso") ?></option>
                    </select>
                </td></tr> 
                <tr><td>
                    <input type="submit" id="image_submit" value="<?= _("Subir imagen") ?>" disabled="true"/>
                    &nbsp;&nbsp;&nbsp;<span id="upload_status"><font color="red"><b><?= _("No se ha seleccionado ninguna imagen") ?></b></font></span>
                </td></tr>  
                <? global $images; foreach ($images as $idx => $img) { ?>                  
                <tr id="<?=$img?>" align="center"><td>
                    <img src="../sites/davidbenavente/admin/papelera.gif" onclick="javascript:deleteImage('<?=$img?>')"/>
                    <img src="../images/<?=$img?>" width="30px"/>&nbsp;&nbsp;../images/<?=$img?>
                </td></tr>    
                <? } ?>
                </tbody>
            </table>
            </center>
        </form>
        <iframe id="upload_iframe" name="upload_iframe" style="width: 400px; height: 100px; display:none">
        </iframe>
    </body>
</html>
