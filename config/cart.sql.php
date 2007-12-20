<?php

if (!isset($ddbb_table)) {
	$ddbb_table = array();
	$ddbb_mapping = array();
	$ddbb_types = array();	
}

$ddbb_table['Cart'] = $npshop["ddbb"]["PREFIX"]."PEDIDOS";

$ddbb_mapping['Cart']['orderId'] = 								"PED_CO_CODIGO";
$ddbb_mapping['Cart']['user']['id'] = 							"CLI_CO_CODIGO";
$ddbb_mapping['Cart']['date'] = 			    				"PED_FX_FECHA";
$ddbb_mapping['Cart']['orderStatus'] = 							"PED_IN_ESTADO";
$ddbb_mapping['Cart']['user']['billingData']['name'] = 		"PED_VA_FACNOMBRE";
$ddbb_mapping['Cart']['user']['billingData']['surname'] = 		"PED_VA_FACAPELLIDOS";
$ddbb_mapping['Cart']['user']['billingData']['address'] = 		"PED_VA_FACDIRECCION";
$ddbb_mapping['Cart']['user']['billingData']['address2'] = 	"PED_VA_FACDIRAUX";
$ddbb_mapping['Cart']['user']['billingData']['postalCode'] = 	"PED_VA_FACCP";
$ddbb_mapping['Cart']['user']['billingData']['city'] = 			"PED_VA_FACPOBLACION";
$ddbb_mapping['Cart']['user']['billingData']['province'] = 	"PED_NU_FACPROVINCIA";
$ddbb_mapping['Cart']['user']['billingData']['country'] = 		"PED_NU_FACPAIS";
$ddbb_mapping['Cart']['user']['billingData']['phone'] = 		"PED_VA_FACTELEFONO";
$ddbb_mapping['Cart']['user']['shippingData']['name'] = 		"PED_VA_ENVNOMBRE";
$ddbb_mapping['Cart']['user']['shippingData']['surname'] =	 	"PED_VA_ENVAPELLIDOS";
$ddbb_mapping['Cart']['user']['shippingData']['address'] = 		"PED_VA_ENVDIRECCION";
$ddbb_mapping['Cart']['user']['shippingData']['address2'] =		"PED_VA_ENVDIRAUX";
$ddbb_mapping['Cart']['user']['shippingData']['postalCode'] = 	"PED_VA_ENVCP";
$ddbb_mapping['Cart']['user']['shippingData']['city'] = 		"PED_VA_ENVPOBLACION";
$ddbb_mapping['Cart']['user']['shippingData']['province'] = 	"PED_NU_ENVPROVINCIA";
$ddbb_mapping['Cart']['user']['shippingData']['country'] = 		"PED_NU_ENVPAIS";
$ddbb_mapping['Cart']['user']['shippingData']['phone'] = 		"PED_VA_ENVTELEFONO";
$ddbb_mapping['Cart']['shippingDays'] = 						"PED_NU_DIASENTREGA";
$ddbb_mapping['Cart']['tpvData'] =                              "PED_TPV_DATA";
$ddbb_mapping['Cart']['statusHistory'] = 							"PED_ST_HIST";

$ddbb_types['Cart']['orderId'] = 								"INT";
$ddbb_types['Cart']['user']['id'] = 							"INT";
$ddbb_types['Cart']['date'] = 					    			"DATE";
$ddbb_types['Cart']['orderStatus'] = 							"STRING";
$ddbb_types['Cart']['user']['billingData']['name'] = 			"STRING";
$ddbb_types['Cart']['user']['billingData']['surname'] = 		"STRING";
$ddbb_types['Cart']['user']['billingData']['address'] = 		"STRING";
$ddbb_types['Cart']['user']['billingData']['address2'] = 		"STRING";
$ddbb_types['Cart']['user']['billingData']['postalCode'] = 		"STRING";
$ddbb_types['Cart']['user']['billingData']['city'] = 			"STRING";
$ddbb_types['Cart']['user']['billingData']['province'] = 		"INT";
$ddbb_types['Cart']['user']['billingData']['country'] = 		"INT";
$ddbb_types['Cart']['user']['billingData']['phone'] = 			"STRING";
$ddbb_types['Cart']['user']['shippingData']['name'] = 			"STRING";
$ddbb_types['Cart']['user']['shippingData']['surname'] =	 	"STRING";
$ddbb_types['Cart']['user']['shippingData']['address'] = 		"STRING";
$ddbb_types['Cart']['user']['shippingData']['address2'] =		"STRING";
$ddbb_types['Cart']['user']['shippingData']['postalCode'] = 	"STRING";
$ddbb_types['Cart']['user']['shippingData']['city'] = 			"STRING";
$ddbb_types['Cart']['user']['shippingData']['province'] = 		"INT";
$ddbb_types['Cart']['user']['shippingData']['country'] = 		"INT";
$ddbb_types['Cart']['user']['shippingData']['phone'] = 			"STRING";
$ddbb_types['Cart']['shippingDays'] = 							"INT";
$ddbb_types['Cart']['tpvData'] =                                "STRING";
$ddbb_types['Cart']['statusHistory'] =                                "STRING";
?>