<?php
require_once("npshop/skin.php");
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

		<td valign=top width="167" height="100%"><br><br><a href="http://www.davidbenavente.com/ingles/corp/default.html"><img src="http://www.davidbenavente.com/interface/espa.gif" border=0 width="167" height="21"></a><br><br><br>
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
			<span><strong>1. Selección de productos</strong></span>&nbsp;
			<span class="pie">2. Datos facturación y envío</span>&nbsp;
			<span class="pie">3. Comprobación y compra</span>&nbsp;
			<span class="pie">4. Resultado</span>&nbsp;
		</td>
	</tr>
</table>	
<br>
<center>
<?php
global $categoryTitle;
?>
<table cellpadding=6 cellspacing=0 border=0 width=550  >
	<tr>
			<td class="t-01" width="70%" style="border-bottom:3px #DADADA solid;"><span class=titulo1><?php echo$categoryTitle?></span></td>

			<td class="t-03" style="border-bottom:3px #DADADA solid;">
			    <form action="listCategory.php" method="get" id="categoryForm">
					<select class="fd5" name="categoryId" onchange="javascript:showCategory()">	
<?php
global $categories,$item;
foreach ($categories as $cat) { 
?>					    
						<option value="<?php echo$cat[0]?>" <?php echo $item->categoryId==$cat[0]?"selected":""?>><?php echo$cat[1]?></option>
<?php
}
?>
					</select>
				</form>
			</td>
	</tr>
</table>
</center><br>
<center>


			<table width="100%" cellpadding="5" cellspacing="0" border="0">
				<tr>

					<td width="100%" colspan="2" valign="top">&nbsp;&nbsp;&nbsp;<B><?php echo $item->name ?></B></td>
				</tr>
				<tr>
					<td valign="top" colspan="2"><p class="p-center"><img src="<?php echo SKIN_ROOT; ?>../../images/<?php echo $item->id ?>_g.jpg" border=0 width="540"></p><br></td>
				</tr>
				<tr>
					<td  width="34%" valign="top" class="tienda" >
						<p>&nbsp;&nbsp;&nbsp;<span class=negro><strong>Datos técnicos:</strong></span>

							<ul>
						    <li><B><?php echo $item->name ?></B>
							<li>Ref. <?php echo $item->id ?>							
					        <?php /*if (showValue($item->tradeMark)) { ?><li><?php echo $item->tradeMark ?><br><?php }*/ ?>
							<?php if (showValue($item->dimen)) { ?><li>Dimensiones: <?php echo $item->dimen ?> mm <br><?php } ?>
							<?php if (showValue($item->height)) { ?><li>Altura: <?php echo $item->height ?> mm <br><?php } ?>
							<?php if (showValue($item->depth)) { ?><li>Profundidad: <?php echo $item->depth ?> mm <br><?php } ?>
							<?php if (showValue($item->length)) { ?><li>Longitud: <?php echo $item->length ?> mm <br><?php } ?>								    
							<?php if (showValue($item->weight)) { ?><li>Peso: <?php echo $item->weight ?> gr <br><?php } ?>								    
							<?php if (showValue($item->complement)) { ?><li><?php echo $item->complement ?><br><?php } ?>
							<?php if (showValue($item->complement2)) { ?><li><?php echo $item->complement2 ?><br><?php } ?>
                            <?php if (showValue($item->description)) { ?><li><?php echo $item->description ?><br><?php } ?>



							<br><li class="li-blanco"><span class=titulo6><?php echo $item->prize ?> €</span>
						</ul>
<?php if ($item->stock > 0) { ?>
						<a href="cart.php?action=add&itemId=<?php echo $item->id ?>" onmouseover="rollOn('b1_');" onmouseout="rollOff('b1_');chequear('b1_');" target=_self><img src="/interface/b01-anadir-off.gif" border=0  align=left name=b1_></a>
<?php } else { ?>
                        AGOTADO TEMPORALMENTE
<?php } ?>
					</td>


						<!----------------------------------------->

					<!--td  width="65%" valign="top" class="tienda" >
						<table cellpadding="0" cellspacing="0" border="1" width="350" BORDERCOLORDARK="BFBFBF" BORDERCOLORLIGHT="BFBFBF">
							<tr>
								<td width="450">
									<table cellpadding="0" cellspacing="0" border="0" width="100%">

										<tr>
											<td width="350" height="42" valign="top" colspan="2" ><img src="/interface/porque.gif" border=0 width="350" height="42" ></td>
										</tr>
										<tr>
											<td width="265" valign="top" >
												<table cellpadding="15" cellspacing="0" border="0" width="100%">
													<tr>
														<td width="100%" valign="top">
											
												<p><?php echo $item->description ?></p>

														</td>
													</tr>
												</table>
											
											</td>
											<td width="85" valign="bottom" ><img src="/interface/david.jpg" border="0"></td>
										</tr>
									</table>
								</td>
							</tr>

						</table>
					</td-->

	<!----------------------------------------->
				</tr>
				<!--tr>
					<td class="t-02" valign="top" colspan="2">
											<p>&nbsp;&nbsp;&nbsp;<span class=negro><strong>Detalle:</strong></span>
											<p class="p-center"><img src="<?php echo SKIN_ROOT; ?>../../images/<?php echo $item->id ?>_v.jpg" border=0 width="540"></p></td>

				</tr-->

			</table>


</center>
<p class=p-dere><a class=negro href="javascript:history.back()">< volver</a>&nbsp;&nbsp;&nbsp;&nbsp;<br><br>







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
