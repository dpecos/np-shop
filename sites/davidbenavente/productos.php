<?php
require_once("npshop/skin.php");
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
<center>
<?php
global $categoryTitle, $msg;
?>
<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-01" width="70%" style="border-bottom:3px #DADADA solid;"><span class=titulo1><?php echo NP_get_i18n($categoryTitle)?></span></td>
			<td class="t-03" style="border-bottom:3px #DADADA solid;">
			    <form method="get" id="categoryForm">
			        <!--input type="hidden" name="sourceCategoryId" value="<?php echo $_GET['categoryId'] ?>"/-->
					<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?php
global $categories;
foreach ($categories as $cat) { 
?>					    
						<option value="<?php echo $cat[0]?>" <?php echo $_GET['categoryId']==$cat[0]?"selected":""?>><?php echo NP_get_i18n($cat[1])?></option>
<?php
}
?>
					</select>
			    <form>
			</td>
			
	</tr>
	<tr><td><p><?= _("Todos los precios incluyen IVA") ?></td></tr>
</table>
</center><br>
<center>

<table width="80%" cellpadding="8" cellspacing="0" border="0">
<?php
global $items;
$i = 0;
foreach ($items as $item) {
    if ($i % 2 == 0) {
?>
	<tr>
	    <td width="50%" valign="top"  style="border-right:1px #E7E7E7 solid; border-bottom:1px #E7E7E7 solid;">
<?php  
    } else {
?>	
		<td width="50%" valign="top" style="border-bottom:1px #E7E7E7 solid;">
<?php  
    }
?>
			<table width="100%" cellpadding="5" cellspacing="0" border="0">
				<tr>
					<td width="100%" colspan="2" valign="top"><a class="mas" href="showItem.php?itemId=<?php echo $item->id ?>"><B><?php echo NP_get_i18n($item->name) ?></B></a></td>
				</tr>
				<tr>
					<td valign="top"><a class="mas" href="showItem.php?itemId=<?php echo $item->id ?>"><img src="<?php echo SKIN_ROOT; ?>../../images/<?php echo $item->id ?>_p.jpg" border=0 width="200" ></a></td>
				</tr>
				<tr>
					<td valign="top" class="tienda" >
						<ul>
									<li>Ref. <?php echo $item->id ?>
									<?php /* if (showValue($item->tradeMark)) { ?><li><?php echo $item->tradeMark ?><br><?php } */?>
									<?php if (showValue($item->dimen)) { ?><li><?= _("Dimensiones:") ?> <?php echo $item->dimen ?> mm <br><?php } ?>
									<?php if (showValue($item->height)) { ?><li><?= _("Altura:") ?> <?php echo $item->height ?> mm <br><?php } ?>
									<?php if (showValue($item->depth)) { ?><li><?= _("Profundidad:") ?> <?php echo $item->depth ?> mm <br><?php } ?>
									<?php if (showValue($item->length)) { ?><li><?= _("Longitud:") ?> <?php echo $item->length ?> mm <br><?php } ?>								    
									<?php if (showValue($item->complement)) { ?><li><?php echo NP_get_i18n($item->complement) ?><br><?php } ?>
									<?php if (showValue($item->complement2)) { ?><li><?php echo NP_get_i18n($item->complement2) ?><br><?php } ?>
									<br><li class="li-blanco"><span class=titulo6><?php echo $item->prize ?> €</span>
						</ul>
<?php if ($item->stock > 0) { ?>
						<a href="cart.php?action=add&itemId=<?php echo $item->id ?>" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b01-anadir-off.gif" onmouseover="rollOn('b1_', this);" onmouseout="rollOff('b1_',this);chequear('b1_',this);" border=0  align=left name=b1_></a>
<?php } else { ?>
                        <?= _("AGOTADO TEMPORALMENTE") ?>
<?php } ?>
					</td>
				</tr>
			</table>
		</td>
<?php
if ($i % 2 != 0) {
?>
	</tr>
<?php  
    }
    $i++;
}
?>

</table>

<center>

<?php if (isset($msg) && $msg != null) { ?>
    <span class="t-01"><?php echo $msg ?></span>
<?php } ?>





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
