<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
$categories = array();
$categoryTitle = null;

$id = null;

if (isset($_POST['item_id'])) {
    $id = $_POST['item_id'];   
    $item = new Item($id);
    if ($_POST['event'] == "stock")
        $item->modifyStock($_POST["item_stock"]);
    else if ($_POST['event'] == "retire") 
        $item->setRetired(isset($_POST["item_retired"])."");
    //else if ($_POST['event'] == "delete")
    //		$item->delete();
}

if (isset($_GET["itemId"])) {
    $id = $_GET['itemId']; 
    $item = new Item($id);
}

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if ($item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

if (isset($item) && isset($item->id) && $item->id != null) {
    NP_executeSelect($sqlCategories, "fetchCategories");   
    showSkin("admin_".basename(__FILE__)); 
} else {
    die("Producto con identificador \"".$id."\" no encontrado");
}
?>