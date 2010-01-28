<?php
define('DEBUG', true);

$_SERVER_DATA = null;

if (isset($_ENV) && ($_ENV != null)) {
    $_SERVER_DATA=$_ENV;
} else if (isset($_SERVER)) {
    $_SERVER_DATA=$_SERVER;
}

$NPLIB_PATH = APP_ROOT."/lib/np-lib/";
require_once(APP_ROOT."/lib/np-lib/includes.php");

function doConfig() {
	$constants = array();
	$constants["EXTRA_WEIGHT_SHIPPING_COST"] = "100.00";
	
	$constants["ORDER_STATUS"]["PENDENT"] =         _("PROCESO DE PAGO");
	$constants["ORDER_STATUS"]["PAYMENT_OK"] =      _("PAGO TPV OK");
	$constants["ORDER_STATUS"]["PAYMENT_TRANSFER"] =      _("PAGO PDTE POR TRANSFERENCIA");
	$constants["ORDER_STATUS"]["PAYMENT_ERROR"] =   _("PAGO TPV ERROR");
	$constants["ORDER_STATUS"]["PENDING_SENT"] =    _("PDTE ENVIO A CLIENTE");
	$constants["ORDER_STATUS"]["PENDING_SENT_ONDELIVERY"] =      _("PDTE ENVIO CONTRAREEMBOLSO");
	$constants["ORDER_STATUS"]["SENT"] =            _("ENVIADO A CLIENTE");
	$constants["ORDER_STATUS"]["RETURNED"] =        _("DEVOLUCION CLIENTE");
	$constants["ORDER_STATUS"]["CLOSED"] =          _("FINALIZADO");
	
	$constants["EMAIL_FROM"] = _("Pedidos DavidBenavente.com <pedidos@davidbenavente.com>");
	$constants["EMAIL_SUBJECT"] = _("Pedido en la tienda de David Benavente: ");
	$constants["EMAIL_NOTIFICATION"] = "pedidos@davidbenavente.com";
	$constants["EMAIL_DEBUG"] = "devel@danielpecos.com";
	
	//****************** DATABASE ***********************
	// Datos de configuracion de la BBDD
	$ddbb = array();
	
	// Common 
	$ddbb["PREFIX"] = "NPS_";	
	
    // REAL
    /*$ddbb["HOST"] = "lldd770.servidoresdns.net";
	$ddbb["USER"] = "qdw037";
	$ddbb["PASSWD"] = "Duero2010";
	$ddbb["NAME"] = "qdw037";*/
    
    // PRUEBAS
    /*$ddbb["HOST"] = "llda252.servidoresdns.net";
	$ddbb["USER"] = "qdq572";
	$ddbb["PASSWD"] = "Duero2009";
	$ddbb["NAME"] = "qdq572";*/

    // DEVEL
    $ddbb["HOST"] = "localhost";
	$ddbb["USER"] = "npshop_user";
	$ddbb["PASSWD"] = "npshop_password";
	$ddbb["NAME"] = "npshop";

	
	//****************** TPV ***********************
	
	// Datos de configuracion del TPV
	$tpv = array();
	
	// Common
	$tpv['class'] = "cajamadrid";
	$tpv['name'] = "David Benavente Lopez";
	$tpv['productDescription'] = _("Pedido David Benavente - ");
	$tpv['terminal'] = "001";
	$tpv['currency'] = "978";

	// REAL
	/*$tpv['url'] = "https://sis.sermepa.es/sis/realizarPago";
	$tpv['key'] = "U998T5183NU3OM8U";
	$tpv['code'] = "285517991";*/
	
	// PRUEBAS
	$tpv['url'] = "https://sis-i.sermepa.es:25443/sis/realizarPago";
	$tpv['key'] = "qwertyasdf0123456789";
	$tpv['code'] = "285517991";
	

	
	/*
	     Tarjeta de pruebas:
	        4548812049400004
	        12/07
	        123456
	*/
	
	$skin = array();
	$skin['name'] = "davidbenavente";
	$skin['path'] = "/sites/";	
	
	$langs = array();
	$langs['es_ES'] = "Spanish";
	$langs['en_US'] = "English";
	
	$nps = array();
	$nps['ddbb'] = $ddbb;
	$nps['tpv'] = $tpv;
	$nps['skin'] = $skin;
	$nps['constants'] = $constants;
	$nps['avaliable_languages'] = $langs;
	$nps['language'] = "en_US";
	
	return $nps;
}

$npshop = doConfig($npshop);

define('NP_DEFAULT_LANG', "en_US");
if (isset($_GET) && array_key_exists("LANG", $_GET)) {
     define('NP_LANG', $_GET[LANG]);
     setcookie('NP_LANG', $_GET[LANG]);
} else {
    define('NP_LANG', $_COOKIE['NP_LANG'] != NULL ? $_COOKIE['NP_LANG'] : $npshop['language']);
}
    
putenv("LC_ALL=".NP_LANG);
setlocale(LC_ALL, NP_LANG);
bindtextdomain("messages", APP_ROOT."/i18n");
textdomain("messages");

if (version_compare(phpversion(), '5.0') < 0) {
    $ddbb = new NP_DDBB();
    $ddbb->__construct($npshop['ddbb']);
} else {
    $ddbb = new NP_DDBB($npshop['ddbb']);
}
?>
