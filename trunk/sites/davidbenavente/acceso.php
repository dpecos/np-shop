<?php
require_once("npshop/skin.php");
?>
<html><head><title><?= _("David Benavente. Estudio de bons�i") ?></title>
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
				form = document.getElementById('npshop_form_'+action);
				form.action.value = action
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
			<span class="pie"><?= _("1. Selecci�n de productos") ?></span>&nbsp;
<?php 
global $referrer;
if (isset($referrer) && $referrer == "confirmCart.php") { ?>
			<span><strong><?= _("2. Datos facturaci�n y env�o") ?></strong></span>&nbsp;
<?php } else { ?>
			<span class="pie"><?= _("2. Datos facturaci�n y env�o") ?></span>&nbsp;
<?php } ?>
			<span class="pie"><?= _("3. Comprobaci�n y compra") ?></span>&nbsp;
			<span class="pie"><?= _("4. Resultado") ?></span>&nbsp;
		</td>
	</tr>
</table>	
<br>


<table cellpadding=6 cellspacing=0 border=0 width=100%  >
<?php 
    global $errorMsg;
    if (isset($errorMsg) && trim($errorMsg) != "") { 
?>
    <tr>
        <td class="t-01" colspan="2"><span class=error><?= _("ATENCI�N:") ?> <?php echo $errorMsg ?></span></td>
    </tr>
<?php } ?>

	<tr>
		<td width="50%" valign="top">
		<form id="npshop_form_login" action="login.php" method="POST">
<?php
if (isset($referrer)) { 
?>
<input type="hidden" name="referrer" value="<?php echo $referrer ?>"/>
<?php } ?>
<input type="hidden" name="action"/>

			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span class=titulo2><?= _("Si ya tienes una cuenta con nosotros") ?></span></td></tr>
				<tr><td class="t-03" width=35% align=right style="border-left:1px #DADADA solid;"><br><?= _("e-mail") ?></td><td class="t-02" width=75% style="border-right:1px #DADADA solid;"><br><input class="ffd2" type="text" maxlength=60 name="email"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;"><?= _("Password (*)") ?></td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="password" maxlength=60 name="password"></td></tr>
				<tr>
					<td class="t-03" colspan="2" align=right style="border-left:1px #DADADA solid;" style="border-right:1px #DADADA solid;">
					<TABLE onclick="this.nextSibling.style.display=(this.nextSibling.style.display=='none')?'block':'none'" cellSpacing=1 cellPadding=5 width="100%" border=0>
		                    <TBODY>
			                    <TR>
				                      <TD class="t-03"><A onclick="return false;" href="#" class="faq"><a class=rojo href=###><?= _("He olvidado mi password") ?></a></A></TD>
								</TR>
							</TBODY>
						</TABLE>

	                 <TABLE style="DISPLAY: none" cellSpacing=0 cellPadding=10 width="100%" border=0>
	                    <TBODY>
		                    <TR>
			                      <TD><p><?= _("Env�anos un e-mail a <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a> desde la direcci�n de e-mail que usas en tu cuenta con nosotros, y te env�aremos un nuevo password.") ?>

								  </TD>
							 </TR>
						</TBODY>
					</TABLE>				
					</td>
				</tr>				<tr><td class="t-03" colspan="2" align=right style="border-left:1px #DADADA solid;"  style="border-bottom:1px #DADADA solid;" style="border-right:1px #DADADA solid;">
						<span class=p-dere><a href="javascript:npshop_submit('login')" onmouseover="rollOn('b3_');" onmouseout="rollOff('b3_');chequear('b3_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b03-continuar-off.gif" border=0  align=right name=b3_></a>
					</td>
				</tr>
			</table>
            
	<table cellpadding=6 cellspacing=0 border=0 width=100%>
    	<tr>
		<td class="t-03" style="text-align: left"><?= _("(*) M�ximo 20 caracteres.") ?></td>
		</tr>

	</table>	
	
    
		</form>	
		</td>
		<td width="50%" valign="top">
		<form id="npshop_form_register" action="login.php" method="POST">    
<?php
global $referrer;
if (isset($referrer)) { 
?>
<input type="hidden" name="referrer" value="<?php echo $referrer ?>"/>
<?php } ?>
<input type="hidden" name="action"/>

			<table cellpadding=6 cellspacing=0 border=0 width=100%  >
				<tr><td class="t-01" width=100% style="border-bottom:3px #DADADA solid;" colspan="2"><span class=titulo2><?= _("Si eres un usuario nuevo") ?></span></td></tr>
				<tr><td class="t-03" width=35% align=right style="border-left:1px #DADADA solid;"><br><?= _("e-mail") ?></td><td class="t-02" width=75% style="border-right:1px #DADADA solid;"><br><input class="ffd2" type="text" maxlength=60 name="email"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;"><?= _("Password (*)") ?></td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="password" maxlength=60 name="password1"></td></tr>
				<tr><td class="t-03" align=right style="border-left:1px #DADADA solid;"><?= _("Repetir password") ?></td><td class="t-02" style="border-right:1px #DADADA solid;"><input class="ffd2" type="password" maxlength=60 name="password2"></td></tr>
				<tr><td class="t-03" colspan="2" align=right style="border-left:1px #DADADA solid;"  style="border-bottom:1px #DADADA solid;" style="border-right:1px #DADADA solid;">
						<span class=p-dere><a href="javascript:npshop_submit('register')" onmouseover="rollOn('b9_');" onmouseout="rollOff('b9_');chequear('b9_');" target=_self><img src="<?= SKIN_ROOT ?>include/img/<?= NP_LANG ?>/b09-continuar-registro-off.gif" border=0  align=right name=b9_></a>
					</td>
				</tr>
			</table>
	       
		</td>
        </form>
	</tr>

	

	<tr>
				<td width="100%" valign="top" colspan="2"><p><?= _("Si eres un <B>usuario nuevo</B>, para acceder en el futuro a tu cuenta, podr�s hacerlo con tu e-mail y password. No necesitar�s meter de nuevo los datos de facturaci�n y env�o para las siguientes compras, aunque por supuesto podr�s modificarlos cuando lo necesites.") ?>

</p>


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
		<td height="31"  valign=top colspan="5" align=center><p class=pie><?= _("General Ramirez de Madrid 8-10 28020 MADRID � Espa�a � Telf: + 34 687 327 796 � e-mail:") ?> <a class=mas href=mailto:info@davidbenavente.com>info@davidbenavente.com</a></td>
	</tr>



	<!------------------FIN DE PIE------------------->	



</table>
</center>
</body>
</html>
