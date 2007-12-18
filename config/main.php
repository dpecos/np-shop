<?php
define('DEBUG', true);

$_SERVER_DATA = null;
if (isset($_SERVER))
    $_SERVER_DATA=$_SERVER;
else if (isset($_ENV))
    $_SERVER_DATA=$_ENV;
    
require_once(APP_ROOT."/lib/NPLib_Sql.php");

function doConfig() {
	$constants = array();
	$constants["EXTRA_WEIGHT_SHIPPING_COST"] = "100.00";
	
	$constants["EMAIL_FROM"] = "Pedidos DavidBenavente.com <pedidos@davidbenavente.com>";
	$constants["EMAIL_SUBJECT"] = "Pedido en la tienda de David Benavente: ";
	$constants["EMAIL_NOTIFICATION"] = "pedidos@davidbenavente.com";
	
	$constants["ORDER_STATUS"]["PENDENT"] =         "PROCESO DE PAGO";
	$constants["ORDER_STATUS"]["PAYMENT_OK"] =      "PAGO TPV OK";
	$constants["ORDER_STATUS"]["PAYMENT_ERROR"] =   "PAGO TPV ERROR";
	$constants["ORDER_STATUS"]["PENDING_SENT"] =    "PDTE ENVIO A CLIENTE";
	$constants["ORDER_STATUS"]["SENT"] =            "ENVIADO A CLIENTE";
	$constants["ORDER_STATUS"]["RETURNED"] =        "DEVOLUCION CLIENTE";
	$constants["ORDER_STATUS"]["CLOSED"] =          "FINALIZADO";

	
	$constants["NOTIFY_CHANGE_STATUS"] = array("ORDER_STATUS_PAYMENT_OK");
	
	// Datos de configuracion de la BBDD
	$ddbb = array();
	/*$ddbb["HOST"] = "llda252.servidoresdns.net";
	$ddbb["USER"] = "qcq501";
	$ddbb["PASSWD"] = "Qcq501";
	$ddbb["NAME"] = "qcq501";*/
	$ddbb["HOST"] = "localhost";
	$ddbb["USER"] = "root";
	$ddbb["PASSWD"] = "";
	$ddbb["NAME"] = "NPShop";
	$ddbb["PREFIX"] = "NPS_";
	
	// Datos de configuracion del TPV
	$tpv = array();
	$tpv['class'] = "cajamadrid";
	$tpv['name'] = "David Benavente Lopez";
	$tpv['productDescription'] = "Pedido David Benavente - ";
	$tpv['terminal'] = "001";
	$tpv['currency'] = "978";
	
	/*// Datos reales
	$tpv['url'] = "https://sis.sermepa.es/sis/realizarPago";
	$tpv['key'] = "U998T5183NU3OM8U";
	$tpv['code'] = "285517991";
	*/
	// Datos de prueba
	$tpv['url'] = "https://sis-i.sermepa.es:25443/sis/realizarPago";
	$tpv['key'] = "qwertyasdf0123456789";
	$tpv['code'] = "285517991";        
	
	$skin = array();
	$skin['name'] = "davidbenavente";
	$skin['path'] = "/sites/";	
	
	$nps = array();
	$nps['ddbb'] = $ddbb;
	$nps['tpv'] = $tpv;
	$nps['skin'] = $skin;
	$nps['constants'] = $constants;
	
	return $nps;
}

$npshop = doConfig($npshop);

__NP_initDDBB($npshop["ddbb"]);

?>