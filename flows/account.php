<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");


$cart = get_cart();

if (isset($cart->user)) {
	showSkin(basename(__FILE__));
} else {
	redirect(APP_ROOT."/flows/login.php?referrer=account.php");
}
?>