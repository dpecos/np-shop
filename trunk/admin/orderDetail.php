<?php
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
            <?php include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
    </head>
    <body>
        <h1>Detalle del pedido <?php echo formatOrderId($order) ?></h1>

        <h2>Resumen del pedido</h2>
        <center>
        <table boder="0">
            <tr><td>Fecha:</td><td><?php echo date("d/m/Y H:i:s", $order->date) ?></td></tr>
            <tr><td>Estado:</td><td><?php echo $order->orderStatus ?></td></tr>
            <tr><td>Importe Total:</td><td><?php echo $order->getTotal(1) ?> &euro;</td></tr>
            <tr>
                <td>Datos de facturación:</td>
                <td>
                    <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                    <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                    Telf. <?php echo $order->user->billingData['phone'] ?><br>
                    CP: <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->billingData['province']) ?> (<?php echo getCountryName($order->user->billingData['country']) ?>) 
                </td> 
            </tr>
            <tr>
                <td>Datos de envío:</td>
                <td>
                    <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                    <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                    Telf. <?php echo $order->user->shippingData['phone'] ?><br>
                    CP: <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->shippingData['province']) ?> (<?php echo getCountryName($order->user->shippingData['country']) ?>) 
                </td>
            </tr>            
            <tr><td>Email del comprador:</td><td><?php echo $user->email ?></td></tr>
        </table>
        <br/>
        <a href="#" onclick="javascript:window.open('shippingLabel.php?orderId=<?php echo $order->orderId ?>', 'Etiqueta', 'width=500,height=540,status=no,toolbar=no,location=no,scrollbars=no,resizble=no'); return false;">Generar etiqueta de envío</a>
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
            <?php foreach ($order->items as $item) { ?>
            <tr>
                <td align="center"><img src="../images/<?php echo $item->id ?>_p.jpg"/></td>
                <td align="center"><a href="../flows/showItem.php?itemId=<?php echo $item->id ?>"><?php echo $item->id ?></a></td>
                <td><?php echo $item->name ?></td>
                <td align="center"><nobr><?php echo $item->prize ?> &euro;</nobr></td>
                <td align="center"><?php echo $item->quantity ?></td>
                <td align="center"><nobr><?php echo $item->getSubTotal() ?> &euro;</nobr></td>
            </tr>
            <?php } ?>
        </table>
        </center>
        <br/>
                
        <!--h2>Etiquetas de envío</h2>
        <br/>
        <center>
        <table class="etiquetas">
            <tr>
                <td>
                    <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                    <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                    Telf. <?php echo $order->user->billingData['phone'] ?><br>
                    CP: <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->billingData['province']) ?> <?php echo getCountryName($order->user->billingData['country']) ?> 
                </td> 
                <td>
                    <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                    <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                    Telf. <?php echo $order->user->shippingData['phone'] ?><br>
                    CP: <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->shippingData['province']) ?> <?php echo getCountryName($order->user->shippingData['country']) ?> 
                </td>
            </tr>
        </table>
        </center>
        <br/-->
    </body>
</html>