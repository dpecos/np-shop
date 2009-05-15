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
  $categoryTitle = array(NP_LANG => _("Todas las categorías"));
else if ($item->categoryId == "new")
  $categoryTitle = array(NP_LANG => _("Novedades"));

array_push($categories, array("all", array(NP_LANG => _("Todas las categorías"))));
array_push($categories, array("new", array(NP_LANG => _("Novedades"))));

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if ($item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N");
    array_push($categories, array($data['CAT_CO_CODIGO'], NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N")));
}

global $ddbb;
$ddbb->executeSelectQuery($sqlCategories, "fetchCategories");

if (isset($item) && !is_null($item->id)) {
    if ($item->categoryId == "20" || $item->categoryId == "30" || $item->categoryId == "35")
        showSkin(basename(__FILE__), "macetas_japo");
    else if ($item->categoryId == "40")
        showSkin(basename(__FILE__), "mesas");
    else
        showSkin(basename(__FILE__), "herramientas");   
} else {
    die(sprintf(_("Producto con identificador \"%s\" no encontrado."), $_GET["itemId"]));
}

?>