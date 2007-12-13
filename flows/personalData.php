<?php
define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$errorMsg = null;

function updateData($userOrig = null) {
    global $errorMsg;
	$user = null;
	
	if ($userOrig == null) {
		$user = new User();
	} else {
		$user = new User($userOrig->email, $userOrig->password);
	}
	
	$objectVars = array_keys(get_object_vars($user));
	
	foreach ($_REQUEST as $key => $value) {
		if (beginsWith($key, "user_")) {
			$path = split("_", $key);
			$property = $path[1];
			if (in_array($property, $objectVars)) {
				if (is_array($user->$property)) {
				    if (isset($_REQUEST['sameData']) && $_REQUEST['sameData'] == "true") {
				        if ($property == "billingData") {
				            $user->billingData = array_merge($user->billingData, array($path[2] => $value)); 
				            $user->shippingData = array_merge($user->shippingData, array($path[2] => $value)); 
				        }
				    } else
					    $user->$property = array_merge($user->$property, array($path[2] => $value));
				} else {
					$user->$property = $value;
				}
			}
		}
	}
    
	if (isset($_REQUEST['user_password']) && isset($_REQUEST['newPassword1']) && isset($_REQUEST['newPassword2']) && $_REQUEST['newPassword1'] == $_REQUEST['newPassword2']) {
		if ($user->password == $userOrig->password) {
		    $user->password = $_REQUEST['newPassword1'];
			$cart = get_cart();
			$cart->user->update($user);
			update_cart($cart);
		} else {
			global $error;
			$errorMsg = "El password antiguo no es correcto o los nuevos no coinciden.";
			return false;
		}
	} else {
	    $cart = get_cart();
		$cart->user->update($user);
		update_cart($cart);
	}

    /*
    $cart = get_cart();
    print_r($cart->user);
	$cart->user->update();
	*/
	
	// reload data from DDBB
	$cart->user = new User($cart->user->email, $cart->user->password);
	update_cart($cart);
	
	return true;
}


$referrer = get_referer();
if (!isset($referrer)) {
    $referrer = "";
}

$provinces = array();
function fetchProvinces($data) {
    global $provinces;
    $provinces[$data['PVC_CO_CODIGO']] = $data['PVC_VA_NOMBRE'];
}
$sqlProvinces = "SELECT * FROM NPS_PROVINCIAS ORDER BY 2";
NP_executeSelect($sqlProvinces, "fetchProvinces");

if (isset($_REQUEST["extended"]))
	$extended = $_REQUEST["extended"]; // bypass var

if ($referrer == "confirmCart.php") {
   
    if (!isset($extended))
	    $extended = false;

	showSkin(basename(__FILE__));

} else if ($referrer == "login.php") {
	
	$referrer = $_GET['referrer'];
	$extended = true;

	showSkin(basename(__FILE__));
		
} else if (endswith(__FILE__, $referrer) && $_ENV["REQUEST_METHOD"] == "POST") { // data modified
   
	$cart = get_cart();
	
	if (isset($cart->user->id))
	    $result = updateData($cart->user);
	else
	    $result = updateData();
	    
	if ($result) {
	
		$returnTo = "/flows/".$_REQUEST['referrer'];
		redirect(APP_ROOT.$returnTo);
		
	} else {
	    // there was an error
	    $referrer = $_REQUEST['referrer'];
	
		showSkin(basename(__FILE__));
	}
	
} else {
    $cart = get_cart();

    if (isset($cart->user)) {
        if (endswith(__FILE__, $referrer) && $_ENV["REQUEST_METHOD"] == "GET")
            $referrer = APP_ROOT;
        $extended = true;
       
    	showSkin(basename(__FILE__));
    } else {
        $referrer = get_referer();
        $redirectTo = "/flows/login.php?referrer=personalData.php?referrer=".$referrer;
	    redirect(APP_ROOT.$redirectTo);
    }
}

?>