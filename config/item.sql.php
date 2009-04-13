<?php
$ddbb_table = array();
$ddbb_mapping = array();
$ddbb_types = array();	

$ddbb_table = "PRODUCTOS";

$ddbb_mapping['id'] = 			"PRO_CO_CODIGO";
$ddbb_mapping['name'] = 		"PRO_VA_NOMBRE";
$ddbb_mapping['categoryId'] = 	"CAT_CO_CODIGO";
$ddbb_mapping['tradeMark'] = 	"PRO_VA_MARCA"; 
$ddbb_mapping['weight'] =		"PRO_NU_PESO";
$ddbb_mapping['length'] = 		"PRO_NU_LONGITUD";
$ddbb_mapping['height'] = 		"PRO_NU_ALTURA";
$ddbb_mapping['depth'] = 		"PRO_NU_PROFUNDIDAD";
$ddbb_mapping['description'] = 	"PRO_VA_COMENTARIO";
$ddbb_mapping['new'] =          "PRO_IN_NOVEDAD";
$ddbb_mapping['stock'] = 		"PRO_NU_STOCK";
$ddbb_mapping['stockLimit'] = 	"PRO_NU_STOCKMINIMO";
$ddbb_mapping['prize'] = 		"PRO_IM_PRECIO";
$ddbb_mapping['shippingDays'] = "PRO_NU_DIASENTREGA"; 
$ddbb_mapping['retired'] = 		"PRO_IN_RETIRADO"; 
$ddbb_mapping['specialShipping'] = "PRO_IN_ENVIOESPECIAL";
$ddbb_mapping['specialShippingCost'] = "PRO_IM_PRECIOENVESP";
$ddbb_mapping['order'] =        "PRO_NU_ORDEN";

$ddbb_mapping['dimen'] = 		"PRO_VA_DIMENSIONES";
$ddbb_mapping['complement'] = 	"PRO_VA_COMPLEMENTO";
$ddbb_mapping['complement2'] = 	"PRO_VA_COMPLEMENTO2";


$ddbb_types['id'] = 			"STRING";
$ddbb_types['name'] = 			"STRING_I18N";
$ddbb_types['categoryId'] = 	"INT";
$ddbb_types['tradeMark'] = 		"STRING";
$ddbb_types['weight'] =			"INT";
$ddbb_types['length'] = 		"INT";
$ddbb_types['height'] = 		"INT";
$ddbb_types['depth'] = 			"INT";
$ddbb_types['description'] = 	"STRING_I18N";
$ddbb_types['new'] = 		    "BOOL";
$ddbb_types['stock'] = 			"INT";
$ddbb_types['stockLimit'] = 	"INT";
#$ddbb_types['prize'] = 		"FLOAT";
$ddbb_types['prize'] = 			"INT";
$ddbb_types['shippingDays'] = 	"INT"; 
$ddbb_types['retired'] = 		"BOOL";
$ddbb_types['specialShipping'] = "BOOL";
#$ddbb_types['specialShippingCost'] = 	"FLOAT";
$ddbb_types['specialShippingCost'] = 	"INT";
$ddbb_types['order'] = 	        "INT";

$ddbb_types['dimen'] = 		    "STRING";
$ddbb_types['complement'] = 	"STRING_I18N";
$ddbb_types['complement2'] = 	"STRING_I18N";

global $ddbb;
$ddbb->addConfig("Item", $ddbb_table, $ddbb_mapping, $ddbb_types);
$ddbb->addConfig("item", $ddbb_table, $ddbb_mapping, $ddbb_types); // php4 bug?
?>