<?php
require_once("npshop/skin.php");

$cart = get_cart();
?>
<html><head><title>David Benavente. Estudio de bonsái</title>
<link rel=stylesheet href="/interface/estilos.css"> 
			<script language="javascript">
			<!--
			function doRedirect(myObject) {
			 	if (myObject.options[myObject.selectedIndex].value!="") { 
					top.location.href=myObject.options[myObject.selectedIndex].value; 
				}	else {
					return false;
				}
			}		
			String.prototype.trim = function(){return this.replace(/^\s+|\s+$/g,'')}
			function npshop_submit() { 
				form = document.getElementById('npshop_form');
				if (form.user_password && form.user_password.value == "") {
				    alert("Debe introducir su password para enviar los cambios");
				} else if (form.user_billingData_name.value.trim()=="" || form.user_billingData_surname.value.trim()=="" ||
				    form.user_billingData_address.value.trim()=="" || form.user_billingData_postalCode.value.trim()=="" ||
				    form.user_billingData_phone.value.trim()=="") {
				    alert("Debe cumplimentar todos los datos de facturación");
				} else if (!form.sameData.checked && 
				    (form.user_shippingData_name.value.trim()=="" || form.user_shippingData_surname.value.trim()=="" ||
				    form.user_shippingData_address.value.trim()=="" || form.user_shippingData_postalCode.value.trim()=="" ||
				    form.user_shippingData_phone.value.trim()=="")) {
				    alert("Debe cumplimentar todos los datos de envío");
				} else {
    				if (!form.user_mailing.checked) {
    					form.user_mailing.value = false;
    					form.user_mailing.checked = true;
    				}
    				if (!form.sameData.checked) {
    					form.sameData.value = false;
    					form.sameData.checked = true;
    				}
    				//form.action.value = action;
    				form.submit();
			    }
			}	
			function toggleVisibility() {
			    form = document.getElementById('npshop_form');
			    table = document.getElementById("envio");
			    title = document.getElementById("tituloDatos");
			    if (form.sameData.checked) {
			        table.style.visibility = "hidden";
			        title.innerHTML = "Datos de facturación y envío";
			    } else {
			        table.style.visibility = "visible";
			        title.innerHTML = "Datos de facturación";
			    }
			}
			// -->
			</script>
<script language="javaScript" SRC="/interface/botonera.js"></SCRIPT> 
</head>
<body text=#000000 marginwidth="0" marginheight="0" topmargin="0" leftmargin="0">
<center>
	
<br>
<table  width="779" cellpadding="0" cellspacing="0" border="0">	
<!------------------CABECERA------------------->

	<tr>
		<td height="17" valign=top colspan="5"><img src="/interface/01.gif" border=0></td>
	</tr>
	<tr>
		<td  width="100%" height="60" valign=top  colspan="5">
			<table  width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td valign=top><img src="/interface/02-izq.gif" border=0 width="11" height="60"></td>
					<td valign=top>
						<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="311" HEIGHT="60" id="fondo" ALIGN="">
							<PARAM NAME=movie VALUE="/interface/iconos.swf">
							<PARAM NAME=quality VALUE=high>
							<PARAM NAME=bgcolor VALUE=#FFFFFF>
							<PARAM NAME=wmode VALUE=transparent>
							<PARAM NAME=menu VALUE=false>
							<EMBED src="/interface/iconos.swf" quality=high bgcolor=#FFFFFF  WIDTH="311" HEIGHT="60" NAME="fondo" ALIGN=""  TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
						</OBJECT>

					</td>
					<td valign=top><img src="/interface/02-cen.gif" border=0 width="229" height="60"></td>
					<td valign=top align="right"><img src="/interface/logo.gif" border=0 width="228" height="60"></td>
				</tr>				
			</table>
		</td>
	</tr>
	<!------------------FIN DE CABECERA------------------->

	<tr>
		<td valign=top background="/interface/03-izq.gif" width="11" height="100%">&nbsp;</td>

	<!------------------BOTONERA------------------->

		<td valign=top width="167" height="100%"><br><br><br><br><br>
													<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="167" HEIGHT="390" id="fondo" ALIGN="">
																<PARAM NAME=movie VALUE="/interface/botonera.swf">
																<PARAM NAME=quality VALUE=high>
																<PARAM NAME=bgcolor VALUE=#FFFFFF>
																<PARAM NAME=wmode VALUE=transparent>
																<PARAM NAME=menu VALUE=false>
																<EMBED src="/interface/botonera.swf" quality=high bgcolor=#FFFFFF  WIDTH="167" HEIGHT="390" NAME="fondo" ALIGN=""  TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
													</OBJECT>

		</td>

	<!------------------FIN DE BOTONERA------------------->
		<td valign=top background="/interface/03-cen.gif" width="2" height="100%"></td>
		<td valign=top width="584" height="129">
			<table  width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">

				<tr>
					<td valign=top><img src="/interface/banner-venta.gif" border=0 width="584" height="55"></td>
				</tr>
				<tr>
					<td valign=top width="100%" height="100%">
						<table  width="100%" height="100%" cellpadding="5" cellspacing="0" border="0">
							<tr>
								<td valign=top width="100%" height="100%">
							
	<!------------------CUERPO------------------->

