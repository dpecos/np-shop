<?php global $user, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            function storeUser() {
                form = document.getElementsByTagName("form")[0];
                for (var i=0; i < form.elements.length; i++) {
					var element = form.elements[i];
					if (element.type == "checkbox" && !element.checked) {
						element.value = "0";
						element.checked = true;
					}
				}
                form.submit();
            }
        </script>
    </head>
    <body>
        <div style="float:left"><h1>Edición del Usuario <?php echo $user->id." - ".$user->email ?></h1></div>
        <div style="float:right"><a href="userDetail.php?userId=<?php echo $user->id ?>">Volver a detalle de usuario</a></div>
	    
	    <div style="clear:both"/>
	     
	    <?php global $msgError; ?>
	    <?php if (isset($msgError)) { ?>
	        <h2><font color="red"><b><?php echo $msgError ?></b></font></h2>
		<?php } else if (isset($_POST['user_id'])) { ?>
			<h2><font color="green"><b>Usuario modificado correctamente.</b></font></h2>
		<?php } ?> 
		
		<form method="post">	
		<input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>
        <h2>Información del Usuario</h2>
       
        <table>
			<tr><td>Email</td><td><input type="text" name="user_email" value="<?php echo $user->email ?>"/></td></tr>
			<tr><td>Envío de mail</td><td><input type="checkbox" name="user_mailing" value="1" <?php echo $user->mailing?"checked":"" ?>></td></tr>
		</table>	
      
        <h2>Cambio de password</h2>
       
        <table>
			<tr><td>Nuevo Password</td><td><input type="password" name="newPassword1"/></td></tr>
			<tr><td>Repetir Password</td><td><input type="password" name="newPassword2"/></td></tr>
		</table>
        
        <h2>Datos de facturación / envío</h2>
        <center>
        	<table style="float:left; margin-left: 15%">
        	    <thead>
        	        <tr><th colspan="2" style="font-weight:bold">Datos de facturación</th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left">Nombre</td><td><input type="text" name="user_billingData_name" value="<?php echo $user->billingData['name'] ?>"/></td></tr>
    				<tr><td align="left">Apellidos</td><td><input type="text" name="user_billingData_surname" value="<?php echo $user->billingData['surname'] ?>"/></td></tr>
    				<tr><td align="left">Dirección</td><td><input type="text" name="user_billingData_address" value="<?php echo $user->billingData['address'] ?>"/></td></tr>
    				<tr><td align="left">Letra, escalera, piso</td><td><input type="text" name="user_billingData_address2" value="<?php echo $user->billingData['address2'] ?>"/></td></tr>
    				<tr><td align="left">Código Postal</td><td><input type="text" name="user_billingData_postalCode" value="<?php echo $user->billingData['postalCode'] ?>"/></td></tr>
    				<tr><td align="left">Localidad</td><td><input type="text" name="user_billingData_city" value="<?php echo $user->billingData['city'] ?>"/></td></tr>
    				<tr><td align="left">Provincia</td><td><select name="user_billingData_province">
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->billingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left">País</td><td><select name="user_billingData_country">
    						<option value="1" selected>España</option>
    						</select></td>
    				</tr>
    				<tr><td align="left">Teléfono fijo o móvil</td><td><input type="text" name="user_billingData_phone" value="<?php echo $user->billingData['phone'] ?>"/></td></tr>
				</tbody>
			</table>	
			
			<table style="float:right; margin-right: 15%">
			    <thead>
        	        <tr><th colspan="2" style="font-weight:bold">Datos de envío</th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left">Nombre</td><td><input type="text" name="user_shippingData_name" value="<?php echo $user->shippingData['name'] ?>"/></td></tr>
    				<tr><td align="left">Apellidos</td><td><input type="text" name="user_shippingData_surname" value="<?php echo $user->shippingData['surname'] ?>"/></td></tr>
    				<tr><td align="left">Dirección</td><td><input type="text" name="user_shippingData_address" value="<?php echo $user->shippingData['address'] ?>"/></td></tr>
    				<tr><td align="left">Letra, escalera, piso</td><td><input type="text" name="user_shippingData_address2" value="<?php echo $user->shippingData['address2'] ?>"/></td></tr>
    				<tr><td align="left">Código Postal</td><td><input type="text" name="user_shippingData_postalCode" value="<?php echo $user->shippingData['postalCode'] ?>"/></td></tr>
    				<tr><td align="left">Localidad</td><td><input type="text" name="user_shippingData_city" value="<?php echo $user->shippingData['city'] ?>"/></td></tr>
    				<tr><td align="left">Provincia</td><td><select name="user_shippingData_province">
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->shippingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left">País</td><td><select name="user_shippingData_country">
    						<option value="1" selected>España</option>
    						</select></td>
    				</tr>
    				<tr><td align="left">Teléfono fijo o móvil</td><td><input type="text" name="user_shippingData_phone" value="<?php echo $user->shippingData['phone'] ?>"/></td></tr>
				</tbody>
			</table>
		</center>
		<input type="button" value="Guardar" onclick="javascript:storeUser()"/>
        </form>
			
    </body>
</html>