<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
$categories = array();
$categoryTitle = null;
$images = array();

$id = null;

if (array_key_exists("deleteImage", $_GET)) {
    unlink("../images/".$_GET["deleteImage"]);
    echo '<html><head></head><body>'."\n";
    echo '<script language="JavaScript" type="text/javascript">'."\n";
    echo 'parent.removeImage("'.$_GET["deleteImage"].'");'."\n";
    echo '</script></body></html>'."\n";
    exit();
} else if (isset($_FILES) && array_key_exists('product_image', $_FILES)) {
    
    $fileData = $_FILES['product_image'];
    $tmpFile = $fileData["tmp_name"];
    
    $msg = "";
    $ok = false;
    if (is_uploaded_file($tmpFile)) {
        $destFile = $_POST['item_id'].".jpg";
        if (array_key_exists("filename_mask", $_POST))
            $destFile = sprintf($_POST["filename_mask"], $_POST['item_id']);
        if (move_uploaded_file($tmpFile, "../images/".$destFile)) {
            // OK
            $msg = _("Imagen subida correctamente.");
            $ok = true;
        } else {
            // ERROR
            $msg = _("Se produjo un error al subir la imagen.");
        }
    } else {
        $msg = _("No se subió ninguna imagen.");
    }
    echo '<html><head></head><body>'."\n";
    echo '<script language="JavaScript" type="text/javascript">'."\n";
    echo 'parent.uploadResult('.$ok.', "'.$msg.'", "'.$destFile.'");'."\n";
    echo '</script></body></html>'."\n";
    exit();
    
} else if (isset($_POST['item_id'])) {
    
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
        $categoryTitle = NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N");
    array_push($categories, array($data['CAT_CO_CODIGO'], NP_DDBB::decodeSQLValue($data['CAT_VA_NOMBRE'], "STRING_I18N")));
}

if (isset($item) && !is_null($item->id)) {
    global $ddbb, $images;
    $ddbb->executeSelectQuery($sqlCategories, "fetchCategories");   
    $images = NP_directoryList("../images/", "^".$id."_.\.jpg");
    showSkin("admin_".basename(__FILE__)); 
} else {
    die(sprintf(_("Producto con identificador \"%s\" no encontrado."), $id));
}
?>