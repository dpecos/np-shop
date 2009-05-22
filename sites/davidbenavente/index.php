<?php
define('APP_ROOT', "../..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

require_once("npshop/skin.php");

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
			function showCategory() {
			    form = document.getElementById("categoryForm");
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
			
		</td>
	</tr>
</table>	

<center>

<br><br>

<table width="90%"  cellpadding="10" cellspacing="0" border="0">

				<tr>
							<td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=10"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/herramientas.jpg" border=0 width="226" height="182"></a></td>
							<td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=30"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/macetas.jpg" border=0 width="226" height="182"></a></td>
        </tr>

				<tr>
							<td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=20"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/tokoname.jpg" border=0 width="226" height="182"></a></td>
							<td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=35"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/usadas.jpg" border=0 width="226" height="182"></a></td>
				</tr>

        <tr>
              <td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=40"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/mesas.jpg" border=0 width="226" height="182"></a></td>
        			<td align="center"><a href="<?= APP_ROOT ?>/flows/listCategory.php?categoryId=50"><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/libros.jpg" border=0 width="226" height="182"></a></td>
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
		<td height="31"  valign=top colspan="5" align=center><p class=pie><?= _("General Ramirez de Madrid 8-10 28020 MADRID · España · Telf: + 34 687 327 796 · e-mail:") ?> <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a></td>
	</tr>



	<!------------------FIN DE PIE------------------->	



</table>
</center>
</body>
</html>

 
