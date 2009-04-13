<?php

$ddbb_table = array();
$ddbb_mapping = array();
$ddbb_types = array();	
$ddbb_info = array();

$ddbb_table = "PEDIDOS";

$ddbb_mapping['orderId'] = 								"PED_CO_CODIGO";
$ddbb_mapping['user']['id'] = 							"CLI_CO_CODIGO";
$ddbb_mapping['date'] = 			    				"PED_FX_FECHA";
$ddbb_mapping['orderStatus'] = 							"PED_IN_ESTADO";
$ddbb_mapping['user']['billingData']['name'] = 		    "PED_VA_FACNOMBRE";
$ddbb_mapping['user']['billingData']['surname'] = 		"PED_VA_FACAPELLIDOS";
$ddbb_mapping['user']['billingData']['address'] = 		"PED_VA_FACDIRECCION";
$ddbb_mapping['user']['billingData']['address2'] = 	    "PED_VA_FACDIRAUX";
$ddbb_mapping['user']['billingData']['postalCode'] = 	"PED_VA_FACCP";
$ddbb_mapping['user']['billingData']['city'] = 			"PED_VA_FACPOBLACION";
$ddbb_mapping['user']['billingData']['province'] = 	    "PED_NU_FACPROVINCIA";
$ddbb_mapping['user']['billingData']['country'] = 		"PED_NU_FACPAIS";
$ddbb_mapping['user']['billingData']['phone'] = 		"PED_VA_FACTELEFONO";
$ddbb_mapping['user']['shippingData']['name'] = 		"PED_VA_ENVNOMBRE";
$ddbb_mapping['user']['shippingData']['surname'] =	 	"PED_VA_ENVAPELLIDOS";
$ddbb_mapping['user']['shippingData']['address'] = 		"PED_VA_ENVDIRECCION";
$ddbb_mapping['user']['shippingData']['address2'] =		"PED_VA_ENVDIRAUX";
$ddbb_mapping['user']['shippingData']['postalCode'] = 	"PED_VA_ENVCP";
$ddbb_mapping['user']['shippingData']['city'] = 		"PED_VA_ENVPOBLACION";
$ddbb_mapping['user']['shippingData']['province'] = 	"PED_NU_ENVPROVINCIA";
$ddbb_mapping['user']['shippingData']['country'] = 		"PED_NU_ENVPAIS";
$ddbb_mapping['user']['shippingData']['phone'] = 		"PED_VA_ENVTELEFONO";
$ddbb_mapping['shippingDays'] = 						"PED_NU_DIASENTREGA";
$ddbb_mapping['tpvData'] =                              "PED_TPV_DATA";
$ddbb_mapping['statusHistory'] = 					    "PED_ST_HIST";

$ddbb_types['orderId'] = 								"INT";
$ddbb_types['user']['id'] = 							"INT";
$ddbb_types['date'] = 					    			"DATE";
$ddbb_types['orderStatus'] = 							"STRING";
$ddbb_types['user']['billingData']['name'] = 			"STRING";
$ddbb_types['user']['billingData']['surname'] = 		"STRING";
$ddbb_types['user']['billingData']['address'] = 		"STRING";
$ddbb_types['user']['billingData']['address2'] = 		"STRING";
$ddbb_types['user']['billingData']['postalCode'] = 		"STRING";
$ddbb_types['user']['billingData']['city'] = 			"STRING";
$ddbb_types['user']['billingData']['province'] = 		"INT";
$ddbb_types['user']['billingData']['country'] = 		"INT";
$ddbb_types['user']['billingData']['phone'] = 			"STRING";
$ddbb_types['user']['shippingData']['name'] = 			"STRING";
$ddbb_types['user']['shippingData']['surname'] =	 	"STRING";
$ddbb_types['user']['shippingData']['address'] = 		"STRING";
$ddbb_types['user']['shippingData']['address2'] =		"STRING";
$ddbb_types['user']['shippingData']['postalCode'] = 	"STRING";
$ddbb_types['user']['shippingData']['city'] = 			"STRING";
$ddbb_types['user']['shippingData']['province'] = 		"INT";
$ddbb_types['user']['shippingData']['country'] = 		"INT";
$ddbb_types['user']['shippingData']['phone'] = 			"STRING";
$ddbb_types['shippingDays'] = 							"INT";
$ddbb_types['tpvData'] =                                "STRING";
$ddbb_types['statusHistory'] =                          "STRING";

$ddbb_info['orderId'] = array("PK" => true);


global $ddbb;
$ddbb->addConfig("Cart", $ddbb_table, $ddbb_mapping, $ddbb_types, $ddbb_info);
$ddbb->addConfig("cart", $ddbb_table, $ddbb_mapping, $ddbb_types, $ddbb_info);
?>