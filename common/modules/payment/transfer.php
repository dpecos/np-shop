<?php

if (!defined('APP_ROOT')) {
    define('APP_ROOT', "../../..");
    require_once(APP_ROOT."/config/main.php");
    require_once(APP_ROOT."/common/commonFunctions.php");
}

$cart = get_cart();
$cart->changeStatus($npshop["constants"]["ORDER_STATUS"]["PAYMENT_TRANSFER"]);

if (isset($cart->orderId) && $cart->orderId != null) {
    redirect(APP_ROOT."/flows/payment.php?result=ok");
}
    
?>
