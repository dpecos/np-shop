<?php global $order; ?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
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
        <div style="width: 480px;">
            <center>
            <table class="etiquetas">
                <tr class="remitente">
                    <td>
                        Remitente:
                        <blockquote>
                            <nobr>David Benavente - Estudio de Bonsai</nobr><br/>
                            <br/>
                            <nobr>Gral. Ramirez de Madrid 8-10</nobr><br/>
                            Madrid 28020<br/>
                            <br/>
                            <?= _("Telf.:") ?> 687 327 796<br/>
                        </blockquote>
                    </td>
                </tr>
                <tr>
                    <td>
                        <nobr><?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?></nobr><br>
                        <br/>
                        <nobr><?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?></nobr><br>
                        <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                        <?php echo getProvinceName($order->user->shippingData['province']) ?><br>
                        <?php echo getCountryName($order->user->shippingData['country']) ?><br/> 
                        <br/>
                        <?= _("Telf.:") ?> <?php echo $order->user->shippingData['phone'] ?> 
                    </td>
                </tr>
            </table>
            <br/>
            <h3><a id="printLink" onclick="javascript:printLabel();" href="javascript:print()">Imprimir</a></h3>
            </center>
        </div>
    </body>
</html>