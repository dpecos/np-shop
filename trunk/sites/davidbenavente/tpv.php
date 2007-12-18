<?php
require_once("npshop/skin.php");
?>

<html>
    <head>  
        <title>David Benavente. Estudio de bonsái</title>
        <link rel=stylesheet href="/interface/estilos.css"> 
        <script>
            function npshop_submit() {
				form = document.getElementById('npshop_form');
				form.submit();
			}
        </script>
    </head>
    <body>
        <p><h2>Conectando con la entidad financiera...</h2></p>
        <?php printForm(); ?>
        <script>
            setTimeout("npshop_submit()", 1000);
        </script>
        <!--input type="button" tabindex="0" value="Pagar con tarjeta" onClick="javascript:npshop_submit();"><br/>
        Tarjeta de pruebas: 4548812049400004<br/>
        Caducidad: 12/07<br/>
        CVV2: 564<br/>
        CIP: 123456<br/-->
    </body>
</html>