<table width="100%" cellpadding="5" cellspacing="0" border="1" BGCOLOR=F3F2F2 BORDERCOLORDARK=F3F2F2 BORDERCOLORLIGHT=F3F2F2>
	<tr>
		<td class="02" ><p class=p-dere>
			<a class="negro" href="account.php">Tu cuenta</a><img src="/interface/cuenta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="cart.php">Ver la cesta</a><img src="/interface/cesta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="<?php echo SKIN_ROOT; ?>ayuda.php">Ayuda</a><img src="/interface/ayuda.gif" border=0 align=absmiddle hspace=5>
			</p>
		</td>
	</tr>
</table>	
<? 
global $extended, $referrer;
?>
<table width="100%" cellpadding="3" cellspacing="0" border="0" >
	<tr>
		<td style="border-bottom:1px #DADADA solid;" ><p class=p-dere>
			<span class="pie">1. Selección de productos</span>&nbsp;
<? if ($referrer == "confirmCart.php") { ?>
            <span><strong>2. Datos facturación y envío<strong></span>&nbsp;
<? } else { ?>
			<span class="pie">2. Datos facturación y envío</span>&nbsp;
<? } ?>
            <span class="pie">3. Comprobación y compra</span>&nbsp;
			<span class="pie">4. Resultado</span>&nbsp;
		</td>
	</tr>
</table>	
<br>

<? 
    global $errorMsg;
    if (isset($errorMsg) && trim($errorMsg) != "") { 
?>
<table cellpadding=6 cellspacing=0 border=0 width=100%  >
    <tr>
        <td class="t-01" colspan="2"><span class=error>ERROR: <?= $errorMsg ?></span></td>
    </tr>
</table>
<? } ?>

<form id="npshop_form" method="post" action="personalData.php">

