<?php

if (!defined('APP_ROOT')) {
    define('APP_ROOT', "../../..");
    require_once(APP_ROOT."/config/main.php");
    require_once(APP_ROOT."/common/commonFunctions.php");
}

global $_SERVER_DATA;

$METHOD = "POST";

if ($_SERVER_DATA["REQUEST_METHOD"] == $METHOD) {
    // backend TPV response 
    
    $_DATA = null;
    eval("\$_DATA=\$_".$METHOD.";");
  
    if (isset($_DATA['Ds_MerchantData']) && trim($_DATA['Ds_MerchantData']) != "") {
        $orderId = $_DATA['Ds_MerchantData'];
        $orderStatus = $_DATA['Ds_Response'];
       
        $tpvData = null;
        foreach($_DATA as $k => $v)
            $tpvData .= $k."=".$v."; ";
            
        $cart = new Cart($orderId);
        //$cart->orderId = $orderId;
        
        if (is_numeric($orderStatus) && intval($orderStatus) < 100) {
            $cart->changeStatus($npshop["constants"]["ORDER_STATUS"]["PAYMENT_OK"], $tpvData);
            
            //immediatelly step to next status
            $cart->changeStatus($npshop["constants"]["ORDER_STATUS"]["PENDING_SENT"]);
        } else {
            $cart->changeStatus($npshop["constants"]["ORDER_STATUS"]["PAYMENT_ERROR"], $tpvData);
        }
    }
  
} else {

    require_once(APP_ROOT."/lib/sha.php");
    
    function __signature($amount,$order,$code,$currency,$clave) {
    	$sha = new SHA;
    	$message = $amount.$order.$code.$currency.$clave;
    	$digest1 = $sha->hash_string($message);
    	$signature = strtoupper ($sha->hash_to_string( $digest1 ));
    
    	return $signature;
    }
    
    function printForm() {
        global $npshop, $_SERVER_DATA;
        
        $cart = get_cart();
    	$tpv = $npshop['tpv'];
    	    
        $scriptURL = dirname(dirname($_SERVER["PHP_SELF"]));
    
    	$amount = $cart->getTotal(1) * 100;
    	
    	// format: MMDDxxxxxxSS"
    	$orderId = date("md").sprintf("%06d", $cart->orderId).date("s");
    	$signature = __signature($amount, $orderId, $tpv['code'], $tpv['currency'], $tpv['key']);
?>
    	<form id="npshop_form" action="<?php echo $tpv['url'] ?>" method="POST">
    		<input type="hidden" name="DS_Merchant_Amount" value="<?php echo $amount ?>"/>
    		<input type="hidden" name="DS_Merchant_Currency" value="<?php echo $tpv['currency'] ?>"/>
    		<input type="hidden" name="DS_Merchant_Order" value="<?php echo $orderId ?>"/>
    		<input type="hidden" name="DS_Merchant_ProductDescription" value="<?php echo $tpv['productDescription']." ".$orderId ?>"/>
    		<input type="hidden" name="DS_Merchant_Titular" value="<?php echo $tpv['name'] ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantCode" value="<?php echo $tpv['code'] ?>"/>
    		<input type="hidden" name="DS_Merchant_Terminal" value="<?php echo $tpv['terminal'] ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantSignature" value="<?php echo $signature ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantURL" value="http://<?php echo $_SERVER_DATA["HTTP_HOST"].$scriptURL ?>/common/modules/payment/TPV_cajamadrid.php"/>
    		<input type="hidden" name="DS_Merchant_URLOK" value="http://<?php echo $_SERVER_DATA["HTTP_HOST"].$scriptURL ?>/flows/payment.php?result=ok"/>
    		<input type="hidden" name="DS_Merchant_URLKO" value="http://<?php echo $_SERVER_DATA["HTTP_HOST"].$scriptURL ?>/flows/payment.php?result=error"/> 
    		<input type="hidden" name="DS_Merchant_MerchantData" value="<?php echo $cart->orderId ?>"/> 
    	</form>
<?php
    }
    
    
    $cart = get_cart();
   
    if (isset($cart->orderId) && $cart->orderId != null) {
        showSkin("TPV");     
    }
    
}

?>

