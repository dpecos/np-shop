<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

global $ddbb;

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
    global $sqlProducts, $sqlCategories, $ddbb;
    
    $sqlProducts = "SELECT ".$ddbb->getMapping("Item", "id")." FROM NPS_PRODUCTOS";
    if (isset($categoryId) && $categoryId!="all") {
        $sqlProducts .= " WHERE ".$ddbb->getMapping("Item", "categoryId")."=".$categoryId." ";
    } else {
        $sqlProducts .= " ";
    }
    $sqlProducts .= " ORDER BY ".$ddbb->getMapping("Item", "order");
    
    $sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
}

$itemIds = array();
$categories = array();
$categoryTitle = _("Todas las categorías");
array_push($categories, array("all", array(NP_LANG => $categoryTitle)));

function fetchProducts($data) {
    global $itemIds, $ddbb;
    array_push($itemIds, $data[$ddbb->getMapping("Item", "id")]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle; 
    if ($_GET['categoryId'] == $data['CAT_CO_CODIGO'])
        $categoryTitle = NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N");
    array_push($categories, array($data['CAT_CO_CODIGO'], NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N")));
}

if (isset($_GET['categoryId']))
    buildSQL($_GET['categoryId']);
else
    buildSQL();
$ddbb->executeSelectQuery($sqlProducts, "fetchProducts");

$ddbb->executeSelectQuery($sqlCategories, "fetchCategories");

$items = array();
foreach ($itemIds as $id) {
    if (trim($id) != "") {
        $item = new Item($id);
        array_push($items, $item);
    }
}

showSkin("admin_".basename(__FILE__));
?>