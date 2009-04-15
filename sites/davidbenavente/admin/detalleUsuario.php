<?php global $user, $categoryTitle, $categories;?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
    </head>
    <body>
        <div style="float:left"><h1><?= sprintf(_("Detalle del Usuario %s"), $user->id." - ".$user->email) ?></h1></div>
        <div style="float:right"><a href="listUsers.php"><?= _("Volver a listado de usuarios") ?></a></div>
	    
	    <div style="clear:both"/>

		<input type="button" value="<?= _("Editar usuario") ?>" onclick="javascript:window.location.href='editUser.php?userId=<?php echo $user->id ?>'"/>
		
		<br/>
				
        <h2><?= _("Información del Usuario") ?></h2>
       
        <table>
			<tr><td><?= _("Email") ?></td><td><?php echo $user->email ?></td></tr>
			<tr><td><?= _("Envío de mail") ?></td><td><input type="checkbox" value="true" <?php echo $user->mailing?"checked":"" ?> disabled></td></tr>
		</table>	
      
        
        <h2><?= _("Datos de facturación") ?></h2>
        <center>
        	<table style="float:left; margin-left: 15%">
        	    <thead>
        	        <tr><th colspan="2" style="font-weight:bold"><?= _("Datos de facturación") ?></th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left"><?= _("Nombre") ?></td><td><?php echo $user->billingData['name'] ?></td></tr>
    				<tr><td align="left"><?= _("Apellidos") ?></td><td><?php echo $user->billingData['surname'] ?></td></tr>
    				<tr><td align="left"><?= _("Dirección") ?></td><td><?php echo $user->billingData['address'] ?></td></tr>
    				<tr><td align="left"><?= _("Letra, escalera, piso") ?></td><td><?php echo $user->billingData['address2'] ?></td></tr>
    				<tr><td align="left"><?= _("Código Postal") ?></td><td><?php echo $user->billingData['postalCode'] ?></td></tr>
    				<tr><td align="left"><?= _("Localidad") ?></td><td><?php echo $user->billingData['city'] ?></td></tr>
    				<tr><td align="left"><?= _("Provincia") ?></td><td><select disabled>
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->billingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left"><?= _("País") ?></td><td><select disabled>
    						<option selected><?= getCountryName($user->billingData['country']) ?></option>
    						</select></td>
    				</tr>
    				<tr><td align="left"><?= _("Teléfono fijo o móvil") ?></td><td><?php echo $user->billingData['phone'] ?></td></tr>
			    </tbody>
			</table>	
			
			<table style="float:right; margin-right: 15%">
			    <thead>
        	        <tr><th colspan="2" style="font-weight:bold"><?= _("Datos de envío") ?></th></tr>
        	    </thead>
        	    <tbody>
    				<tr><td width=35% align="left"><?= _("Nombre") ?></td><td><?php echo $user->shippingData['name'] ?></td></tr>
    				<tr><td align="left"><?= _("Apellidos") ?></td><td><?php echo $user->shippingData['surname'] ?></td></tr>
    				<tr><td align="left"><?= _("Dirección") ?></td><td><?php echo $user->shippingData['address'] ?></td></tr>
    				<tr><td align="left"><?= _("Letra, escalera, piso") ?></td><td><?php echo $user->shippingData['address2'] ?></td></tr>
    				<tr><td align="left"><?= _("Código Postal") ?></td><td><?php echo $user->shippingData['postalCode'] ?></td></tr>
    				<tr><td align="left"><?= _("Localidad") ?></td><td><?php echo $user->shippingData['city'] ?></td></tr>
    				<tr><td align="left"><?= _("Provincia") ?></td><td><select disabled>
    				<?php 
    				    global $provinces;
    				    foreach ($provinces as $pId => $pName) {
    				?>		
    						<option value="<?php echo $pId ?>" <?php echo ($user->shippingData['province'] == $pId)?"selected":""?>><?php echo $pName ?></option>
    				<?php } ?>
    						</select></td>
    				</tr>
    				<tr><td align="left"><?= _("País") ?></td><td><select disabled>
    						<option selected><?= getCountryName($user->shippingData['country']) ?></option>
    						</select></td>
    				</tr>
    				<tr><td align="left"><?= _("Teléfono fijo o móvil") ?></td><td><?php echo $user->shippingData['phone'] ?></td></tr>
    			</tbody>
			</table>
		</center>

			
    </body>
</html>