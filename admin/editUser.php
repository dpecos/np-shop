<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$id = null;
$user = null;
$msgError = null;

if (isset($_POST['user_id'])) {
    $id = $_POST["user_id"];
    $user = new User();
    $user->_dbLoad($id);
    
    NP_loadDataInto($user, $_POST, "user_");
    
    if (isset($_POST['newPassword1']) && $_POST['newPassword1'] != null && 
        isset($_POST['newPassword2']) && $_POST['newPassword2'] != null && 
        $_POST['newPassword1'] == $_POST['newPassword2']) {
        $user->password = $_POST['newPassword1'];
    } else if ($_POST['newPassword1'] != null || $_POST['newPassword2'] != null) {
        $msgError = _("Los passwords introducidos no coinciden. No se grabaron los datos.");
    }
    
    if ($msgError == null) {
        $user->_dbUpdate();
    
        $user = new User();
        $user->_dbLoad($id);
    }
    
} else if (isset($_GET["userId"])) {
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

$countries = array();
$sqlCountries = "SELECT * FROM NPS_PAISES ORDER BY ISO3";
function fetchCountries($data) {
    global $countries;
    $countries[$data['id']] = NP_DDBB::decodeSQLValue($data['name'], "STRING_I18N");
}
$ddbb->executeSelectQuery($sqlCountries, "fetchCountries");

if (isset($user) && isset($user->id) && $user->id != null) {
    showSkin("admin_".basename(__FILE__)); 
} else {
    die(sprintf(_("Usuario con identificador \"%s\" no encontrado."), $id));
}
?>