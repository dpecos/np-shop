<?php
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$orderId = $_GET['orderId'];
$order = new Cart($orderId);
?>

<html>
    <head>
        <style>
            <?php include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
        <title>Etiqueta de envío</title>
        <script>
            function printLabel() {
                document.getElementById('printLink').style.visibility='hidden';
                //setTimeout("document.getElementById('printLink').style.visibility='visible'", 3000);
                //window.close();
            }
        </script>
    </head>
    <body>
        <div style="width: 320px;">
            <center>
            <table class="etiquetas">
                <tr>
                    <td>
                        <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                        <br/>
                        <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                        <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                        <?php echo getProvinceName($order->user->shippingData['province']) ?><br>
                        <?php echo getCountryName($order->user->shippingData['country']) ?> 
                    </td>
                </tr>
            </table>
            <br/>
            <h3><a id="printLink" onclick="javascript:printLabel();" href="javascript:print()">Imprimir</a></h3>
            </center>
        </div>
    </body>
</html>