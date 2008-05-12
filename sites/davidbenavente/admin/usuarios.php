<html>
    <head>
        <style>
            <?php include_once('style.css'); ?>
        </style>
        <script>
        </script>
    </head>
    <body>
        <div style="float:left; width:35%"><h1>Listado de usuarios</h1></div>
        <div style="float:left; text-align:center; width:35%">
            <br/><br/><a href="index.php">Volver</a>
        </div>
	    
	    <div style="clear:both"/>

        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="15%">Email</th>
                    <th width="20%">Envío de mails</th>
                    <th width="20%">Datos facturación</th>
                    <th width="20%">Datos envío</th>
                    <!--th>Datos TPV</th-->
                </tr>
            </thead>
            <tbody>
<?php 
global $users;
foreach ($users as $user) { ?>
                <tr>
                    <td align="center"><a href="userDetail.php?userId=<?php echo $user->id ?>"><?php echo $user->email ?></a></td> 
                    <td align="center"><?php echo $user->mailing ? "Sí" : "No" ?></td> 
                    <td>
                        <?php echo $user->billingData['name'] ?> <?php echo $user->billingData['surname'] ?><br>
                        <?php echo $user->billingData['address'] ?> <?php echo $user->billingData['address2'] ?><br>
                        <nobr>Telf: <?php echo $user->billingData['phone'] ?></nobr><br>
                        CP: <?php echo $user->billingData['postalCode'] ?> <?php echo $user->billingData['city'] ?><br>
                        <?php echo getProvinceName($user->billingData['province']) ?> (<?php echo getCountryName($user->billingData['country']) ?>)
                    </td> 
                    <td>
                        <?php echo $user->shippingData['name'] ?> <?php echo $user->shippingData['surname'] ?><br>
                        <?php echo $user->shippingData['address'] ?> <?php echo $user->shippingData['address2'] ?><br>
                        <nobr>Telf: <?php echo $user->shippingData['phone'] ?></nobr><br>
                        CP: <?php echo $user->shippingData['postalCode'] ?> <?php echo $user->shippingData['city'] ?><br>
                        <?php echo getProvinceName($user->shippingData['province']) ?> (<?php echo getCountryName($user->shippingData['country']) ?>)
                    </td> 
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>
    </body>
</html>