<? 
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
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Identificador pedido</th>
                    <th>Fecha</th>
                    <th>Estado del pedido</th>
                    <th>Datos facturación</th>
                    <th>Datos envío</th>
                    <th>Datos TPV</th>
                </tr>
            </thead>
            <tbody>
<? foreach ($orders as $order) { ?>
    <? //print_r($order); ?>
                <tr>
                    <td><?= $order->orderId ?></td> 
                    <td><?= date("d/m/Y H:i:s", $order->date) ?></td> 
                    <td><?= $order->orderStatus ?></td> 
                    <td>
                        <?= $order->user->billingData['name'] ?> <?= $order->user->billingData['surname'] ?><br>
                        <?= $order->user->billingData['address'] ?> <?= $order->user->billingData['address2'] ?><br>
                        Telf. <?= $order->user->billingData['phone'] ?><br>
                        CP: <?= $order->user->billingData['postalCode'] ?> <?= $order->user->billingData['city'] ?><br>
                        <?= getProvinceName($order->user->billingData['province']) ?> <?= getCountryName($order->user->billingData['country']) ?> 
                    </td> 
                    <td>
                        <?= $order->user->shippingData['name'] ?> <?= $order->user->shippingData['surname'] ?><br>
                        <?= $order->user->shippingData['address'] ?> <?= $order->user->shippingData['address2'] ?><br>
                        Telf. <?= $order->user->shippingData['phone'] ?><br>
                        CP: <?= $order->user->shippingData['postalCode'] ?> <?= $order->user->shippingData['city'] ?><br>
                        <?= getProvinceName($order->user->shippingData['province']) ?> <?= getCountryName($order->user->shippingData['country']) ?> 
                    </td> 
                    <td><?= $order->tpvData ?></td>
                </tr>
<? } ?>        
            </tbody>
        </table>
    </body>
</html>