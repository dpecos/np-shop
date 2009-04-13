<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
        </script>
    </head>
    <body>
        <div style="float:left; width:35%"><h1><?= _("Listado de usuarios") ?></h1></div>
        <div style="float:left; text-align:center; width:35%">
            <br/><br/><a href="index.php"><?= _("Volver") ?></a>
        </div>
	    
	    <div style="clear:both"/>

        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="15%"><?= _("Email") ?></th>
                    <th width="20%"><?= _("Envío de mails") ?></th>
                    <th width="20%"><?= _("Datos facturación") ?></th>
                    <th width="20%"><?= _("Datos envío") ?></th>
                    <!--th><?= _("Datos TPV") ?></th-->
                </tr>
            </thead>
            <tbody>
<?php 
global $users;
foreach ($users as $user) { ?>
                <tr>
                    <td align="center"><a href="userDetail.php?userId=<?php echo $user->id ?>"><?php echo $user->email ?></a></td> 
                    <td align="center"><?php echo $user->mailing ? _("Sí") : _("No") ?></td> 
                    <td>
                        <?php echo $user->billingData['name'] ?> <?php echo $user->billingData['surname'] ?><br>
                        <?php echo $user->billingData['address'] ?> <?php echo $user->billingData['address2'] ?><br>
                        <nobr><?= _("Telf:") ?> <?php echo $user->billingData['phone'] ?></nobr><br>
                        <?= _("CP:") ?> <?php echo $user->billingData['postalCode'] ?> <?php echo $user->billingData['city'] ?><br>
                        <?php echo getProvinceName($user->billingData['province']) ?> (<?php echo getCountryName($user->billingData['country']) ?>)
                    </td> 
                    <td>
                        <?php echo $user->shippingData['name'] ?> <?php echo $user->shippingData['surname'] ?><br>
                        <?php echo $user->shippingData['address'] ?> <?php echo $user->shippingData['address2'] ?><br>
                        <nobr><?= _("Telf:") ?> <?php echo $user->shippingData['phone'] ?></nobr><br>
                        <?= _("CP:") ?> <?php echo $user->shippingData['postalCode'] ?> <?php echo $user->shippingData['city'] ?><br>
                        <?php echo getProvinceName($user->shippingData['province']) ?> (<?php echo getCountryName($user->shippingData['country']) ?>)
                    </td> 
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>
    </body>
</html>
