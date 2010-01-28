<?php
require_once("npshop/skin.php");
$cart = get_cart();
?>
<html><head><title><?= _("David Benavente. Estudio de bonsái") ?></title>
<link rel=stylesheet href="<?= SKIN_ROOT ?>include/estilos.css"> 
			<script language="javascript">
			<!--
			function doRedirect(myObject) {
			 	if (myObject.options[myObject.selectedIndex].value!="") { 
					top.location.href=myObject.options[myObject.selectedIndex].value; 
				}	else {
					return false;
				}
			}			
			function npshop_submit(action) {
				form = document.getElementById('npshop_form');
				form.action.value = action;
				form.submit();
			}
			// -->
			</script>
<script>
    <?php include_once('include/javascript.php'); ?>
</script>
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
							<PARAM NAME=movie VALUE="<?= NP_LANG == "en_US" ? "/ingles" : "" ?>/interface/iconos.swf">
							<PARAM NAME=quality VALUE=high>
							<PARAM NAME=bgcolor VALUE=#FFFFFF>
							<PARAM NAME=wmode VALUE=transparent>
							<PARAM NAME=menu VALUE=false>
							<EMBED src="<?= NP_LANG == "en_US" ? "/ingles" : "" ?>/interface/iconos.swf" quality=high bgcolor=#FFFFFF  WIDTH="311" HEIGHT="60" NAME="fondo" ALIGN=""  TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
						</OBJECT>

					</td>
					<td valign=top><img src="/interface/02-cen.gif" border=0 width="229" height="60"></td>
					<td valign=top align="right"><img src="<?= NP_LANG == "en_US" ? "/ingles" : "" ?>/interface/logo.gif" border=0 width="228" height="60"></td>
				</tr>				
			</table>
		</td>
	</tr>
	<!------------------FIN DE CABECERA------------------->

	<tr>
		<td valign=top background="/interface/03-izq.gif" width="11" height="100%">&nbsp;</td>

	<!------------------BOTONERA------------------->

        <td valign=top width="167" height="100%"><br><br><a href="javascript:switchLanguage('<?= NP_LANG ?>')"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>.gif" border=0 width="167" height="21"></a><br><br><br>
													<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="167" HEIGHT="390" id="fondo" ALIGN="">
																<PARAM NAME=movie VALUE="<?= NP_LANG == "en_US" ? "/ingles" : "" ?>/interface/botonera.swf">
																<PARAM NAME=quality VALUE=high>
																<PARAM NAME=bgcolor VALUE=#FFFFFF>
																<PARAM NAME=wmode VALUE=transparent>
																<PARAM NAME=menu VALUE=false>
																<EMBED src="<?= NP_LANG == "en_US" ? "/ingles" : "" ?>/interface/botonera.swf" quality=high bgcolor=#FFFFFF  WIDTH="167" HEIGHT="390" NAME="fondo" ALIGN=""  TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
													</OBJECT>

		</td>

	<!------------------FIN DE BOTONERA------------------->
		<td valign=top background="/interface/03-cen.gif" width="2" height="100%"></td>
		<td valign=top width="584" height="129">
			<table  width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">

				<tr>
					<td valign=top><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/banner-venta.gif" border=0 width="584" height="55"></td>
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
			<a class="negro" href="account.php"><?= _("Tu cuenta") ?></a><img src="/interface/cuenta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="cart.php"><?= _("Ver la cesta") ?></a><img src="/interface/cesta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="<?php echo SKIN_ROOT; ?>ayuda.php"><?= _("Ayuda") ?></a><img src="/interface/ayuda.gif" border=0 align=absmiddle hspace=5>
			</p>
		</td>
	</tr>
</table>	
<table width="100%" cellpadding="3" cellspacing="0" border="0" >
	<tr>
		<td style="border-bottom:1px #DADADA solid;" ><p class=p-dere>
			<span><strong><?= _("1. Selección de productos") ?></strong></span>&nbsp;
			<span class="pie"><?= _("2. Datos facturación y envío") ?></span>&nbsp;
			<span class="pie"><?= _("3. Comprobación y compra") ?></span>&nbsp;
			<span class="pie"><?= _("4. Resultado") ?></span>&nbsp;
		</td>
	</tr>
</table>	
<br>
<table cellpadding=6 cellspacing=0 border=0 width=550>
<?php 
    global $errorMsg, $errors;
    if (isset($errorMsg) && trim($errorMsg) != "") { 
?>
    <tr>
	    <td class="t-01" width="90%" colspan="2"><span class=error><?= _("ATENCIÓN:") ?> <?php echo $errorMsg ?></span></td>
	</tr>
<?php } ?>
    <tr>
		<td class="t-01" style="border-bottom:3px #DADADA solid;"><span class=titulo1><?= _("Tu cesta") ?></span></td>
		<!--td class="t-01" style="border-bottom:3px #DADADA solid;text-align:right;"><span class=titulo1><?= _("Envío mediante: Paquete Azul de Correos") ?></span></td-->
	</tr>
</table>
<br>

<form action="cart.php" id="npshop_form" method="post">
	<input type="hidden" name="action" value="update">
<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-02" width=500 colspan="2" style="border-bottom:3px #DADADA solid;"><span class=titulo2><?= _("Producto seleccionado") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:3px #DADADA solid;"><span class=titulo2><?= _("Cantidad") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:3px #DADADA solid;"><span class=titulo2><?= _("Precio") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:3px #DADADA solid;"><span class=titulo2><?= _("Total") ?></span></td>
	</tr>