<input type="hidden" name="extended" value="<?=$extended?>"/>
<input type="hidden" name="referrer" value="<?=$referrer?>"/>
<? if ($extended) { ?>
<table cellpadding=6 cellspacing=0 border=0 width=50%  >
	<tr>
		<td width="100%" valign="top">
			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span class=titulo2>Datos de tu cuenta</span></td></tr>
				<tr><td class="t-03" width=35% align=right style="border-left:1px #DADADA solid;"><br>e-mail</td><td class="t-02" width=75% style="border-right:1px #DADADA solid;"><br><input value="<?= $cart->user->email ?>" class="ffd2" type="text" maxlength=60 name="user_email"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Password</td><td class="t-02" style="border-right:1px #DADADA solid;">
<? if (get_referer() == "login.php") { ?>
				<input class="ffd2"  value="<?= $cart->user->password ?>" type="password" maxlength=60 name="user_password" readonly>
<? } else { ?>
				<input class="ffd2"  value="" type="password" maxlength=60 name="user_password" >
<? } ?>
				</td></tr>
<? if (get_referer() != "login.php") { ?>
				<tr><td class="t-01" colspan="2" style="border-right:1px #DADADA solid;" style="border-left:1px #DADADA solid;"><B>Si quieres cambiar tu password:</B></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Nuevo password</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="password" maxlength=60 name="newPassword1"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;"  style="border-bottom:1px #DADADA solid;">Repetir password<br><br></td><td class="t-02" style="border-right:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;"><input class="ffd2" type="password" maxlength=60 name="newPassword2"><br><br></td></tr>
<? } ?>
			</table>	
		</td>

	</tr>
</table>
<? } ?>

<center>
			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td colspan="2" colspan="2"><p class="rojo"><input type="checkbox" onclick="javascript:toggleVisibility()" value="true" name="sameData" >&nbsp;&nbsp;Los datos de envío son iguales a los datos de facturación</td></tr>
			</table>
			
<table cellpadding=6 cellspacing=0 border=0 width=100%  >
	<tr>
		<td width="50%" valign="top">
			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span id="tituloDatos" class=titulo2>Datos de facturación</span></td></tr>
				<tr><td class="t-03" width=35% align=right style="border-left:1px #DADADA solid;"><br>Nombre</td><td class="t-02" width=75% style="border-right:1px #DADADA solid;"><br><input class="ffd2"  value="<?= $cart->user->billingData['name'] ?>" type="text" maxlength=60 name="user_billingData_name"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Apellidos</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->billingData['surname'] ?>" maxlength=60 name="user_billingData_surname"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Dirección</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->billingData['address'] ?>" maxlength=60 name="user_billingData_address"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Letra, escalera, piso</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2"  value="<?= $cart->user->billingData['address2'] ?>" type="text" maxlength=60 name="user_billingData_address2"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Código Postal</td ><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->billingData['postalCode'] ?>" maxlength=60 name="user_billingData_postalCode"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Localidad</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text" maxlength=60  value="<?= $cart->user->billingData['city'] ?>" name="user_billingData_city"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Provincia</td><td class="t-02" style="border-right:1px #DADADA solid;"><select class="ffd2" name="user_billingData_province" >
				<? 
				    global $provinces;
				    foreach ($provinces as $pId => $pName) {
				?>		
						<option value="<?= $pId ?>" <?= ($cart->user->billingData['province'] == $pId)?"selected":""?>><?= $pName ?></option>
				<? } ?>
						</select></td>
				</tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">País</td><td class="t-02" style="border-right:1px #DADADA solid;"><select class="ffd2" name="user_billingData_country" >
						<option value="56" selected>España</option>
						</select></td>
				</tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;">Teléfono fijo o móvil<br><br></td><td class="t-02" style="border-right:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;"><input class="ffd2"  value="<?= $cart->user->billingData['phone'] ?>" type="text" maxlength=60 name="user_billingData_phone"><br><br></td></tr>
			</table>	
		</td>

		<td width="50%" valign="top">
			<table id="envio" cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span class=titulo2>Datos de envío</span></td></tr>
				<tr><td class="t-03" width=35% align=right style="border-left:1px #DADADA solid;"><br>Nombre</td><td class="t-02" width=75% style="border-right:1px #DADADA solid;"><br><input class="ffd2"  value="<?= $cart->user->shippingData['name'] ?>" type="text" maxlength=60 name="user_shippingData_name"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Apellidos</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->shippingData['surname'] ?>" maxlength=60 name="user_shippingData_surname"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Dirección</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->shippingData['address'] ?>" maxlength=60 name="user_shippingData_address"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Letra, escalera, piso</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2"  value="<?= $cart->user->shippingData['address2'] ?>" type="text" maxlength=60 name="user_shippingData_address2"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Código Postal</td ><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text"  value="<?= $cart->user->shippingData['postalCode'] ?>" maxlength=60 name="user_shippingData_postalCode"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Localidad</td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="text" maxlength=60  value="<?= $cart->user->shippingData['city'] ?>" name="user_shippingData_city"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">Provincia</td><td class="t-02" style="border-right:1px #DADADA solid;"><select class="ffd2" name="user_shippingData_province" >
				<? 
				    global $provinces;
				    foreach ($provinces as $pId => $pName) {
				?>		
						<option value="<?= $pId ?>" <?= ($cart->user->shippingData['province'] == $pId)?"selected":""?>><?= $pName ?></option>
				<? } ?>
						</select></td>
				</tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;">País</td><td class="t-02" style="border-right:1px #DADADA solid;"><select class="ffd2" name="user_shippingData_country" >
						<option value="56" selected>España</option>
						</select></td>
				</tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;">Teléfono fijo o móvil<br><br></td><td class="t-02" style="border-right:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;"><input class="ffd2"  value="<?= $cart->user->shippingData['phone'] ?>" type="text" maxlength=60 name="user_shippingData_phone"><br><br></td></tr>
			</table>	
		</td>
	</tr>
