<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
$categories = array();
$categoryTitle = null;

$item = null;

if (isset($_POST['item_id'])) {

    if (isset($_POST['isNew']) && $_POST['isNew'] == "true") {
        $item = new Item(null);
        NP_loadDataInto($item, $_POST, "item_");
        $item->_dbStore();
    } else {
        $item = new Item($_POST["item_id"]);
        NP_loadDataInto($item, $_POST, "item_");
    	$item->_dbUpdate();
    }
	$id = $_POST["item_id"];
	$item = new Item($id);
		
} else if (isset($_GET["itemId"])) {
    $id = $_GET['itemId']; 
    $item = new Item($id);
}

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if (isset($item) && $item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}


if (isset($item) && isset($item->id) && $item->id != null) {
    NP_executeSelect($sqlCategories, "fetchCategories");
    
    if (!isset($item))
        $categoryTitle = $categories[0][1];

    showSkin("admin_".basename(__FILE__)); 
} else {
    die("Producto con identificador \"".$id."\" no encontrado");
}
?>