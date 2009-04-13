<?php

if (DEBUG) {
	error_reporting( E_ALL | E_NOTICE );
} else {
	error_reporting( E_ERROR | E_WARNING | E_PARSE );
}
ini_set('display_errors', '1');

require_once(APP_ROOT."/common/cart.class.php");
require_once(APP_ROOT."/common/item.class.php");
require_once(APP_ROOT."/common/user.class.php");

function showSkin($file, $id = null) {
	global $skinFiles, $npshop;
	 
	header("Expires: Sat, 01 Jan 2000 01:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    loadSkinDescriptor();
	
    $skinFile = null;
    if (array_key_exists($file, $skinFiles)) {
    	if ($id != null) {
        	$skinFile = $skinFiles[$file][$id];
        } else {
			$skinFile = $skinFiles[$file];
		}
    } else {
        //TODO: error
    }
    
    bindtextdomain("messages", APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/i18n");
    
    require_once(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/".$skinFile);
}

function loadSkinDescriptor() {
	global $npshop;
    require_once(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/skin.php");
}


function get_cart() {
	if (!isset($_SESSION)) {
		session_start();
		//echo "Sesion iniciada";
	}
	//print_r($_SESSION);
	$cart = null;
	if (isset($_SESSION['cart'])) {
		$cart = $_SESSION['cart'];
	} else {
 		$cart = new Cart();
 		$_SESSION['cart'] = $cart;
 	}
 	return $cart;
}

function update_cart($cart) {
	if (isset($_SESSION))
		$_SESSION['cart'] = $cart;
}	

function getProvinceName($provinceId) {
    global $ddbb;
    
    if ($provinceId < 0)
        return "-";
    
    if ($provinceId != null && trim($provinceId) != "") {
        $data = $ddbb->executePKSelectQuery("SELECT PVC_VA_NOMBRE FROM NPS_PROVINCIAS WHERE PVC_CO_CODIGO=".$provinceId);
        return $data["PVC_VA_NOMBRE"];
    }
}

function getCountryName($countryId) {
    global $ddbb;
    if ($countryId != null && trim($countryId) != "") {
        $data = $ddbb->executePKSelectQuery("SELECT name FROM NPS_PAISES WHERE id=".$countryId);
        return NP_get_i18n(NP_DDBB::decodeSQLValue($data["name"], "STRING_I18N"));
    }
}

function formatOrderId($cart) {
    return sprintf("%06d", $cart->orderId);
}
?>
