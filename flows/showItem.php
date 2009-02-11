<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";

$item = null;
$categories = array();
$categoryTitle = null;

if (isset($_GET["itemId"])) {
    $item = new Item($_GET["itemId"]);
}

if ($item->categoryId == "all")
  $categoryTitle = "Todas las categorías";
else if ($item->categoryId == "new")
  $categoryTitle = "Novedades";

array_push($categories, array("all", "Todas las categorías"));
array_push($categories, array("new", "Novedades"));

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if ($item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

NP_executeSelect($sqlCategories, "fetchCategories");


if ($item->categoryId == "30")
    showSkin(basename(__FILE__), "macetas_japo");
    elseif ($item->categoryId == "40")
    showSkin(basename(__FILE__), "mesas");
    elseif ($item->categoryId == "50")
    showSkin(basename(__FILE__), "macetas_japo");
    else
    showSkin(basename(__FILE__), "herramientas");   

?>