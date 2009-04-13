<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

function buildSQL($type = null) {
    global $ddbb, $npshop;
    
    $sql = "SELECT ".$ddbb->getMapping('Cart','orderId')." FROM ".$ddbb->getTable('Cart');
    if (isset($type) && $type != "all") {
        $sql .= " WHERE ".$ddbb->getMapping('Cart','orderStatus')."='".$npshop['constants']["ORDER_STATUS"][$type]."'";
    }
    $sql .= " ORDER BY ".$ddbb->getMapping('Cart','date')." DESC";
    
    return $sql;
}

$orders = array();
function recoverOrders($data) {
    global $orders;
    $cart = new Cart($data["PED_CO_CODIGO"]);
	array_push($orders, $cart);
}

if (!isset($_GET['type']) || $_GET['type'] == null)
    $_GET['type']="all";

$sql = buildSQL($_GET['type']);

//NP_executeSelect($sql, 'recoverOrders');
$ddbb->executeSelectQuery($sql, 'recoverOrders');

showSkin("admin_".basename(__FILE__)); 
?>