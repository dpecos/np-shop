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
    $userEmail = $cart->user->email;
    $userPassword = $cart->user->password;
    
    // do not update order! TPV will!    
    if (isset($cart->orderId) && $cart->orderId != null) {
        $cartN = new Cart($cart->orderId);
        $cartN->user->email = $userEmail;
        
    	$billingData_province = getProvinceName($cartN->user->billingData['province']);
    	$billingData_country = getCountryName($cartN->user->billingData['country']);
    	$shippingData_province = getProvinceName($cartN->user->shippingData['province']);
    	$shippingData_country = getCountryName($cartN->user->shippingData['country']);
        
        showSkin(basename(__FILE__), "ok");
        
        if ($_GET["result"] == "ok") {
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
        $cart->orderStatus = $npshop["constants"]["ORDER_STATUS_PENDENT"];
    }
      
    // recheck stock
	foreach ($cart->items as $itemId => $item) {
	    $item = new Item($item->id, $item->quantity);
	    if ($item->quantity > $item->stock) {
    	    $errors[$itemId] = "No hay suficiente stock disponible (".$item->stock." disponibles)";
    	}
	}
	 
	if (count($errors) != 0) {
	    $errorMsg = "No se pudo reservar el carrito correctamente.";
	    showSkin(basename(__FILE__), "error");
	} else {
        
        if ($cart->createOrder()) {
            update_cart($cart);
            
            include_once(APP_ROOT."/common/modules/payment/TPV_".$npshop["tpv"]["class"].".php");
        } else {
            update_cart($cart);
            
            $errorMsg = "Hubo problemas al almacenar el pedido";
            showSkin(basename(__FILE__), "ok");
        }
    }
}
?>