<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
$categories = array();
$categoryTitle = null;

if (isset($_POST['item_id'])) {

    $item = new Item($_POST["item_id"]);
    //print_r($item);
    NP_loadDataInto($item, $_POST, "item_");
		//print_r($item);
		$item->_dbUpdate();
		
		$item = new Item($_POST["item_id"]);
		
} else if (isset($_GET["itemId"])) {
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