<?php
foreach ($cart->items as $itemId => $item) {
?>
	<tr>
		<td class="00" width=200 style="border-bottom:1px #DADADA solid;">
			<img src="<?php echo SKIN_ROOT; ?>../../images/<?php echo $item->id ?>_p.jpg" border=0>
		</td>
		<td class="t-01" width=300 style="border-bottom:1px #DADADA solid;">
			<B><?php echo NP_get_i18n($item->name) ?></B><br>
				<?= _("Ref.") ?> <?php echo $item->id ?></a> <br>	
				<?php if (showValue($item->height)) { ?><?= _("Altura:") ?> <?php echo $item->height ?> mm <br><?php } ?>
				<?php if (showValue($item->depth)) { ?><?= _("Profundidad:") ?> <?php echo $item->depth ?> mm <br><?php } ?>
				<?php if (showValue($item->length)) { ?><?= _("Longitud:") ?> <?php echo $item->length ?> mm <br><?php } ?>							   
				<?php if (showValue($item->weight)) { ?><?= _("Peso:") ?> <?php echo $item->weight ?> gr<br><?php } ?>
				<?php if (isset($errors[$item->id])) { ?> <br/><span class=error><?php echo $errors[$item->id] ?></span> <?php } ?>
		</td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"><input class="fd3" value="<?php echo $item->quantity ?>" type="text" maxlength=60 name="<?php echo $item->id ?>_quantity"><input type="hidden" name="<?php echo $item->id ?>_id" value="<?php echo $item->id ?>"/><br><a class="rojo" href="cart.php?action=delete&itemId=<?php echo $item->id ?>"><?= _("eliminar") ?></a></td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"><?php echo $item->prize ?> €</td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"><span class=titulo2><?php echo $item->getSubTotal() ?> €</span></td>
	</tr>
<?php
}
?>
</table>

<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
		<td class="t-03" style="border-top:2px #DADADA solid;"><B><?= _("Subtotal:") ?></B></td>
		<td class="t-03" style="border-top:2px #DADADA solid;"><B><?php echo $cart->getSubTotal() ?> €</B></td>
	</tr>
	<tr>
	<? if (is_null($cart->user) || is_null($cart->user->shippingData['country'])) { ?>
		<td class="t-03"><?= _("Entre con su cuenta de usuario para conocer los gastos de envio a su país.") ?></td>
		<td class="t-03">-</td>
	<? } else { ?>
        <td class="t-03"><?= sprintf(_("Gastos de envío a %s (*):"), getCountryName($cart->user->shippingData['country'])) ?></td>
		<td class="t-03"><?php echo $cart->getShippingCost() ?> €</td>
	<? } ?>
	</tr>
	<!--tr>
		<td class="t-03"><?= _("Gastos para envíos fuera de España") ?> <select class="fd5" name="portafolio" >
						<option selected><?= _("Selecciona un país") ?></option>
						<option>País 1</option>
						<option>País 2</option>
						<option>País 3</option>
						<option>País 4</option>
						<option>País 5</option>
						<option>País 6</option>
						<option>País 7</option>

						</select></td>
		<td class="t-03"><?php echo $cart->getShippingCost(1) ?> €</td>
	</tr-->
	<tr>
		<td class="t-03"><span class=titulo3><?= _("Total de tu pedido:") ?></span></td>
		<td class="t-03"><span class=titulo3><?php echo $cart->getTotal(1) ?> €</span></td>
	</tr>
	<tr>
		<td colspan="2" class="t-03" style="border-bottom:3px #DADADA solid;"><a href="javascript:npshop_submit('update')" onmouseover="rollOn('b2_');" onmouseout="rollOff('b2_');chequear('b2_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b02-actualizar-subtotal-off.gif" border=0  align=right name=b2_></a></td>	
	</tr>
</table>

</form>

<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
		<td colspan="2" class="t-03">
			<!--a href="listCategory.php" onmouseover="rollOn('b8_');" onmouseout="rollOff('b8_');chequear('b8_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b08-seguir-comprando-off.gif" border=0  name=b8_></a-->
			<a href="javascript:npshop_submit('update_continue');" onmouseover="rollOn('b8_');" onmouseout="rollOff('b8_');chequear('b8_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b08-seguir-comprando-off.gif" border=0  name=b8_></a>
<?php 
if (sizeof($cart->items) > 0) {
?>
			<!--a href="confirmCart.php" onmouseover="rollOn('b5_');" onmouseout="rollOff('b5_');chequear('b5_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b05-finalizar-pedido-off.gif" border=0  name=b5_></a-->
			<a href="javascript:npshop_submit('update_confirm');" onmouseover="rollOn('b5_');" onmouseout="rollOff('b5_');chequear('b5_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b05-finalizar-pedido-off.gif" border=0  name=b5_></a>
<?php } ?>
        </td>
	</tr>
</table>
<br>
<table cellpadding=6 cellspacing=0 border=0 width=550>
    <tr>
		<td class="t-03" style="text-align: left">
		    <? 
		    if (isset($cart->user->shippingData) && array_key_exists('country', $cart->user->shippingData)) {
		        if ($cart->user->shippingData['country'] === 73) { // España
    	   	        echo _("(*) Envío mediante Paquete Azul de Correos");
    		    } else { 
    		        echo _("(*) Envío mediante Paquete Internacional Prioritario de Correos");
    		    }
		    }
		    ?>
		</td>
	</tr>
</table>
<br><br>






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
		<td height="31"  valign=top colspan="5" align=center><p class=pie><?= _("General Ramirez de Madrid 8-10 28020 MADRID · España · Telf: + 34 687 327 796 · e-mail:") ?> <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a></td>
	</tr>



	<!------------------FIN DE PIE------------------->	



</table>
</center>
</body>
</html>
