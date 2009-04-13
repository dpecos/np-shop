<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$errorMsg = null;
$errors = array();

if (isset($_GET["result"])) {
    // user TPV response
    
    $paymentResult = $_GET["result"];
    
    $cart = get_cart();

    // do not update order! TPV will!    
    if (!is_null($cart) && isset($cart->orderId) && $cart->orderId != null) {
        $userEmail = $cart->user->email;
        $userPassword = $cart->user->password;
        
        $cartN = new Cart($cart->orderId);
        $cartN->user->email = $userEmail;
        
    	$billingData_province = getProvinceName($cartN->user->billingData['province']);
    	$billingData_country = getCountryName($cartN->user->billingData['country']);
    	$shippingData_province = getProvinceName($cartN->user->shippingData['province']);
    	$shippingData_country = getCountryName($cartN->user->shippingData['country']);
        
        showSkin(basename(__FILE__), "ok");
        
        if ($paymentResult == "ok") {
            //delete old order from session
            $cart = new Cart();
            $cart->user = new User($userEmail, $userPassword);
           
            update_cart($cart);
        }
    } else
        die("No order ID found!");
    
} else {
        
    $cart = get_cart();

    if (isset($cart->orderId) && $cart->orderId != null) {
        $cart->deleteOrder();
        $cart->orderDate = null;
        $cart->orderStatus = null;
    } else if (!isset($cart->orderStatus)) {
        $cart->orderStatus = $npshop["constants"]["ORDER_STATUS"]["PENDENT"];
    }
      
    // recheck stock
	foreach ($cart->items as $itemId => $item) {
	    $item = new Item($item->id, $item->quantity);
	    if ($item->quantity > $item->stock) {
    	    $errors[$itemId] = sprintf(_("No hay suficiente stock disponible (%s disponibles)"), $item->stock);
    	}
	}
	 
	if (count($errors) != 0) {
	    $errorMsg = _("No se pudo reservar el carrito correctamente.");
	    showSkin(basename(__FILE__), "error");
	} else {
        
        if ($cart->createOrder()) {
            update_cart($cart);
            
            include_once(APP_ROOT."/common/modules/payment/TPV_".$npshop["tpv"]["class"].".php");
        } else {
            update_cart($cart);
            
            $errorMsg = _("Hubo problemas al almacenar el pedido.");
            showSkin(basename(__FILE__), "ok");
        }
    }
}
?>