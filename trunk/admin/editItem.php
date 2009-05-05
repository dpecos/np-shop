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
        NP_loadDataInto($item, $_POST, "item_", $ddbb->getType("Item", null));
        $item->_dbStore();
    } else {
        $item = new Item($_POST["item_id"]);
        NP_loadDataInto($item, $_POST, "item_", $ddbb->getType("Item", null));
        $item->_dbUpdate();
    }
    $id = $_POST["item_id"];
    $item = new Item($id);

    redirect("itemDetail.php?item_edit_ok=true&itemId=".$id);
    exit();

} else if (isset($_GET["itemId"])) {
    $id = $_GET['itemId']; 
    $item = new Item($id);
}

function fetchCategories($data) {
    global $categories, $categoryTitle, $item;
    if (isset($item) && $item->categoryId == $data['CAT_CO_CODIGO'])
        $categoryTitle = NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N");
    array_push($categories, array($data['CAT_CO_CODIGO'], NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N")));
}

global $ddbb;
$ddbb->executeSelectQuery($sqlCategories, "fetchCategories");

if (!isset($item))
     $categoryTitle = $categories[0][1];

if (isset($item) && isset($item->id) && $item->id != null) {
    showSkin("admin_".basename(__FILE__)); 
} else {
    if (isset($id)) 
        die(sprintf(_("Producto con identificador \"%s\" no encontrado."), $id));
    else
        showSkin("admin_".basename(__FILE__)); 
}
?>
