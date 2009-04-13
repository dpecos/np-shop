<?php
$ddbb_table = array();
$ddbb_mapping = array();
$ddbb_types = array();	

$ddbb_table = "CLIENTES";

$ddbb_mapping['id'] = 							"CLI_CO_CODIGO";
$ddbb_mapping['email'] = 						"CLI_VA_EMAIL";
$ddbb_mapping['mailing'] = 						"CLI_VA_MAILING";
$ddbb_mapping['shippingData']['name'] = 		"CLI_VA_ENVNOMBRE";
$ddbb_mapping['shippingData']['surname'] = 		"CLI_VA_ENVAPELLIDOS";
$ddbb_mapping['shippingData']['address'] = 		"CLI_VA_ENVDIRECCION";
$ddbb_mapping['shippingData']['address2'] = 	"CLI_VA_ENVDIRAUX";
$ddbb_mapping['shippingData']['postalCode'] = 	"CLI_VA_ENVCP";
$ddbb_mapping['shippingData']['city'] = 		"CLI_VA_ENVPOBLACION";
$ddbb_mapping['shippingData']['province'] = 	"CLI_NU_ENVPROVINCIA";
$ddbb_mapping['shippingData']['country'] = 		"CLI_NU_ENVPAIS";
$ddbb_mapping['shippingData']['phone'] = 		"CLI_VA_ENVTELEFONO";
$ddbb_mapping['billingData']['name'] = 			"CLI_VA_FACNOMBRE";
$ddbb_mapping['billingData']['surname'] =	 	"CLI_VA_FACAPELLIDOS";
$ddbb_mapping['billingData']['address'] = 		"CLI_VA_FACDIRECCION";
$ddbb_mapping['billingData']['address2'] =		"CLI_VA_FACDIRAUX";
$ddbb_mapping['billingData']['postalCode'] = 	"CLI_VA_FACCP";
$ddbb_mapping['billingData']['city'] = 			"CLI_VA_FACPOBLACION";
$ddbb_mapping['billingData']['province'] = 	"CLI_NU_FACPROVINCIA";
$ddbb_mapping['billingData']['country'] = 		"CLI_NU_FACPAIS";
$ddbb_mapping['billingData']['phone'] = 		"CLI_VA_FACTELEFONO";
//$ddbb_mapping = 						"CLI_VA_USER";
$ddbb_mapping['password'] = 					"CLI_VA_PSWD";

$ddbb_types['id'] = 							"INT";
$ddbb_types['email'] = 							"STRING";
$ddbb_types['mailing'] = 						"BOOL";
$ddbb_types['billingData']['name'] = 			"STRING";
$ddbb_types['billingData']['surname'] = 		"STRING";
$ddbb_types['billingData']['address'] = 		"STRING";
$ddbb_types['billingData']['address2'] = 		"STRING";
$ddbb_types['billingData']['postalCode'] = 		"STRING";
$ddbb_types['billingData']['city'] = 			"STRING";
$ddbb_types['billingData']['province'] = 		"INT";
$ddbb_types['billingData']['country'] = 		"INT";
$ddbb_types['billingData']['phone'] = 			"STRING";
$ddbb_types['shippingData']['name'] = 			"STRING";
$ddbb_types['shippingData']['surname'] =	 	"STRING";
$ddbb_types['shippingData']['address'] = 		"STRING";
$ddbb_types['shippingData']['address2'] =		"STRING";
$ddbb_types['shippingData']['postalCode'] = 	"STRING";
$ddbb_types['shippingData']['city'] = 			"STRING";
$ddbb_types['shippingData']['province'] = 		"INT";
$ddbb_types['shippingData']['country'] = 		"INT";
$ddbb_types['shippingData']['phone'] = 			"STRING";
//$ddbb_types = 							"STRING";
$ddbb_types['password'] = 						"STRING";

global $ddbb;
$ddbb->addConfig("user", $ddbb_table, $ddbb_mapping, $ddbb_types);
$ddbb->addConfig("User", $ddbb_table, $ddbb_mapping, $ddbb_types);
?>
