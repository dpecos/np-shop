<?php

if (!isset($ddbb_table)) {
	$ddbb_table = array();
	$ddbb_mapping = array();
	$ddbb_types = array();	
}

$ddbb_table['User'] = $npshop["ddbb"]["PREFIX"]."CLIENTES";

$ddbb_mapping['User']['id'] = 							"CLI_CO_CODIGO";
$ddbb_mapping['User']['email'] = 						"CLI_VA_EMAIL";
$ddbb_mapping['User']['mailing'] = 						"CLI_VA_MAILING";
$ddbb_mapping['User']['shippingData']['name'] = 		"CLI_VA_ENVNOMBRE";
$ddbb_mapping['User']['shippingData']['surname'] = 		"CLI_VA_ENVAPELLIDOS";
$ddbb_mapping['User']['shippingData']['address'] = 		"CLI_VA_ENVDIRECCION";
$ddbb_mapping['User']['shippingData']['address2'] = 	"CLI_VA_ENVDIRAUX";
$ddbb_mapping['User']['shippingData']['postalCode'] = 	"CLI_VA_ENVCP";
$ddbb_mapping['User']['shippingData']['city'] = 		"CLI_VA_ENVPOBLACION";
$ddbb_mapping['User']['shippingData']['province'] = 	"CLI_NU_ENVPROVINCIA";
$ddbb_mapping['User']['shippingData']['country'] = 		"CLI_NU_ENVPAIS";
$ddbb_mapping['User']['shippingData']['phone'] = 		"CLI_VA_ENVTELEFONO";
$ddbb_mapping['User']['billingData']['name'] = 			"CLI_VA_FACNOMBRE";
$ddbb_mapping['User']['billingData']['surname'] =	 	"CLI_VA_FACAPELLIDOS";
$ddbb_mapping['User']['billingData']['address'] = 		"CLI_VA_FACDIRECCION";
$ddbb_mapping['User']['billingData']['address2'] =		"CLI_VA_FACDIRAUX";
$ddbb_mapping['User']['billingData']['postalCode'] = 	"CLI_VA_FACCP";
$ddbb_mapping['User']['billingData']['city'] = 			"CLI_VA_FACPOBLACION";
$ddbb_mapping['User']['billingData']['province'] = 	"CLI_NU_FACPROVINCIA";
$ddbb_mapping['User']['billingData']['country'] = 		"CLI_NU_FACPAIS";
$ddbb_mapping['User']['billingData']['phone'] = 		"CLI_VA_FACTELEFONO";
//$ddbb_mapping['User']['user'] = 						"CLI_VA_USER";
$ddbb_mapping['User']['password'] = 					"CLI_VA_PSWD";

$ddbb_types['User']['id'] = 							"INT";
$ddbb_types['User']['email'] = 							"STRING";
$ddbb_types['User']['mailing'] = 						"BOOL";
$ddbb_types['User']['billingData']['name'] = 			"STRING";
$ddbb_types['User']['billingData']['surname'] = 		"STRING";
$ddbb_types['User']['billingData']['address'] = 		"STRING";
$ddbb_types['User']['billingData']['address2'] = 		"STRING";
$ddbb_types['User']['billingData']['postalCode'] = 		"STRING";
$ddbb_types['User']['billingData']['city'] = 			"STRING";
$ddbb_types['User']['billingData']['province'] = 		"INT";
$ddbb_types['User']['billingData']['country'] = 		"INT";
$ddbb_types['User']['billingData']['phone'] = 			"STRING";
$ddbb_types['User']['shippingData']['name'] = 			"STRING";
$ddbb_types['User']['shippingData']['surname'] =	 	"STRING";
$ddbb_types['User']['shippingData']['address'] = 		"STRING";
$ddbb_types['User']['shippingData']['address2'] =		"STRING";
$ddbb_types['User']['shippingData']['postalCode'] = 	"STRING";
$ddbb_types['User']['shippingData']['city'] = 			"STRING";
$ddbb_types['User']['shippingData']['province'] = 		"INT";
$ddbb_types['User']['shippingData']['country'] = 		"INT";
$ddbb_types['User']['shippingData']['phone'] = 			"STRING";
//$ddbb_types['User']['user'] = 							"STRING";
$ddbb_types['User']['password'] = 						"STRING";
?>