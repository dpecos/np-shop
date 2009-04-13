<?php

define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");

$errorMsg = null;
$errors = array();

function addItem($itemId) {
	$item = new Item($itemId);
	$cart = get_cart();
	$cart->addItem($item);
	update_cart($cart);
}

function modifyItem($itemId, $quantity) {
    global $errorMsg, $errors;
    if ($quantity > 0) {
    	$item = new Item($itemId, $quantity);
    	
    	if ($item->quantity > $item->stock) {
    	    $errors[$itemId] = sprintf(_("No hay suficiente stock disponible (%s disponibles)"), $item->stock);
    	} else {
        	$cart = get_cart();
        	$cart->addItem($item);
        	update_cart($cart);
        }
    } else {
        deleteItem($itemId);
    }
}

function deleteItem($itemId) {
	$item = new Item($itemId);
	$cart = get_cart();
	$cart->deleteItem($item);
	update_cart($cart);
}

if (isset($_REQUEST['action'])) {
	
	if ($_REQUEST['action'] == "add") {
	    addItem($_REQUEST['itemId']);
	} else if ($_REQUEST['action'] == "delete") {
	    deleteItem($_REQUEST['itemId']);
	} else if ($_REQUEST['action'] == "update" || 
	            $_REQUEST['action'] == "update_confirm" || 
	            $_REQUEST['action'] == "update_continue") {
		//print_r($_REQUEST);
		$cart = get_cart();
		foreach ($cart->items as $itemId => $item) {
			if (isset($_REQUEST[$itemId."_id"]) && isset($_REQUEST[$itemId."_quantity"])) {
				modifyItem($_REQUEST[$itemId."_id"], $_REQUEST[$itemId."_quantity"]);
			}
		}
		
		if (count($errors) != 0) {    
		    $errorMsg = _("No se pudo actualizar el carrito correctamente.");
		}
		
		if ($_REQUEST['action'] == "update_confirm") {
		    if (count($errors) == 0) {
		        redirect(APP_ROOT."/flows/confirmCart.php"); 
		    }
		} else if ($_REQUEST['action'] == "update_continue") {
		    if (count($errors) == 0) {
		        redirect(APP_ROOT."/flows/listCategory.php"); 
		    }
		}
	}
}

showSkin(basename(__FILE__));
?>