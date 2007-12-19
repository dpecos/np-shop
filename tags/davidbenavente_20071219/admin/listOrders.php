<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$orders = array();
function recoverOrders($data) {
    global $orders;
    $cart = new Cart($data["PED_CO_CODIGO"]);
	array_push($orders, $cart);
}

$sql = "SELECT ".$ddbb_mapping['Cart']['orderId']." FROM ".$ddbb_table['Cart'];

NP_executeSelect($sql, 'recoverOrders');

?>
<html>
    <head>
        <style>
            <?php include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
    </head>
    <body>
        <h1>Listado de pedidos</h1>
        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="15%">Fecha</th>
                    <th width="20%">Estado del pedido</th>
                    <th width="10%">Identificador pedido</th>
                    <th width="10%">Importe</th>
                    <th width="5%">Num. Productos</th>
                    <th width="20%">Datos facturación</th>
                    <th width="20%">Datos envío</th>
                    <!--th>Datos TPV</th-->
                </tr>
            </thead>
            <tbody>
<?php foreach ($orders as $order) { ?>
                <tr>
                    <td align="center"><?php echo date("d/m/Y H:i:s", $order->date) ?></td> 
                    <td align="center"><?php echo $order->orderStatus ?></td> 
                    <td align="center"><a href="orderDetail.php?orderId=<?php echo $order->orderId ?>"><?php echo formatOrderId($order) ?></a></td> 
                    <td align="right"><?php echo $order->getTotal(1) ?> &euro;</td>
                    <td align="center"><?php echo count($order->items) ?></td> 
                    <td>
                        <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                        <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                        <nobr>Telf: <?php echo $order->user->billingData['phone'] ?></nobr><br>
                        CP: <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                        <?php echo getProvinceName($order->user->billingData['province']) ?> (<?php echo getCountryName($order->user->billingData['country']) ?>)
                    </td> 
                    <td>
                        <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                        <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                        <nobr>Telf: <?php echo $order->user->shippingData['phone'] ?></nobr><br>
                        CP: <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                        <?php echo getProvinceName($order->user->shippingData['province']) ?> (<?php echo getCountryName($order->user->shippingData['country']) ?>)
                    </td> 
                    <!--td><?php echo $order->tpvData ?></td-->
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>
    </body>
</html>