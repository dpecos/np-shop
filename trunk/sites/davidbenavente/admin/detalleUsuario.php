<?php global $user, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
    </head>
    <body>
        <div style="float:left"><h1>Detalle del Usuario <?php echo $user->id." - ".$user->email ?></h1></div>
        <div style="float:right"><a href="listUsers.php">Volver a listado de usuarios</a></div>
	    
	    <div style="clear:both"/>

		<input type="button" value="Editar usuario" onclick="javascript:window.location.href='editUser.php?userId=<?php echo $user->id ?>'"/>
		
		<br/>
				
        <h2>Información del Usuario</h2>
       
        <table>
			<tr><td>Email</td><td><?php echo $user->email ?></td></tr>
			<tr><td>Envío de mail</td><td><input type="checkbox" value="true" <?php echo $user->mailing?"checked":"" ?> disabled></td></tr>
		</table>	
      
        
        <h2>Datos de facturación</h2>
        <center>
        	<table style="float:left; margin-left: 15%">
        	    <thead>
        	        <tr><th colspan="2" style="font-weight:bold">Datos de facturación</th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left">Nombre</td><td><?php echo $user->billingData['name'] ?></td></tr>
    				<tr><td align="left">Apellidos</td><td><?php echo $user->billingData['surname'] ?></td></tr>
    				<tr><td align="left">Dirección</td><td><?php echo $user->billingData['address'] ?></td></tr>
    				<tr><td align="left">Letra, escalera, piso</td><td><?php echo $user->billingData['address2'] ?></td></tr>
    				<tr><td align="left">Código Postal</td><td><?php echo $user->billingData['postalCode'] ?></td></tr>
    				<tr><td align="left">Localidad</td><td><?php echo $user->billingData['city'] ?></td></tr>
    				<tr><td align="left">Provincia</td><td><select disabled>
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->billingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left">País</td><td><select disabled>
    						<option value="1" selected>España</option>
    						</select></td>
    				</tr>
    				<tr><td align="left">Teléfono fijo o móvil</td><td><?php echo $user->billingData['phone'] ?></td></tr>
			    </tbody>
			</table>	
			
			<table style="float:right; margin-right: 15%">
			    <thead>
        	        <tr><th colspan="2" style="font-weight:bold">Datos de envío</th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left">Nombre</td><td><?php echo $user->shippingData['name'] ?></td></tr>
    				<tr><td align="left">Apellidos</td><td><?php echo $user->shippingData['surname'] ?></td></tr>
    				<tr><td align="left">Dirección</td><td><?php echo $user->shippingData['address'] ?></td></tr>
    				<tr><td align="left">Letra, escalera, piso</td><td><?php echo $user->shippingData['address2'] ?></td></tr>
    				<tr><td align="left">Código Postal</td><td><?php echo $user->shippingData['postalCode'] ?></td></tr>
    				<tr><td align="left">Localidad</td><td><?php echo $user->shippingData['city'] ?></td></tr>
    				<tr><td align="left">Provincia</td><td><select disabled>
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->shippingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left">País</td><td><select disabled>
    						<option value="1" selected>España</option>
    						</select></td>
    				</tr>
    				<tr><td align="left">Teléfono fijo o móvil</td><td><?php echo $user->shippingData['phone'] ?></td></tr>
    			</tbody>
			</table>
		</center>

			
    </body>
</html>