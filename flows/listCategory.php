<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlProducts = null;
$sqlCategories = null;

if (!isset($_GET['categoryId']) || $_GET['categoryId'] == null)
    $_GET['categoryId']="new";

function buildSQL($categoryId = null) {
    global $sqlProducts, $sqlCategories, $ddbb;
    
    $sqlProducts = "SELECT ".$ddbb->getMapping("Item", "id")." FROM NPS_PRODUCTOS";
    if (isset($categoryId)) {
    		if ($categoryId == "all") 
    			$sqlProducts .= " WHERE ";
    		else if ($categoryId == "new") 
    			$sqlProducts .= " WHERE ".$ddbb->getMapping("Item", "new")."=".NP_DDBB::encodeSQLValue('true', "BOOL")." AND ";
    		else
        	$sqlProducts .= " WHERE ".$ddbb->getMapping("Item", "categoryId")."=".NP_DDBB::encodeSQLValue($categoryId, "STRING")." AND ";
    } else {
        $sqlProducts .= " WHERE ";
    }
    $sqlProducts .= $ddbb->getMapping("Item", "retired")."=".NP_DDBB::encodeSQLValue('false', "BOOL")." ORDER BY ".$ddbb->getMapping("Item", "order");
    
    $sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
}

$itemIds = array();
$categories = array();
$categoryTitle = null;
//$sourceCategoryTitle = "Todas las categorías";

if ($_GET['categoryId'] == "all")
  $categoryTitle = array(NP_LANG => _("Todas las categorías"));
else if ($_GET['categoryId'] == "new")
  $categoryTitle = array(NP_LANG => _("Novedades"));
  
array_push($categories, array("all", array(NP_LANG => _("Todas las categorías"))));
array_push($categories, array("new", array(NP_LANG => _("Novedades"))));


function fetchProducts($data) {
    global $itemIds, $ddbb;
    array_push($itemIds, $data[$ddbb->getMapping("Item", "id")]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle; //, $sourceCategoryTitle;
    if ($_GET['categoryId'] == $data['CAT_CO_CODIGO'])
        $categoryTitle = NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N");
    // if (isset($_GET['sourceCategoryId']) && $_GET['sourceCategoryId'] == $data['CAT_CO_CODIGO'])
    //     $sourceCategoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N")));
}

if (isset($_GET['categoryId']))
    buildSQL($_GET['categoryId']);
else
    buildSQL();
$ddbb->executeSelectQuery($sqlProducts, "fetchProducts");

$ddbb->executeSelectQuery($sqlCategories, "fetchCategories");

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
    
    $msg = sprintf(_("%s a la venta próximamente."), NP_get_i18n($categoryTitle));
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