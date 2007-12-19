<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");


$cart = get_cart();

$billingData_province = null;
$billingData_country = null;
$shippingData_province = null;
$shippingData_country = null;

if (isset($cart->user)) {
	$action = "confirm";
	
	$billingData_province = getProvinceName($cart->user->billingData['province']);
	$billingData_country = getCountryName($cart->user->billingData['country']);
	$shippingData_province = getProvinceName($cart->user->shippingData['province']);
	$shippingData_country = getCountryName($cart->user->shippingData['country']);
	
	showSkin(basename(__FILE__), $action);
} else {
	redirect(APP_ROOT."/flows/login.php");
}
?>