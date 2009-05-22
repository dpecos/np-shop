<?php
define('APP_ROOT', "../..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

require_once("npshop/skin.php");

	header("Expires: Sat, 01 Jan 2000 01:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
bindtextdomain("messages", APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/i18n");

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

		<td valign=top width="167" height="100%"><br><br><a href="javascript:switchLanguage('<?= NP_LANG ?>')"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>.gif" border=0 width="167" height="21"></a><br><br>
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
			<a class="negro" href="<?php echo SKIN_ROOT; ?>../../flows/account.php"><?= _("Tu cuenta") ?></a><img src="/interface/cuenta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="<?php echo SKIN_ROOT; ?>../../flows/cart.php"><?= _("Ver la cesta") ?></a><img src="/interface/cesta.gif" border=0 align=absmiddle hspace=5>&nbsp;
			<a class="negro" href="<?php echo SKIN_ROOT; ?>ayuda.php"><?= _("Ayuda") ?></a><img src="/interface/ayuda.gif" border=0 align=absmiddle hspace=5>
			</p>
		</td>
	</tr>
</table>	
<table width="100%" cellpadding="3" cellspacing="0" border="0" >
	<tr>
		<td style="border-bottom:1px #DADADA solid;" ><p class=p-dere>
			<span class="pie"><?= _("1. Selección de productos") ?></span>&nbsp;
			<span class="pie"><?= _("2. Datos facturación y envío") ?></span>&nbsp;
			<span class="pie"><?= _("3. Comprobación y compra") ?></span>&nbsp;
			<span class="pie"><?= _("4. Resultado") ?></span>&nbsp;
		</td>
	</tr>
</table>	
<br>
<center>

<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-01" width="70%" style="border-bottom:3px #DADADA solid;"><span class=titulo1><?= _("Ayuda") ?></span></td>
	</tr>
</table>


<table cellpadding="15" cellspacing="0" border="0" width="100%"  >
	<tr>
			<td width="90%">

<br>

<p class=titulo1><?= _("Atención al cliente") ?> </p>

<p><?= _("Para cualquier consulta o información puedes contactar con nosotros:") ?> 
<ul>
	<li><?= _("Telf: + 34 687 327 796") ?> 
	<li><?= _("e-mail:") ?> <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a>
</ul>


<p class=titulo1><?= _("Protección de datos personales") ?> </p>

<p><?= _("Los datos personales facilitados al realizar un pedido de compra quedarán registrados en nuestro fichero de clientes. Los datos serán utilizados exclusivamente para enviarte los productos solicitados así como información sobre Novedades, Ofertas y Promociones en caso de autorizarnos.") ?> 
<p><?= _("Estos datos personales son totalmente confidenciales y serán tratados de acuerdo con la Ley Orgánica de Regulación de Tratamiento Automatizado de los Datos de Carácter Personal (L.O.R.T.A.D).") ?>

<p><?= _("Para ejercitar tus derechos de acceso, rectificación o cancelación de datos personales, puedes dirigirte por correo certificado a:") ?>

<ul>
	<li><?= _("David Benavente<br>General Ramirez de Madrid 8-10 <br>28020 MADRID<br>España") ?>
</ul>


<p class=titulo1><?= _("Precios") ?></p>


<p><?= _("El precio de venta al público incluido IVA, está indicado en todos los productos y será el vigente en el momento de realizar el pedido de compra.") ?>


<p class=titulo1><?= _("Gastos de envío") ?></p>


<table cellpadding=6 cellspacing=0 border=1 width=50%  BGCOLOR=#E8E8E8 BORDERCOLORDARK=#FFFFFF BORDERCOLORLIGHT=#FFFFFF>
		<tr>
			<td class="06" width=100% colspan="2"><?= _("España") ?> </td>
		</tr>
		<tr>
			<td class="07" width=50% style="padding-left: 17px" ><?= _("Hasta  2 Kg.") ?> </td>
			<td class="08" width=50%  >6 €</td>
		</tr>
		<tr>
			<td class="07" width=50%  style="padding-left: 17px"  ><?= _("Hasta  5 Kg.") ?> 
			<td class="08" width=50%  >7 €
		</tr>
		<tr>
			<td class="07" width=50%  style="padding-left: 17px"  ><?= _("Hasta  10 Kg.") ?> 
			<td class="08" width=50%  >8 €
		</tr>
		<tr>
			<td class="07" width=50%  style="padding-left: 17px"  ><?= _("Hasta  15 Kg.") ?> 
			<td class="08" width=50%  >11 €
		</tr>
		<tr>
			<td class="07" width=50%  style="padding-left: 17px"  ><?= _("Hasta  20 Kg.") ?> 
			<td class="08" width=50%  >13 €
		</tr>

 


</table>






<p class=titulo1><?= _("Forma de pago") ?></p>

<p><?= _("TARJETA: Puedes realizar el pago de tu compra con las siguientes tarjetas: Todas las tarjetas Visa, Mastercard y Euro 6000.") ?> 

<p class=titulo1><?= _("Plazo de envío") ?> </p>

<p><?= _("Los pedidos se envían en un plazo aproximado de 7/10 días hábiles desde su fecha de recepción.") ?>





<p class=titulo1><?= _("Forma de envío") ?> </p>

<p><?= _("Todos los pedidos se envían a través del servicio de Correos (Paquete Azul).") ?>

 


<p><?= _("El cartero te lo entregará en la dirección de envío que nos hayas indicado, en caso de que no pueda efectuar la entrega, te dejará un aviso para recogerlo en la oficina de Correos.") ?>



<p class=titulo1><?= _("Anulación de pedidos y productos") ?></p>

<p><?= _("En caso de que quieras anular un pedido o un producto antes de que te lo enviemos, puedes hacerlo poniéndote en contacto con nosotros.") ?>

<p><?= _("Si el pedido ha sido enviado, por favor consulta el apartado de Cambios y Devoluciones.") ?>


<p class=titulo1><?= _("Cambios y devoluciones") ?> </p>

<p><?= _("Para tu total tranquilidad y en cumplimiento de la legislación vigente, tienes derecho a cambiar o devolver los productos comprados en un plazo máximo de 15 días hábiles desde su fecha de recepción, siempre que éstos se encuentren en su envoltorio original sin desprecintar. Los gastos de devoluciones correran por cuenta del cliente.") ?>









</td>
</tr>
</table>

<p class=p-dere><a class=negro href="javascript:history.back()"><?=_("< volver")?></a>

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
