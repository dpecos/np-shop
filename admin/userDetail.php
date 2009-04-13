<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$id = null;
$user = null;

if (isset($_GET["userId"])) {
    $id = $_GET['userId']; 
    $user = new User();
    $user->_dbLoad($id);
}

$provinces = array("-1" => "-");
function fetchProvinces($data) {
    global $provinces;
    $provinces[$data['PVC_CO_CODIGO']] = $data['PVC_VA_NOMBRE'];
}
global $ddbb;
$sqlProvinces = "SELECT * FROM NPS_PROVINCIAS ORDER BY 2";
$ddbb->executeSelectQuery($sqlProvinces, "fetchProvinces");

if (isset($user) && isset($user->id) && $user->id != null) {
    showSkin("admin_".basename(__FILE__)); 
} else {
    die(sprintf(_("Usuario con identificador \"%s\" no encontrado."), $id));
}
?>