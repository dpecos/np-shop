<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php"); 
require_once(APP_ROOT."/common/commonFunctions.php");

showSkin("admin_".basename(__FILE__));
?>
