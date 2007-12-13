<?
define('APP_ROOT', "..");
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/common/commonFunctions.php");


if ($_ENV["REQUEST_METHOD"] == "POST") {
    // backend TPV response 
    
    if (isset($_POST['Ds_MerchantData']) && trim($_POST['Ds_MerchantData']) != "") {
        $orderId = $_POST['Ds_MerchantData'];
        $orderStatus = $_POST['Ds_Response'];
        
        $tpvData = null;
        foreach($_POST as $k => $v)
            $tpvData .= $k."=".$v."; ";
            
        $cart = new Cart($orderId);
        //$cart->orderId = $orderId;
        
        if (is_numeric($orderStatus) && intval($orderStatus) < 100) {
            $cart->changeStatus($npshop["constants"]["ORDER_STATUS_PAYMENT_OK"], $tpvData);
        } else {
            $cart->changeStatus($npshop["constants"]["ORDER_STATUS_PAYMENT_ERROR"], $tpvData);
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
        global $npshop;
        
        $cart = get_cart();
    	$tpv = $npshop['tpv'];
    
    	$amount = $cart->getTotal(1) * 100;
    	
    	// format: MMDDxxxxxxSS"
    	$orderId = date("md").sprintf("%06d", $cart->orderId).date("s");
    	$signature = __signature($amount, $orderId, $tpv['code'], $tpv['currency'], $tpv['key']);
?>
    	<form id="npshop_form" action="<?= $tpv['url'] ?>" method="POST">
    		<input type="hidden" name="DS_Merchant_Amount" value="<?= $amount ?>"/>
    		<input type="hidden" name="DS_Merchant_Currency" value="<?= $tpv['currency'] ?>"/>
    		<input type="hidden" name="DS_Merchant_Order" value="<?= $orderId ?>"/>
    		<input type="hidden" name="DS_Merchant_ProductDescription" value="<?= $tpv['productDescription']." ".$orderId ?>"/>
    		<input type="hidden" name="DS_Merchant_Titular" value="<?= $tpv['name'] ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantCode" value="<?= $tpv['code'] ?>"/>
    		<input type="hidden" name="DS_Merchant_Terminal" value="<?= $tpv['terminal'] ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantSignature" value="<?= $signature ?>"/>
    		<input type="hidden" name="DS_Merchant_MerchantURL" value="http://<?= $_ENV["HTTP_HOST"].$_ENV["SCRIPT_URL"] ?>"/>
    		<input type="hidden" name="DS_Merchant_URLOK" value="http://<?= $_ENV["HTTP_HOST"].dirname($_ENV["SCRIPT_URL"]) ?>/payment.php?result=ok"/>
    		<input type="hidden" name="DS_Merchant_URLKO" value="http://<?= $_ENV["HTTP_HOST"].dirname($_ENV["SCRIPT_URL"]) ?>/payment.php?result=error"/> 
    		<input type="hidden" name="DS_Merchant_MerchantData" value="<?= $cart->orderId ?>"/> 
    	</form>
<?
    }
    
    
    $cart = get_cart();
    
    if (isset($cart->orderId) && $cart->orderId != null) {
        showSkin("TPV");     
    }
    
}

?>

