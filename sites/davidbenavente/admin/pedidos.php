<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
            function showType() {
			    form = document.getElementById("typeForm");
			    form.submit();
			}
        </script>
    </head>
    <body>
        <div style="float:left; width:35%"><h1><?= _("Listado de pedidos") ?></h1></div>
        <div style="float:left; text-align:center; width:35%">
            <br/><br/><a href="index.php"><?= _("Volver") ?></a>
        </div>
        <div style="float:right; width:30%; text-align:right;">
        <form method="get" id="typeForm">
            <br/>
			<select class="fd5" name="type" onchange="javascript:showType()">		
			    <option value="all"><?= _("Todos") ?></option>	
<?php
global $npshop, $orders;
foreach ($npshop['constants']["ORDER_STATUS"] as $statusKey => $statusName) { 
?>					    
			    <option value="<?php echo $statusKey?>" <?php echo $_GET['type']==$statusKey?"selected":""?>><?php echo $statusName?></option>
<?php
}
?>
		    </select>
	    <form>&nbsp;&nbsp;&nbsp;
	    </div>
	    
	    <div style="clear:both"/>

        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="15%"><?= _("Fecha") ?></th>
                    <th width="20%"><?= _("Estado del pedido") ?></th>
                    <th width="10%"><?= _("Identificador pedido") ?></th>
                    <th width="10%"><?= _("Importe") ?></th>
                    <th width="5%"><?= _("Num. Productos") ?></th>
                    <th width="20%"><?= _("Datos facturación") ?></th>
                    <th width="20%"><?= _("Datos envío") ?></th>
                    <!--th><?= _("Datos TPV") ?></th-->
                </tr>
            </thead>
            <tbody>
<?php foreach ($orders as $order) { ?>
                <tr>
                    <td align="center"><?php echo date(_("d/m/Y H:i:s"), $order->date) ?></td> 
                    <td align="center"><?php echo $order->orderStatus ?></td> 
                    <td align="center"><a href="orderDetail.php?orderId=<?php echo $order->orderId ?>"><?php echo formatOrderId($order) ?></a></td> 
                    <td align="right"><?php echo $order->getTotal(1) ?> &euro;</td>
                    <td align="center"><?php echo $order->countItems() ?></td> 
                    <td>
                        <?php echo $order->user->billingData['name'] ?> <?php echo $order->user->billingData['surname'] ?><br>
                        <?php echo $order->user->billingData['address'] ?> <?php echo $order->user->billingData['address2'] ?><br>
                        <nobr><?= _("Telf:") ?> <?php echo $order->user->billingData['phone'] ?></nobr><br>
                        <?= _("CP:") ?> <?php echo $order->user->billingData['postalCode'] ?> <?php echo $order->user->billingData['city'] ?><br>
                        <?php echo getProvinceName($order->user->billingData['province']) ?> (<?php echo getCountryName($order->user->billingData['country']) ?>)
                    </td> 
                    <td>
                        <?php echo $order->user->shippingData['name'] ?> <?php echo $order->user->shippingData['surname'] ?><br>
                        <?php echo $order->user->shippingData['address'] ?> <?php echo $order->user->shippingData['address2'] ?><br>
                        <nobr><?= _("Telf:") ?> <?php echo $order->user->shippingData['phone'] ?></nobr><br>
                        <?= _("CP:") ?> <?php echo $order->user->shippingData['postalCode'] ?> <?php echo $order->user->shippingData['city'] ?><br>
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