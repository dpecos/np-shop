<?php
require_once("npshop/skin.php");
?>

<html>
    <head>  
        <title><?= _("David Benavente. Estudio de bonsái") ?></title>
        <link rel=stylesheet href="/interface/estilos.css"> 
        <script>
            function npshop_submit() {
				form = document.getElementById('npshop_form');
				form.submit();
			}
        </script>
    </head>
    <body>
        <p><h2><?= _("Conectando con la entidad financiera...") ?></h2></p>
        <?php TPV_printForm(); ?>
        <script>
            setTimeout("npshop_submit()", 1000);
        </script>
    </body>
</html>