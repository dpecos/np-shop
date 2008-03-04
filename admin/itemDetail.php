<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
$categories = array();
$categoryTitle = null;

if (isset($_POST['item_id'])) {

    $item = new Item($_POST["item_id"]);
    if ($_POST['event'] == "stock")
        $item->modifyStock($_POST["item_stock"]);
    else if ($_POST['event'] == "retire") 
        $item->setRetired(isset($_POST["item_retired"])."");
    //else if ($_POST['event'] == "delete")
    //		$item->delete();
}

if (isset($_GET["itemId"])) {
    $item = new Item($_GET["itemId"]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if ($item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

NP_executeSelect($sqlCategories, "fetchCategories");

showSkin("admin_".basename(__FILE__)); 
?>