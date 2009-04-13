<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
    </head>
    <body>
        <h1><?= _("Panel de administración") ?></h1>
        <ul>
            <li><a href="listOrders.php?type=PENDING_SENT"><?= _("Listado de pedidos") ?></a></li>
            <li><a href="listItems.php"><?= _("Listado de productos") ?></a></li>
        </ul>
        <ul>
            <li><a href="listUsers.php"><?= _("Listado de usuarios") ?></a></li>
        </ul>
    </body>
</html>