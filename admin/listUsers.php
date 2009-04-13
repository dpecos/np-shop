<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlUsers = "SELECT ".$ddbb->getMapping("User", "id")." FROM ".$ddbb->getTable('User');
// $sqlUsers .= " ORDER BY ".$ddbb_mapping["Item"]["order"]

$userIds = array();

function fetchUsers($data) {
    global $userIds, $ddbb;
    array_push($userIds, $data[$ddbb->getMapping("User", "id")]);
}

global $ddbb;
$ddbb->executeSelectQuery($sqlUsers, "fetchUsers");

$users = array();
foreach ($userIds as $id) {
    if (trim($id) != "") {
        $user = new User();
        $user->_dbLoad($id);
        //print_r($user);
        //echo "<br>";
        array_push($users, $user);
    }
}

showSkin("admin_".basename(__FILE__));
?>
