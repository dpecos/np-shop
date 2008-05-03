<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlProducts = null;
$sqlCategories = null;

if (isset($_POST['deleteId']) && $_POST['deleteId'] != "") {
   $delItem = new Item($_POST['deleteId']);
   $deletedRows = $delItem->_dbDelete();
   if (!isset($deletedRows))
       $deletedRows = -1;
}

if (!isset($_GET['categoryId']) || $_GET['categoryId'] == null)
    $_GET['categoryId']="all";

function buildSQL($categoryId = null) {
    global $sqlProducts, $sqlCategories, $ddbb_mapping;
    
    $sqlProducts = "SELECT ".$ddbb_mapping["Item"]["id"]." FROM NPS_PRODUCTOS";
    if (isset($categoryId) && $categoryId!="all") {
        $sqlProducts .= " WHERE ".$ddbb_mapping["Item"]["categoryId"]."=".$categoryId." ";
    } else {
        $sqlProducts .= " ";
    }
    $sqlProducts .= " ORDER BY ".$ddbb_mapping["Item"]["order"];
    
    $sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
}

$itemIds = array();
$categories = array();
$categoryTitle = "Todas las categorías";
array_push($categories, array("all", $categoryTitle));

function fetchProducts($data) {
    global $itemIds, $ddbb_mapping;
    array_push($itemIds, $data[$ddbb_mapping["Item"]["id"]]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle; 
    if ($_GET['categoryId'] == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

if (isset($_GET['categoryId']))
    buildSQL($_GET['categoryId']);
else
    buildSQL();
NP_executeSelect($sqlProducts, "fetchProducts");

NP_executeSelect($sqlCategories, "fetchCategories");

$items = array();
foreach ($itemIds as $id) {
    if (trim($id) != "") {
        $item = new Item($id);
        array_push($items, $item);
    }
}

showSkin("admin_".basename(__FILE__));
?>