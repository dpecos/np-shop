<?php
define('SKIN_ROOT', APP_ROOT."/sites/davidbenavente/"); 
    
global $skinFiles;
$skinFiles = array();

$skinFiles['listCategory.php'] = "productos.php";



$skinFiles['showItem.php']['herramientas'] = "ficha.php";
$skinFiles['showItem.php']['macetas_japo'] = "fichamacetajapo.php";


$skinFiles['cart.php'] = "cesta.php";
$skinFiles['account.php'] = "cuenta.php";
$skinFiles['login.php']['ok'] = "confirmarCompra.php";
$skinFiles['login.php']['loginForm'] = "acceso.php";
$skinFiles['personalData.php'] = "modificarDatos.php";
$skinFiles['confirmCart.php']['confirm'] = "confirmarCompra.php";
$skinFiles['confirmCart.php']['login'] = "acceso.php";
$skinFiles['TPV'] = "tpv.php";
$skinFiles['payment.php']['ok'] = "confirmarCompra.php";
$skinFiles['payment.php']['error'] = "cesta.php";

$skinFiles['admin_index.php'] = "admin/main.php";
$skinFiles['admin_listItems.php'] = "admin/productos.php";
$skinFiles['admin_listOrders.php'] = "admin/pedidos.php";
$skinFiles['admin_itemDetail.php'] = "admin/detalleProducto.php";
$skinFiles['admin_editItem.php'] = "admin/edicionProducto.php";
$skinFiles['admin_orderDetail.php'] = "admin/detallePedido.php";
$skinFiles['admin_shippingLabel.php'] = "admin/etiquetaEnvio.php";
$skinFiles['admin_listUsers.php'] = "admin/usuarios.php";
$skinFiles['admin_userDetail.php'] = "admin/detalleUsuario.php";
$skinFiles['admin_editUser.php'] = "admin/edicionUsuario.php";

require_once(SKIN_ROOT."/npshop/common.php");
?>