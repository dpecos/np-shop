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
            function doPayment() {
                payment = document.getElementById("payment_method");
                top.location.href = "payment.php?method=" + payment.value;
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
<?php
global $billingData_province ,$billingData_country, $shippingData_province, $shippingData_country, $paymentResult, $errorMsg;
?>
<table width="100%" cellpadding="3" cellspacing="0" border="0" >
	<tr>
		<td style="border-bottom:1px #DADADA solid;" ><p class=p-dere>
			<span class="pie"><?= _("1. Selección de productos") ?></span>&nbsp;
			<span class="pie"><?= _("2. Datos facturación y envío") ?></span>&nbsp;
<?php if (isset($paymentResult)) { ?>
			<span class="pie"><?= _("3. Comprobación y compra") ?></span>&nbsp;
			<span><strong><?= _("4. Resultado") ?></strong></span>&nbsp;
<?php } else { ?>
			<span><strong><?= _("3. Comprobación y compra") ?></strong></span>&nbsp;
			<span class="pie"><?= _("4. Resultado") ?></span>&nbsp;
<?php } ?>
		</td>
	</tr>
</table>	
<br>

<center>
<table cellpadding=6 cellspacing=0 border=0 width=100%>
    <tr>
        <td colspan="2">
<?php if (isset($paymentResult)) { 
    if ($paymentResult === "ok") { ?>
<?        if ($cart->orderStatus == $npshop["constants"]["ORDER_STATUS"]["PAYMENT_TRANSFER"]) { ?>
        <p class="rojo"><?= _("La compra queda pendiente de pago por transferencia a la cuenta:") ?></p>
        <blockquote>
            <p class="rojo"><?= _("Titular") ?>: David Benavente<p/>
            <p class="rojo"><?= _("Entidad") ?>: Cajamadrid<p/>
            <p class="rojo">2038-1576-52-6000042530</p>
        </blockquote>
<?        } else if ($cart->orderStatus == $npshop["constants"]["ORDER_STATUS"]["PENDING_SENT_ONDELIVERY"]) { ?>
        <p class="rojo"><?= _("El pedido ha sido realizado con éxito y será enviado contrareembolso a la dirección que has indicado.") ?></p>
<?        } else { ?>
        <p class="rojo"><?= _("Muchas gracias. La compra ha sido realizada con éxito.") ?></p>
<?        } ?>
		<p class="rojo"><?= _("Te remitiremos los datos de tu pedido por email:") ?></p>
<?php   } else { ?>
<p class="rojo"><?= _("Se ha producido algún error en el proceso de pago con la entidad bancaria.") ?></p>
<?php   }?>
<?php } else { ?>
<?php   if (isset($errorMsg)) { ?>
<p class="rojo"><?= _("ERROR:") ?> <?php echo $errorMsg ?></p>
<?php   }?>
<p><?= _("Por favor, comprueba que los datos de tu pedido son correctos:") ?></p>
<?php }?>
        </td>
    </tr>
	<tr>
		<td width="50%" valign="top"  height="100%">
			<table cellpadding=6 cellspacing=0 border=0 width=100%  height="100%"  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span class=titulo2><?= _("Datos de facturación") ?></span></td></tr>
				<tr>
					<td class="t-01" valign="top" height="100%" width=100% align=right style="border-bottom:1px #DADADA solid;" style="border-left:1px #DADADA solid;" style="border-right:1px #DADADA solid;">
						<br><ul>
							<?php echo $cart->user->billingData['name'] ?> <?php echo $cart->user->billingData['surname'] ?><br>
							<?php echo $cart->user->billingData['address'] ?> <?php echo $cart->user->billingData['address2'] ?><br>
							<?php echo $cart->user->billingData['postalCode'] ?> <?php echo $cart->user->billingData['city'] ?><br>
							<?php echo $billingData_province ?><br>
							<?php echo $billingData_country ?><br>
							<?php echo $cart->user->billingData['phone'] ?><br>
							<?php echo $cart->user->email ?><br><br>

							

					</td>
				</tr>
			</table>	
		</td>

		<td width="50%" valign="top" height="100%">
			<table cellpadding=6 cellspacing=0 border=0 width=100%  height="100%"   >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2" valign="top"><span class=titulo2><?= _("Datos de envío") ?></span></td></tr>
				<tr>
					<td class="t-01"  height="100%" valign="top" width=35% align=right style="border-bottom:1px #DADADA solid;" style="border-left:1px #DADADA solid;" style="border-right:1px #DADADA solid;">
						<br><ul>
							<?php echo $cart->user->shippingData['name'] ?> <?php echo $cart->user->shippingData['surname'] ?><br>
							<?php echo $cart->user->shippingData['address'] ?> <?php echo $cart->user->shippingData['address2'] ?><br>
							<?php echo $cart->user->shippingData['postalCode'] ?> <?php echo $cart->user->shippingData['city'] ?><br>
							<?php echo $shippingData_province ?><br>
							<?php echo $shippingData_country ?><br>
							<?php echo $cart->user->shippingData['phone'] ?><br>
							<?php echo $cart->user->email ?><br><br>


					</td>
				</tr>


			</table>	
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;
<?php if ($paymentResult === "error" || !isset($paymentResult)) { ?>
			<span class=p-dere><a href="personalData.php" onmouseover="rollOn('b6_');" onmouseout="rollOff('b6_');chequear('b6_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b06-modificar-datos-off.gif" border=0  align=right name=b6_></a>
<?php } ?>
		</td>
	</tr>
				
</table>



<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-01" width=500 colspan="5" style="border-bottom:3px #DADADA solid;"><span class=titulo2><?= _("Tu pedido") ?></span></td>
	</tr>
	<tr>
			<td class="t-01" width=500 colspan="5" style="border-left:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;" style="border-right:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;">
<?php if (isset($paymentResult)) { ?>
                <span><?= _("Nº de tu pedido:") ?> <?php echo formatOrderId($cart) ?></span>
<?php } ?>
				<!--span>El plazo de entrega de tu pedido es de <?php echo $cart->shippingDays ?> días</span-->
			</td>
	</tr>
	<tr>
			<td class="t-02" width=500 colspan="2" style="border-left:1px #DADADA solid;" style="border-bottom:1px #DADADA solid;"><span class=titulo2><?= _("Productos") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:1px #DADADA solid;"><span class=titulo2><?= _("Cantidad") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:1px #DADADA solid;"><span class=titulo2><?= _("Precio") ?></span></td>
			<td class="t-02" width=50 style="border-bottom:1px #DADADA solid;" style="border-right:1px #DADADA solid;"><span class=titulo2 ><?= _("Total") ?></span></td>
	</tr>
<?php
foreach ($cart->items as $itemId => $item) {
?>
	<tr>
		<td class="00" width=200 style="border-bottom:1px #DADADA solid;" style="border-left:1px #DADADA solid;">
			<img src="<?php echo SKIN_ROOT; ?>../../images/<?php echo $item->id ?>_p.jpg" border=0>
		</td>
		<td class="t-01" width=300 style="border-bottom:1px #DADADA solid;">
				<B><?php echo NP_get_i18n($item->name) ?></B><br>
				<?= _("Ref.") ?> <?php echo $item->id ?></a> <br>
				<?php if (showValue($item->weight)) { ?><?= _("Peso:") ?> <?php echo $item->weight ?> gr<br><?php } ?>
		</td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"><?php echo $item->quantity ?></td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"><?php echo $item->prize ?> €</td>
		<td class="t-02" style="border-bottom:1px #DADADA solid;"  style="border-right:1px #DADADA solid;"><span class=titulo2><?php echo $item->getSubTotal() ?> €</span></td>
	</tr>
<?php
}
?>
</table>

<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
		<td class="t-03" style="border-left:1px #DADADA solid;"><B><?= _("Subtotal:") ?></B></td>
		<td class="t-03" style="border-right:1px #DADADA solid;"><B><?php echo $cart->getSubTotal() ?> €</B></td>
	</tr>
	<tr>
		<td class="t-03" style="border-left:1px #DADADA solid;"><?= _("Gastos de envío:") ?></td>
		<td class="t-03" style="border-right:1px #DADADA solid;"><?php echo $cart->getShippingCost(1) ?> €</td>
	</tr>
	<tr>
		<td class="t-03" style="border-left:1px #DADADA solid;"><span class=titulo3><?= _("Total de tu pedido:") ?></span></td>
		<td class="t-03" style="border-right:1px #DADADA solid;"><span class=titulo3><?php echo $cart->getTotal(1) ?> €</span></td>
	</tr>
	<tr>
		<td colspan="2" class="t-03" style="border-bottom:1px #DADADA solid;" style="border-left:1px #DADADA solid;" style="border-right:1px #DADADA solid;">&nbsp;
<?php if ($paymentResult === "error" || !isset($paymentResult)) { ?>
		    <a href="cart.php" onmouseover="rollOn('b7_');" onmouseout="rollOff('b7_');chequear('b7_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b07-modificar-pedido-off.gif" border=0  align=right name=b7_></a>
<?php } ?>
		</td>	
	</tr>
</table>


<?php if ($paymentResult === "error" || !isset($paymentResult)) { ?>
<table cellpadding=6 cellspacing=0 border=0 width=550  >
    <tr>
        <td colspan="2" class="t-03">&nbsp;
        <?= _("Seleccione la forma de pago que desee utilizar") ?>:&nbsp;
        <select id="payment_method">
            <option value="credit_card"><?= _("Tarjeta de crédito") ?></option>
            <option value="transfer"><?= _("Transferencia bancaria") ?></option>
            <option value="on_delivery"><?= _("Contrareembolso") ?></option>
        </select>
        </td>
    </tr>
</table>
<?php } ?>

<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
		<td colspan="2" class="t-03">&nbsp;
<?php if ($paymentResult === "error" || !isset($paymentResult)) { ?>
		    <a href="javascript:doPayment()" onmouseover="rollOn('b4_');" onmouseout="rollOff('b4_');chequear('b4_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b04-finalizar-compra-off.gif" border=0  align=right name=b4_></a>
<?php } ?>
		</td>	
	</tr>
</table>
<br><br>





</center>







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
