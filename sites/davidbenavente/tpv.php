<?php
require_once("npshop/skin.php");
?>

<html>
    <head>  
        <script>
            function npshop_submit(action) {
				form = document.getElementById('npshop_form');
				form.submit();
			}
        </script>
    </head>
    <body>
    <h2>Conectando con la entidad financiera...</h2>
    <?php printForm(); ?>
    <input type="button" tabindex="0" value="Pagar con tarjeta" onClick="javascript:npshop_submit();"><br/>
    Tarjeta de pruebas: 4548812049400004<br/>
    Caducidad: 12/07<br/>
    CVV2: 564<br/>
    CIP: 123456<br/>
    </body>
</html>