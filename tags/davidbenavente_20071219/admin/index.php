<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php"); 
require_once(APP_ROOT."/common/commonFunctions.php");
?>
<html>
    <head>
        <style>
            <?php include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
    </head>
    <body>
        <h1>Panel de administración</h1>
        <ul>
            <li><a href="listOrders.php">Listado de pedidos</a></li>
            <li><a href="listItems.php">Listado de productos</a></li>
        </ul>
    </body>
</html>