<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php"); 
require_once(APP_ROOT."/common/commonFunctions.php");

$errorMsg = null;

if (isset($_REQUEST['action']) && $_REQUEST['action'] != null) {
	if ($_REQUEST['action'] == "login") {
		
		$user = new User($_REQUEST['email'], $_REQUEST['password']);
	    
		if (isset($user->email)) {
			$cart = get_cart();	
			$cart->user = $user;
			update_cart($cart);
			if (isset($_REQUEST['referrer']) && $_REQUEST['referrer'] != null) {
				redirect(APP_ROOT."/flows/".$_REQUEST['referrer']);
			} else
				$action = "ok";
			
		} else {
			$action = "loginForm";
			$errorMsg = _("Usuario o contraseña incorrectos.");
		}
		
		showSkin(basename(__FILE__), $action);
		
	} else if ($_REQUEST['action'] == "register") {
		
		if ($_REQUEST['password1'] == $_REQUEST['password2'] && trim($_REQUEST['password1']) != "") {
			$cart = get_cart();
			$user = new User();
			$user->email = $_REQUEST['email'];
			$user->password = $_REQUEST['password1'];
			
			$cart->user = $user;
			update_cart($cart);
						
			$referrer = $_REQUEST["referrer"];
			
			redirect(APP_ROOT."/flows/personalData.php?referrer=".$referrer);
			
		} else {
			$action = "loginForm";
			$errorMsg = _("Passwords no coinciden o son vacíos.");
		}
		
		showSkin(basename(__FILE__), $action);
		
	} 
	
} else {
	
	$action = "loginForm";
	$referrer = get_referer();
	
	if (isset($referrer)) {
		if ($referrer == "cart.php")
			$referrer = "confirmCart.php";
	}
	if (isset($_GET['referrer']))
	    $referrer = $_GET['referrer'];
	
	showSkin(basename(__FILE__), $action);
}
	

?>