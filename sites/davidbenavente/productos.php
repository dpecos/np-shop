<?php
require_once("npshop/skin.php");
?>
<html><head><title>David Benavente. Estudio de bons�i</title>
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
			function showCategory() {
			    form = document.getElementById("categoryForm");
			    form.submit();
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
<table width="100%" cellpadding="3" cellspacing="0" border="0" >
	<tr>
		<td style="border-bottom:1px #DADADA solid;" ><p class=p-dere>
			<span><strong>1. Selecci�n de productos</strong></span>&nbsp;
			<span class="pie">2. Datos facturaci�n y env�o</span>&nbsp;
			<span class="pie">3. Comprobaci�n y compra</span>&nbsp;
			<span class="pie">4. Resultado</span>&nbsp;
		</td>
	</tr>
</table>	
<br>
<center>
<?
global $categoryTitle, $msg;
?>
<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-01" width="70%" style="border-bottom:3px #DADADA solid;"><span class=titulo1><?=$categoryTitle?></span></td>
			<td class="t-03" style="border-bottom:3px #DADADA solid;">
			    <form method="get" id="categoryForm">
			        <!--input type="hidden" name="sourceCategoryId" value="<?= $_GET['categoryId'] ?>"/-->
					<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?
global $categories;
foreach ($categories as $cat) { 
?>					    
						<option value="<?=$cat[0]?>" <?= $_GET['categoryId']==$cat[0]?"selected":""?>><?=$cat[1]?></option>
<?
}
?>
					</select>
			    <form>
			</td>
			
	</tr>
	<tr><td><p>Todos los precios incluyen IVA</td></tr>
</table>
</center><br>
<center>

<table width="80%" cellpadding="8" cellspacing="0" border="0">
<?
global $items;
$i = 0;
foreach ($items as $item) {
    if ($i % 2 == 0) {
?>
	<tr>
	    <td width="50%" valign="top"  style="border-right:1px #E7E7E7 solid; border-bottom:1px #E7E7E7 solid;">
<?  
    } else {
?>	
		<td width="50%" valign="top" style="border-bottom:1px #E7E7E7 solid;">
<?  
    }
?>
			<table width="100%" cellpadding="5" cellspacing="0" border="0">
				<tr>
					<td width="100%" colspan="2" valign="top"><a class="mas" href="showItem.php?itemId=<?= $item->id ?>"><B><?= $item->name ?></B></a></td>
				</tr>
				<tr>
					<td valign="top"><a class="mas" href="showItem.php?itemId=<?= $item->id ?>"><img src="<?php echo SKIN_ROOT; ?>../../images/<?= $item->id ?>_p.jpg" border=0 width="200" ></a></td>
				</tr>
				<tr>
					<td valign="top" class="tienda" >
						<ul>
									<li>Ref. <?= $item->id ?>
									<? /* if (showValue($item->tradeMark)) { ?><li><?= $item->tradeMark ?><br><? } */?>
									<? if (showValue($item->height)) { ?><li>Altura: <?= $item->height ?> mm <br><? } ?>
									<? if (showValue($item->depth)) { ?><li>Profundidad: <?= $item->depth ?> mm <br><? } ?>
									<? if (showValue($item->length)) { ?><li>Longitud: <?= $item->length ?> mm <br><? } ?>								    
									<? if (showValue($item->complement)) { ?><li><?= $item->complement ?><br><? } ?>
									<? if (showValue($item->complement2)) { ?><li><?= $item->complement2 ?><br><? } ?>
									<br><li class="li-blanco"><span class=titulo6><?= $item->prize ?> �</span>
						</ul>
<? if ($item->stock > 0) { ?>
						<a href="cart.php?action=add&itemId=<?= $item->id ?>" onmouseover="rollOn('b1_');" onmouseout="rollOff('b1_');chequear('b1_');" target=_self><img src="/interface/b01-anadir-off.gif" border=0  align=left name=b1_></a>
<? } else { ?>
                        AGOTADO TEMPORALMENTE
<? } ?>
					</td>
				</tr>
			</table>
		</td>
<?
if ($i % 2 != 0) {
?>
	</tr>
<?  
    }
    $i++;
}
?>

</table>

<center>

<? if (isset($msg) && $msg != null) { ?>
    <span class="t-01"><?= $msg ?></span>
<? } ?>





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
		<td height="31"  valign=top colspan="5" align=center><p class=pie>General Ramirez de Madrid 8-10 28020 MADRID � Espa�a � Telf: + 34 687 327 796 � e-mail: <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a></td>
	</tr>



	<!------------------FIN DE PIE------------------->	



</table>
</center>
</body>
</html>