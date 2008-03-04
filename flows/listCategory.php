<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlProducts = null;
$sqlCategories = null;

if (!isset($_GET['categoryId']) || $_GET['categoryId'] == null)
    $_GET['categoryId']="new";

function buildSQL($categoryId = null) {
    global $sqlProducts, $sqlCategories, $ddbb_mapping;
    
    $sqlProducts = "SELECT ".$ddbb_mapping["Item"]["id"]." FROM NPS_PRODUCTOS";
    if (isset($categoryId)) {
    		if ($categoryId == "all") 
    			$sqlProducts .= " WHERE ";
    		else if ($categoryId == "new") 
    			$sqlProducts .= " WHERE ".$ddbb_mapping["Item"]["new"]."=".encodeSQLValue('true', "BOOL")." AND ";
    		else
        	$sqlProducts .= " WHERE ".$ddbb_mapping["Item"]["categoryId"]."=".encodeSQLValue($categoryId, "STRING")." AND ";
    } else {
        $sqlProducts .= " WHERE ";
    }
    $sqlProducts .= $ddbb_mapping["Item"]["retired"]."=".encodeSQLValue('false', "BOOL")." ORDER BY ".$ddbb_mapping["Item"]["order"];
    
    $sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
}

$itemIds = array();
$categories = array();
$categoryTitle = null;
//$sourceCategoryTitle = "Todas las categorías";

if ($_GET['categoryId'] == "all")
  $categoryTitle = "Todas las categorías";
else if ($_GET['categoryId'] == "new")
  $categoryTitle = "Novedades";

array_push($categories, array("all", "Todas las categorías"));
array_push($categories, array("new", "Novedades"));


function fetchProducts($data) {
    global $itemIds, $ddbb_mapping;
    array_push($itemIds, $data[$ddbb_mapping["Item"]["id"]]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle; //, $sourceCategoryTitle;
    if ($_GET['categoryId'] == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    // if (isset($_GET['sourceCategoryId']) && $_GET['sourceCategoryId'] == $data['CAT_CO_CODIGO'])
    //     $sourceCategoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

if (isset($_GET['categoryId']))
    buildSQL($_GET['categoryId']);
else
    buildSQL();
NP_executeSelect($sqlProducts, "fetchProducts");

NP_executeSelect($sqlCategories, "fetchCategories");

if (count($itemIds) == 0) {
    /*
    if (isset($_GET['sourceCategoryId'])) {
        buildSQL($_GET['sourceCategoryId']);
        
        $tmp = $_GET['categoryId'];
        $_GET['categoryId'] = $_GET['sourceCategoryId'];
        $_GET['sourceCategoryId'] = $tmp;
        
        $tmp = $categoryTitle;
        $categoryTitle = $sourceCategoryTitle;
        $sourceCategoryTitle = $tmp;
        
        NP_executeSelect($sqlProducts, "fetchProducts");
    }
    $msg = $sourceCategoryTitle." a la venta próximamente.";
    */
    
    $msg = $categoryTitle." a la venta próximamente.";
}

$items = array();
foreach ($itemIds as $id) {
    if (trim($id) != "") {
        $item = new Item($id);
        array_push($items, $item);
    }
}

showSkin(basename(__FILE__));
?>