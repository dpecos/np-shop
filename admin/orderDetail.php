<? 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$orderId = $_GET['orderId'];

$order = new Cart($orderId);
$user = new User();
$user->_dbLoad($order->user->id);
//$order->user = $user;

?>

<html>
    <head>
        <style>
            <? include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
    </head>
    <body>
        <h1>Detalle del pedido <?= formatOrderId($order) ?></h1>

        <h2>Resumen del pedido</h2>
        <center>
        <table boder="0">
            <tr><td>Fecha:</td><td><?= date("d/m/Y H:i:s", $order->date) ?></td></tr>
            <tr><td>Estado:</td><td><?= $order->orderStatus ?></td></tr>
            <tr><td>Importe Total:</td><td><?= $order->getTotal(1) ?> &euro;</td></tr>
            <tr>
                <td>Datos de facturación:</td>
                <td>
                    <?= $order->user->billingData['name'] ?> <?= $order->user->billingData['surname'] ?><br>
                    <?= $order->user->billingData['address'] ?> <?= $order->user->billingData['address2'] ?><br>
                    Telf. <?= $order->user->billingData['phone'] ?><br>
                    CP: <?= $order->user->billingData['postalCode'] ?> <?= $order->user->billingData['city'] ?><br>
                    <?= getProvinceName($order->user->billingData['province']) ?> <?= getCountryName($order->user->billingData['country']) ?> 
                </td> 
            </tr>
            <tr>
                <td>Datos de envío:</td>
                <td>
                    <?= $order->user->shippingData['name'] ?> <?= $order->user->shippingData['surname'] ?><br>
                    <?= $order->user->shippingData['address'] ?> <?= $order->user->shippingData['address2'] ?><br>
                    Telf. <?= $order->user->shippingData['phone'] ?><br>
                    CP: <?= $order->user->shippingData['postalCode'] ?> <?= $order->user->shippingData['city'] ?><br>
                    <?= getProvinceName($order->user->shippingData['province']) ?> <?= getCountryName($order->user->shippingData['country']) ?> 
                </td>
            </tr>            
            <tr><td>Email del comprador:</td><td><?= $user->email ?></td></tr>
        </table>
        </center>
        <br/>
    
        <h2>Productos</h2>
        <center>
        <table width="75%">
            <tr>
                <th>Imagen</th>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>Precio Unidad</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            <? foreach ($order->items as $item) { ?>
            <tr>
                <td align="center"><img src="../images/<?php echo $item->id ?>_p.jpg"/></td>
                <td align="center"><a href="../flows/showItem.php?itemId=<?php echo $item->id ?>"><?= $item->id ?></a></td>
                <td><?= $item->name ?></td>
                <td align="center"><?= $item->prize ?> &euro;</td>
                <td align="center"><?= $item->quantity ?></td>
                <td align="center"><?= $item->getSubTotal() ?> &euro;</td>
            </tr>
            <? } ?>
        </table>
        </center>
        <br/>
                
        <h2>Etiquetas de envío</h2>
        <br/>
        <center>
        <table class="etiquetas">
            <tr>
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
            </tr>
        </table>
        </center>
        <br/>
    </body>
</html>