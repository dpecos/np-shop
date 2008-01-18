<?php 
define('APP_ROOT', "../");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$sqlProducts = null;
$sqlCategories = null;

if (!isset($_GET['categoryId']) || $_GET['categoryId'] == null)
    $_GET['categoryId']="all";

function buildSQL($categoryId = null) {
    global $sqlProducts, $sqlCategories, $ddbb_mapping;
    
    $sqlProducts = "SELECT ".$ddbb_mapping["Item"]["id"]." FROM NPS_PRODUCTOS";
    if (isset($categoryId) && $categoryId!="all") {
        $sqlProducts .= " WHERE ".$ddbb_mapping["Item"]["categoryId"]."=".$categoryId." AND ";
    } else {
        $sqlProducts .= " WHERE ";
    }
    $sqlProducts .= $ddbb_mapping["Item"]["retired"]."= 0 ORDER BY ".$ddbb_mapping["Item"]["order"];
    
    $sqlCategories = "SELECT * FROM NPS_CATEGORIAS ORDER BY 1";
}

$itemIds = array();
$categories = array();
$categoryTitle = "Todas las categorías";
array_push($categories, array("all", $categoryTitle));

function fetchProducts($data) {
    global $itemIds, $ddbb_mapping;
    array_push($itemIds, $data[$ddbb_mapping["Item"]["id"]]);
}

function fetchCategories($data) {
    global $categories, $categoryTitle; 
    if ($_GET['categoryId'] == $data['CAT_CO_CODIGO'])
        $categoryTitle = $data['CAT_VA_NOMBRE'];
    array_push($categories, array($data['CAT_CO_CODIGO'], $data['CAT_VA_NOMBRE']));
}

if (isset($_GET['categoryId']))
    buildSQL($_GET['categoryId']);
else
    buildSQL();
NP_executeSelect($sqlProducts, "fetchProducts");

NP_executeSelect($sqlCategories, "fetchCategories");

$items = array();
foreach ($itemIds as $id) {
    if (trim($id) != "") {
        $item = new Item($id);
        array_push($items, $item);
    }
}
?>
<html>
    <head>
        <style>
            <?php include_once(APP_ROOT.'/admin/style.css'); ?>
        </style>
        <script>
            function showCategory() {
			    form = document.getElementById("categoryForm");
			    form.submit();
			}
        </script>
    </head>
    <body>
        <div style="float:left"><h1>Listado de productos</h1></div>
        <div style="float:right">
        <form method="get" id="categoryForm">
            <br/>
			<select class="fd5" name="categoryId" onchange="javascript:showCategory()">			
<?php
global $categories;
foreach ($categories as $cat) { 
?>					    
			    <option value="<?php echo $cat[0]?>" <?php echo $_GET['categoryId']==$cat[0]?"selected":""?>><?php echo $cat[1]?></option>
<?php
}
?>
		    </select>
	    <form>
	    </div>
	    
	    <div style="clear:both"/>

        <center>
        <table border="1" width="80%">
            <thead>
                <tr>
                    <th width="10%">Codigo</th>
                    <th width="40%">Nombre</th>
                    <th width="20%">Marca</th>
                    <th width="10%">Stock</th>
                    <th width="10%">Precio</th>
                    <th width="10%">Retirado</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($items as $item) { ?>
                <tr>
                    <td><a href="itemDetail.php?itemId=<?php echo $item->id ?>"><?php echo $item->id ?></a></td>
                    <td><?php echo $item->name ?></td>
                    <td><?php echo $item->tradeMark ?></td>
                    <td align="right"><?php echo $item->stock ?></td>
                    <td align="right"><?php echo $item->prize ?> &euro;</td>
                    <td align="center"><?php echo $item->retired?"Si":"No" ?></td>
                </tr>
<?php } ?>        
            </tbody>
        </table>
        </center>

    </body>
</html>