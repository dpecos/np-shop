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
require_once(APP_ROOT."/lib/NPLib_String.php");
require_once(APP_ROOT."/lib/NPLib_Net.php");
require_once(APP_ROOT."/lib/NPLib_Object.php");

function showSkin($file, $id = null) {
	global $skinFiles, $npshop;
	 
	 header("Expires: Sat, 01 Jan 2000 01:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    loadSkinDescriptor();
	
    $skinFile = null;
    if (array_key_exists($file, $skinFiles))
    	if ($id != null) {
        	$skinFile = $skinFiles[$file][$id];
        } else {
			$skinFile = $skinFiles[$file];
		}
    else {
        //TODO: error
    }
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

function _obtainKeyForValue($hash, $value) {
	foreach ($hash as $key1 => $val1) {
		if (is_array ($val1)) {
			foreach ($val1 as $key2 => $val2) {
			    if (is_array($val2)) {
			        foreach ($val2 as $key3 => $val3) {
			            if ($val3 == $value)
					        return array($key1, $key2, $key3);
					}
				} else if ($val2 == $value)
					return array($key1, $key2);
			}
		} else if ($val1 == $value) {
			return $key1;
		}
	}
	return null;
}

function get_referer() {
    if (isset($_SERVER['HTTP_REFERER']))
        $referer = $_SERVER['HTTP_REFERER'];
    else if (isset($_ENV['HTTP_REFERER']))
        $referer = $_ENV['HTTP_REFERER'];
    else 
        return null;
	$referer = split("/", $referer);
	$referer = $referer[sizeof($referer)-1];
	$index = strpos($referer, "?");
	if ($index > 0) {
		$referer = substr($referer, 0, $index);
	}
	return $referer;
}

function getProvinceName($provinceId) {
    if ($provinceId != null && trim($provinceId) != "") {
        $data = NP_executePKSelect("SELECT PVC_VA_NOMBRE FROM NPS_PROVINCIAS WHERE PVC_CO_CODIGO=".$provinceId);
        return $data["PVC_VA_NOMBRE"];
    }
}

function getCountryName($countryId) {
    if ($countryId != null && trim($countryId) != "") {
        $data = NP_executePKSelect("SELECT PAI_VA_NOMBRE FROM NPS_PAISES WHERE PAI_CO_CODIGO=".$countryId);
        return $data["PAI_VA_NOMBRE"];
    }
}

function formatOrderId($cart) {
    return sprintf("%06d", $cart->orderId);
}
?>