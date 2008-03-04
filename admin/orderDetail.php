<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$orderId = $_GET['orderId'];

$order = new Cart($orderId);

if (isset($_POST['newStatus'])) {
    $order->changeStatus($npshop['constants']["ORDER_STATUS"][$_POST['newStatus']], null, false);
}

$user = new User();
$user->_dbLoad($order->user->id);

showSkin("admin_".basename(__FILE__)); 
?>