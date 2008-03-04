<?php

if (!isset($ddbb_table)) {
	$ddbb_table = array();
	$ddbb_mapping = array();
	$ddbb_types = array();	
}

$ddbb_table['Item'] = $npshop["ddbb"]["PREFIX"]."PRODUCTOS";

$ddbb_mapping['Item']['id'] = 			"PRO_CO_CODIGO";
$ddbb_mapping['Item']['name'] = 		"PRO_VA_NOMBRE";
$ddbb_mapping['Item']['categoryId'] = 	"CAT_CO_CODIGO";
$ddbb_mapping['Item']['tradeMark'] = 	"PRO_VA_MARCA"; 
$ddbb_mapping['Item']['weight'] =		"PRO_NU_PESO";
$ddbb_mapping['Item']['length'] = 		"PRO_NU_LONGITUD";
$ddbb_mapping['Item']['height'] = 		"PRO_NU_ALTURA";
$ddbb_mapping['Item']['depth'] = 		"PRO_NU_PROFUNDIDAD";
$ddbb_mapping['Item']['description'] = 	"PRO_VA_COMENTARIO";
$ddbb_mapping['Item']['new'] =          "PRO_IN_NOVEDAD";
$ddbb_mapping['Item']['stock'] = 		"PRO_NU_STOCK";
$ddbb_mapping['Item']['stockLimit'] = 	"PRO_NU_STOCKMINIMO";
$ddbb_mapping['Item']['prize'] = 		"PRO_IM_PRECIO";
$ddbb_mapping['Item']['shippingDays'] = "PRO_NU_DIASENTREGA"; 
$ddbb_mapping['Item']['retired'] = 		"PRO_IN_RETIRADO"; 
$ddbb_mapping['Item']['specialShipping'] = "PRO_IN_ENVIOESPECIAL";
$ddbb_mapping['Item']['specialShippingCost'] = "PRO_IM_PRECIOENVESP";
$ddbb_mapping['Item']['order'] =        "PRO_NU_ORDEN";

$ddbb_mapping['Item']['dimen'] = 		"PRO_VA_DIMENSIONES";
$ddbb_mapping['Item']['complement'] = 	"PRO_VA_COMPLEMENTO";
$ddbb_mapping['Item']['complement2'] = 	"PRO_VA_COMPLEMENTO2";


$ddbb_types['Item']['id'] = 			"STRING";
$ddbb_types['Item']['name'] = 			"STRING";
$ddbb_types['Item']['categoryId'] = 	"INT";
$ddbb_types['Item']['tradeMark'] = 		"STRING";
$ddbb_types['Item']['weight'] =			"INT";
$ddbb_types['Item']['length'] = 		"INT";
$ddbb_types['Item']['height'] = 		"INT";
$ddbb_types['Item']['depth'] = 			"INT";
$ddbb_types['Item']['description'] = 	"STRING";
$ddbb_types['Item']['new'] = 		    "BOOL";
$ddbb_types['Item']['stock'] = 			"INT";
$ddbb_types['Item']['stockLimit'] = 	"INT";
#$ddbb_types['Item']['prize'] = 		"FLOAT";
$ddbb_types['Item']['prize'] = 			"INT";
$ddbb_types['Item']['shippingDays'] = 	"INT"; 
$ddbb_types['Item']['retired'] = 		"BOOL";
$ddbb_types['Item']['specialShipping'] = "BOOL";
#$ddbb_types['Item']['specialShippingCost'] = 	"FLOAT";
$ddbb_types['Item']['specialShippingCost'] = 	"INT";
$ddbb_types['Item']['order'] = 	        "INT";

$ddbb_types['Item']['dimen'] = 		    "STRING";
$ddbb_types['Item']['complement'] = 	"STRING";
$ddbb_types['Item']['complement2'] = 	"STRING";

?>