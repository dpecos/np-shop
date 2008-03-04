<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$orderId = $_GET['orderId'];
$order = new Cart($orderId);

showSkin("admin_".basename(__FILE__)); 
?>