</table>


			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
			    <tr><td colspan="2"><p>
    			    <? if (get_referer() == "login.php") { ?>
    			        <input type="checkbox" value="true" checked name="user_mailing" >&nbsp;&nbsp;Deseo recibir información de novedades y ofertas
    			    <? } else { ?>
    			        <input type="checkbox" value="true" <?= $cart->user->mailing?"checked":"" ?> name="user_mailing" >&nbsp;&nbsp;Deseo recibir información de novedades y ofertas
    			    <? } ?>
				</td></tr>
			</table>
</form>

</center>

<table cellpadding=6 cellspacing=0 border=0 width=92%  >
	<tr>
		<td colspan="2" class="t-03">
		<? if (get_referer() == "login.php") { ?>
		    <a href="javascript:npshop_submit()" onmouseover="rollOn('b3_');" onmouseout="rollOff('b3_');chequear('b3_');" target=_self>
		        <img src="/interface/b03-continuar-off.gif" border=0  align=right name=b3_>	
		    </a
		<? } else if (!$extended) { ?>
	        <a href="javascript:npshop_submit()" onmouseover="rollOn('b12_');" onmouseout="rollOff('b12_');chequear('b12_');" target=_self>
		        <img src="/interface/b12-modificar-datosycontinuar-off.gif" border=0  align=right name=b12_>	
		    </a>
	    <? } else { ?>
	        <a href="javascript:npshop_submit()" onmouseover="rollOn('b6_');" onmouseout="rollOff('b6_');chequear('b6_');" target=_self>
		        <img src="/interface/b06-modificar-datos-off.gif" border=0  align=right name=b6_>	
		    </a>
		<? } ?>
		</td>
	</tr>
</table>
<br>






	<!------------------FIN DE CUERPO------------------->
								</td>
							</tr>						
						</table>
					</td>

				</tr>
			</table>
						
		</td>
		<td valign=top background="/interface/03-der.gif" width="15" height="100%"><img src="/interface/03-der-0.gif" border=0></td>

	</tr>
	<!------------------PIE------------------->

	<tr>
		<td height="10" valign=top colspan="5"><img src="/interface/pie.gif" border=0></td>
	</tr>
	<tr>
		<td height="31"  valign=top colspan="5" align=center><p class=pie>General Ramirez de Madrid 8-10 28020 MADRID · España · Telf: + 34 687 327 796 · e-mail: <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a></td>
	</tr>



	<!------------------FIN DE PIE------------------->	



</table>
</center>
</body>
</html>
