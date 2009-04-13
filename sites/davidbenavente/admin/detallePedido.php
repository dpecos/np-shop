<?php global $npshop, $order, $user; ?>
<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
    </head>
    <body>
        <div style="float:left"><h1><?= sprintf(_("Detalle del pedido %s"), formatOrderId($order)) ?></h1></div>
        <div style="float:right"><a href="listOrders.php?type=PENDING_SENT"><?= _("Volver a listado de pedidos") ?></a></div>
	    
	    <div style="clear:both"/>

        <h2><?= _("Resumen del pedido") ?></h2>
        <center>
        <table boder="0">
            <tr><td>Fecha:</td><td><?php echo date(_("d/m/Y H:i:s"), $order->date) ?></td></tr>
            <tr><td>Estado:</td>
                <td>
                    <form method="post">
                        <select name="newStatus">
<?php
foreach ($npshop['constants']["ORDER_STATUS"] as $statusKey => $statusName) { 
?>					    
			    <option value="<?php echo $statusKey?>" <?php echo $order->orderStatus==$statusName?"selected":""?>><?php echo $statusName?></option>
<?php
}
?>
                        </select>
                        <input type="submit" value="<?= _("Grabar") ?>"/>
                    </form>
<?php if (isset($_POST['newStatus'])) { ?>
                    <font color="green"><b><?= _("Estado modificado correctamente.") ?></b></font>
<?php } ?>                    
                </td></tr>
            <tr><td><?= _("Importe Total:") ?></td><td><?php echo $order->getTotal(1) ?> &euro;</td></tr>
            <tr>
                <td><?= _("Datos de facturación:") ?></td>
                <td>
                    <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                    <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                    <?= _("Telf.") ?> <?php echo $order->user->billingData['phone'] ?><br>
                    <?= _("CP:") ?> <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->billingData['province']) ?> (<?php echo getCountryName($order->user->billingData['country']) ?>) 
                </td> 
            </tr>
            <tr>
                <td><?= _("Datos de envío:") ?></td>
                <td>
                    <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                    <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                    <?= _("Telf.") ?> <?php echo $order->user->shippingData['phone'] ?><br>
                    <?= _("CP:") ?> <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->shippingData['province']) ?> (<?php echo getCountryName($order->user->shippingData['country']) ?>) 
                </td>
            </tr>            
            <tr><td><?= _("Email del comprador:") ?></td><td><?php echo $user->email ?></td></tr>
        </table>
        <br/>
        <a href="#" onclick="javascript:window.open('shippingLabel.php?orderId=<?php echo $order->orderId ?>', 'Etiqueta', 'width=500,height=540,status=no,toolbar=no,location=no,scrollbars=no,resizble=no'); return false;"><?= _("Generar etiqueta de envío") ?></a>
        </center>
        <br/>
    
        <h2>Productos</h2>
        <center>
        <table width="75%">
            <tr>
                <th><?= _("Imagen") ?></th>
                <th><?= _("Referencia") ?></th>
                <th><?= _("Nombre") ?></th>
                <th><?= _("Precio Unidad") ?></th>
                <th><?= _("Cantidad") ?></th>
                <th><?= _("Total") ?></th>
            </tr>
            <?php foreach ($order->items as $item) { ?>
            <tr>
                <?php if (isset($item->id) && $item->id != null) { ?>
                <td align="center"><img src="../images/<?php echo $item->id ?>_p.jpg"/></td>
                <td align="center"><a href="../admin/itemDetail.php?itemId=<?php echo $item->id ?>&orderId=<?php echo $order->orderId ?>"><?php echo $item->id ?></a></td>
                <td><?php echo NP_get_i18n($item->name); ?></td>
                <? } else { ?>
                <td align="center">-</td>
                <td align="center"><font color="red"><b><?php echo $item->id ?></b></font></a></td>
                <td align="center">-</td>
                <? } ?>
                <td align="center"><nobr><?php echo $item->prize ?> &euro;</nobr></td>
                <td align="center"><?php echo $item->quantity ?></td>
                <td align="center"><nobr><?php echo $item->getSubTotal() ?> &euro;</nobr></td>
            </tr>
            <?php } ?>
        </table>
        </center>
        <br/>
                
        <!--h2><?= _("Etiquetas de envío") ?></h2>
        <br/>
        <center>
        <table class="etiquetas">
            <tr>
                <td>
                    <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                    <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                    <?= _("Telf.") ?> <?php echo $order->user->billingData['phone'] ?><br>
                    <?= _("CP:") ?> <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->billingData['province']) ?> <?php echo getCountryName($order->user->billingData['country']) ?> 
                </td> 
                <td>
                    <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                    <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                    <?= _("Telf.") ?> <?php echo $order->user->shippingData['phone'] ?><br>
                    <?= _("CP:") ?> <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
                    <?php echo getProvinceName($order->user->shippingData['province']) ?> <?php echo getCountryName($order->user->shippingData['country']) ?> 
                </td>
            </tr>
        </table>
        </center>
        <br/-->
        <!--
        <?php print_r($order) ?>
        -->
    </body>
</html>