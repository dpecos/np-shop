<?php
define('SKIN_ROOT', APP_ROOT."/sites/davidbenavente/"); 
    
global $skinFiles;
$skinFiles = array();

$skinFiles['listCategory.php'] = "productos.php";
$skinFiles['showItem.php'] = "ficha.php";
$skinFiles['cart.php'] = "cesta.php";
$skinFiles['account.php'] = "cuenta.php";
$skinFiles['login.php']['ok'] = "confirmarCompra.php";
$skinFiles['login.php']['loginForm'] = "acceso.php";
$skinFiles['personalData.php'] = "modificarDatos.php";
$skinFiles['confirmCart.php']['confirm'] = "confirmarCompra.php";
$skinFiles['confirmCart.php']['login'] = "acceso.php";
$skinFiles['TPV'] = "tpv.php";
$skinFiles['payment.php']['ok'] = "confirmarCompra.php";
$skinFiles['payment.php']['error'] = "cesta.php";

require_once(SKIN_ROOT."/npshop/common.php");
?>