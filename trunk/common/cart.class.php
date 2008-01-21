<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/lib/NPLib_Sql.php");
require_once(APP_ROOT."/config/cart.sql.php");

class Cart {
	var $items;
	var $user;

	function Cart($orderId = null) {
		global $ddbb_mapping;
		$this->items = array();
		$this->user = null;
		
    	foreach (array_keys($ddbb_mapping["Cart"]) as $var) {
    		if (!isset($this->$var)) {
				if (!is_array($ddbb_mapping["Cart"][$var])) {					
					$this->$var = null;
				}
			}
		}
		
		if ($orderId != null) {
		    $this->user = new User();
		    $this->orderId = $orderId;
		    $this->_dbLoad();
		}
	}
	
	function addItem($item) {
		$this->items[$item->id] = $item;
		$this->updateOrderShippingDays();
	}

	function deleteItem($item) {
		if (isset($this->items[$item->id])) {
			unset($this->items[$item->id]);
			$this->updateOrderShippingDays();
		}
	}
	
	function getSubTotal() {
		$prize = 0.0;
		foreach ($this->items as $itemId => $item) {
			$prize += $item->getSubTotal();
		}
		//return number_format($prize, 2, '.', '');
		return $prize;
	}
	
	function getTotal($shippingAgentCode) {
		//return number_format($this->getSubTotal() + $this->getShippingCost($shippingAgentCode), 2, '.', '');
		return $this->getSubTotal() + $this->getShippingCost($shippingAgentCode);
	}
	
	function getShippingCost($shippingAgentCode) {
	    global $npshop;
	    
	    if (isset($this->totalShippingCost) && ($this->totalShippingCost != null)) {
	        return $this->totalShippingCost;
	    } else {
    		$normalWeight = 0.0;
    		$shippingCost = 0.0;
    		foreach ($this->items as $itemId => $item) {
    			if ($item->specialShipping) { 
    				$shippingCost += $item->specialShippingCost * $item->quantity;
    			} else {
    				$normalWeight += $item->weight * $item->quantity;
    			}
    		}	 
    		if ($normalWeight > 0)
    		    $normalWeight += $npshop['constants']['EXTRA_WEIGHT_SHIPPING_COST'];
    	
    		$shippingCost += (float)$this->__obtainShippingCost($normalWeight, $shippingAgentCode);
    		
    		//return number_format($shippingCost, 2, '.', '');
    		return $shippingCost;
	    }
	}
	
	function updateOrderShippingDays() {
		$days = 0;
		foreach ($this->items as $itemId => $item) {
			if ($item->shippingDays > $days)
				$days = $item->shippingDays;
		}
		$this->shippingDays = $days;
	}
	
	function __obtainShippingCost($weight, $shippingAgentCode) {
	    if ($weight > 0) {
    		$sql = "SELECT COS_IM_IMPORTE FROM NPS_COSTES WHERE COS_NU_PESOMIN < ".$weight." AND COS_NU_PESOMAX >= ".$weight." AND AGE_CO_CODIGO = ".$shippingAgentCode." AND PAI_CO_CODIGO = 56";
    		
    		$data = NP_executePKSelect($sql);
    		
    		if ($data)
    			return decodeSQLValue($data["COS_IM_IMPORTE"], "FLOAT");
    		else 
    			die("No se encontro el coste para un peso: ".$weight." y el codigo de agente: ".$shippingAgentCode);
		} else
		    return 0;
	}
	
	function _dbStore() {
    	global $ddbb_table, $ddbb_mapping, $ddbb_types;
    	
		$varNames = "";
		$varValues = "";
		$first = true;	
		foreach (get_object_vars($this) as $var => $value) {
			if (array_key_exists($var, $ddbb_mapping["Cart"])) {
				if (is_array($ddbb_mapping["Cart"][$var])) {
					foreach (get_object_vars($this->$var) as $objvar => $objvalue) {
						if (array_key_exists($objvar, $ddbb_mapping["Cart"][$var])) {
							if (is_array($ddbb_mapping["Cart"][$var][$objvar])) {
								foreach ($this->$var->$objvar as $subobjvar => $subobjvalue) {
									if (!$first) {
										$varNames .= ", ";
										$varValues .= ", ";
									} else
										$first = false;
									$varNames .= $ddbb_mapping["Cart"][$var][$objvar][$subobjvar];
									$varValues .= encodeSQLValue($subobjvalue, $ddbb_types["Cart"][$var][$objvar][$subobjvar]);
								}
							} else {
								if (!$first) {
									$varNames .= ", ";
									$varValues .= ", ";
								} else
									$first = false;
								$varNames .= $ddbb_mapping["Cart"][$var][$objvar];
								$varValues .= encodeSQLValue($objvalue, $ddbb_types["Cart"][$var][$objvar]);
							}
						}
					}
				} else {
					if ($value != null) {
						if (!$first) {
							$varNames .= ", ";
							$varValues .= ", ";
						} else
							$first = false;
						$varNames .= $ddbb_mapping["Cart"][$var];
						$varValues .= encodeSQLValue($value, $ddbb_types["Cart"][$var]);
					}
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql = "INSERT INTO ".$ddbb_table["Cart"]." ($varNames) VALUES ($varValues)";	
				
		return NP_executeInsertUpdate($sql);
	}
	
	function _dbLoad() {
    	global $ddbb_table, $ddbb_mapping, $ddbb_types, $npshop;
		
		$sql = NP_createSELECT($this, $ddbb_table["Cart"], $ddbb_mapping["Cart"], $ddbb_types["Cart"], $ddbb_mapping["Cart"]['orderId']."=".$this->orderId);
		
		$data = NP_executePKSelect($sql);
				
	    if (is_array($data)) {	 
	        
	        NP_loadData($this, $data, $ddbb_mapping["Cart"], $ddbb_types["Cart"]);
	        
			$GLOBALS['items'] = &$this->items; // pass by reference
			
			$funcCode = 
                '$item = new Item($data["PRO_CO_CODIGO"], $data["PEL_NU_CANTIDAD"]);'.
            	'$item->prize = $data["PEL_IM_PRECIO"];'.
            	'array_push($GLOBALS["items"], $item);';
        	
        	$f = create_function('$data', $funcCode);
        	
        	$sql = "SELECT * FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS WHERE ".$ddbb_mapping["Cart"]['orderId']."=".encodeSQLValue($this->orderId, "STRING")." ORDER BY PEL_NU_LINEA";
        	
        	NP_executeSelect($sql, $f);
        	      	
        	$sql = "SELECT SUM(PEC_IM_IMPORTE) AS COSTS FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES WHERE ".$ddbb_mapping["Cart"]['orderId']."=".encodeSQLValue($this->orderId, "STRING");
        	
        	$data = NP_executePKSelect($sql);
        	
            if (isset($data["COSTS"]) && trim($data["COSTS"]) != "")
        	    $this->totalShippingCost = $data["COSTS"];
        	else if (count($this->items) > 0)
        	    $this->totalShippingCost = "0";
      
		}
	}
	
	function _dbStore_ShippingCost($shippingAgentCode) {
		global $npshop;
		$normalWeight = 0;

		$lineNumber = 1;

		foreach ($this->items as $itemId => $item) {
			if ($item->specialShipping) { 
				$item->storeSpecialShippingCost($this->orderId, $lineNumber++);
			} else {
				$normalWeight += $item->weight * $item->quantity;
			}
		}	 
		
		$shippingCost = 0.0;
		
		if ($normalWeight > 0) {
    		$shippingCost = $this->__obtainShippingCost($normalWeight, $shippingAgentCode);
    		
    		$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES ".
    			"VALUES (".
    			encodeSQLValue($this->orderId, "INT").", ".
    			encodeSQLValue($lineNumber, "INT").", ".
    			"NULL".", ".
    			"NULL".", ".
    			"NULL".", ".
    			encodeSQLValue($shippingCost, "FLOAT").
    			")";
    		NP_executeInsertUpdate($sql);
	    }
				
		return $shippingCost;
	}
	
	function createOrder() {
	    
	    if (count($this->items) == 0)
    	    return false;
    	    
		$this->orderId = $this->_dbStore();
		
		$i = 1;
		foreach ($this->items as $item) {
			$item->storeIntoOrder($this->orderId, $i++);
		}
		
		$this->_dbStore_ShippingCost(1);
		
		return $this->orderId != null;
	}
	
	function deleteOrder() {
	    global $npshop, $ddbb_table, $ddbb_mapping, $ddbb_types;
	    
	    foreach ($this->items as $item) {
			$item->deleteFromOrder($this->orderId);
		}		
		$sqlShippingCost = "DELETE FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES WHERE PED_CO_CODIGO=".encodeSQLValue($this->orderId,$ddbb_types["Cart"]["orderId"]);
		NP_executeDelete($sqlShippingCost);
		$sqlOrder = "DELETE FROM ".$ddbb_table["Cart"]." WHERE ".$ddbb_mapping["Cart"]["orderId"]."=".encodeSQLValue($this->orderId,$ddbb_types["Cart"]["orderId"]);
		NP_executeDelete($sqlOrder);
		
	}
	
	function _buildMail() {
	    global $npshop;
	    
	    $text = implode('', file(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/email_header.php"));	    
	    
	    $text .= "Hola ".$this->user->billingData['name'].",<br><br>";
	    $text .= "Estos son los productos asociados al pedido ".formatOrderId($this).":<br/>";

	    $text .= "<ul>";
	    foreach ($this->items as $item) {
    	    $text .= "<li><b>".$item->name."</b> (Ref. ".$item->id."): Cantidad [".$item->quantity."], Precio por unidad [".$item->prize." &euro;]</li>";
    	}
    	$text .= "</ul>";
    	
    	$text .= "<blockquote>";
    	$text .= "Subtotal: ".$this->getSubTotal()." &euro;<br/>";
    	$text .= "Gastos de envío: ".$this->getShippingCost(1)." &euro;<br/>";
    	$text .= "<br/><b>TOTAL: ".$this->getTotal(1)." &euro;</b><br/>";
    	$text .= "</blockquote>";
    	
    	$text .= "<br/>";
    	
    	$text .= "<p>Datos personales:</p>";
    	$text .= "<center><table border='0' width='70%'>";
    	$text .= "    <tr>";
    	$text .= "        <td width='50%' valign='top'>";
    	$text .= "        <b>Datos de facturación</b><br/>";
        //$text .= "        <ul>";
    	$text .= "            <br/>".$this->user->billingData['name']." ".$this->user->billingData['surname'];
    	$text .= "            <br/>";
    	$text .= "            <br/>".$this->user->billingData['address']." ".$this->user->billingData['address2'];
    	$text .= "            <br/>".$this->user->billingData['postalCode']." ".$this->user->billingData['city'];
    	$text .= "            <br/>".getProvinceName($this->user->billingData['province']);
    	$text .= "            <br/>".getCountryName($this->user->billingData['country']);
    	//$text .= "            <br/>";
    	//$text .= "            <li>Teléfono: ".$this->user->billingData['phone']." </li>";
    	//$text .= "        </ul>";
    	$text .= "        </td>";
    	$text .= "        <td width='50%' valign='top'>";
    	$text .= "        <b>Datos de envío</b><br/>";
    	//$text .= "        <ul>";
    	$text .= "            <br/>".$this->user->shippingData['name']." ".$this->user->shippingData['surname'];
    	$text .= "            <br/>";
    	$text .= "            <br/>".$this->user->shippingData['address']." ".$this->user->shippingData['address2'];
    	$text .= "            <br/>".$this->user->shippingData['postalCode']." ".$this->user->shippingData['city'];
    	$text .= "            <br/>".getProvinceName($this->user->shippingData['province']);
    	$text .= "            <br/>".getCountryName($this->user->shippingData['country']);
    	//$text .= "            <br/>";
    	//$text .= "            <li>Teléfono: ".$this->user->shippingData['phone']." </li>";    	            
    	//$text .= "        </ul>";
    	$text .= "        </td>";
    	$text .= "   </tr>";
    	$text .= "</table></center><br/>";
    	
    	if ($this->orderStatus == $npshop['constants']['ORDER_STATUS']['PAYMENT_OK'])
    	    $text .= "El pedido <b>queda confirmado</b>.<br/>";
    	else if ($this->orderStatus == $npshop['constants']['ORDER_STATUS']['PAYMENT_ERROR'])
    	    $text .= "El pedido <b>no ha podido ser confirmado</b>.<br/>";
    	else 
    	    $text .= "El pedido queda con estado <b>".$this->orderStatus."</b>.<br/>";
    	
	    $text .= "<br/>";
	    $text .= "Un saludo";
	    
	    $text .= implode('', file(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/email_footer.php"));	    

	    return $text;
	}
	
	function changeStatus($status, $tpvData = null, $sendMail = true) {
	    global $ddbb_table, $ddbb_mapping, $ddbb_types, $npshop;
	    
	    // status changes history
	    if ($this->orderStatus != $status) {

    	    $this->orderStatus = $status;

    	    if ($this->statusHistory == null || trim($this->statusHistory == ""))
    	        $this->statusHistory = "";
    	    else
    	        $this->statusHistory .= " @ ";
    	    $this->statusHistory .= "[".date("d/m/Y H:i:s")." : ".$this->orderStatus."]";
	    }
	    
	    if ($tpvData != null && trim($tpvData) != "") {
	        $tpvData = "[".trim($tpvData)."]";
	        if (isset($this->tpvData) && $this->tpvData != null) {
	            $tpvData = $this->tpvData." @ ".$tpvData;
	        }
	    }
	      
	    $sql = "UPDATE ".$ddbb_table["Cart"].
			" SET ".$ddbb_mapping['Cart']['orderStatus']."=".encodeSQLValue($status, $ddbb_types['Cart']['orderStatus']).", ".
			$ddbb_mapping['Cart']['statusHistory']."=".encodeSQLValue($this->statusHistory, $ddbb_types['Cart']['statusHistory']).", ".
			$ddbb_mapping['Cart']['date']."=".encodeSQLValue($this->date, $ddbb_types['Cart']['date']);
		if ($tpvData != null) {
		    $this->tpvData = $tpvData;
		    update_cart($this);
		    $sql.= ", ".$ddbb_mapping['Cart']['tpvData']."=".encodeSQLValue($tpvData, $ddbb_types['Cart']['tpvData']); 
		}
		$sql.= " WHERE ".$ddbb_mapping['Cart']['orderId']."=".encodeSQLValue($this->orderId, $ddbb_types['Cart']['orderId']); 

	    NP_executeInsertUpdate($sql);
	       
	    
	    if ($status == $npshop['constants']['ORDER_STATUS']['PAYMENT_OK']) {
    	    foreach ($this->items as $item) {
    			$item->addToStock(-1 * $item->quantity);
    		}	
	    }
	    
	    update_cart($this);
	    
	    if ($sendMail) {
    	    $user = new User();
    	    $user->_dbLoad($this->user->id);
    	    
    	    $statusKey = _obtainKeyForValue($npshop['constants']['ORDER_STATUS'], $status);
                    
    	    if ($statusKey == "PAYMENT_OK") {
    	        $mailContent = $this->_buildMail();
    	        sendHTMLMail($npshop['constants']['EMAIL_FROM'], $user->email, $npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
    	        // debug mails
    	        sendHTMLMail($npshop['constants']['EMAIL_FROM'], "dpecos@gmail.com", "DEBUG (DavidBenavente): ".$npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
    	        sendHTMLMail($npshop['constants']['EMAIL_FROM'], "maisa@cyt.com", "DEBUG (DavidBenavente): ".$npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
    	        if ($statusKey == "PAYMENT_OK")
    	            sendHTMLMail($npshop['constants']['EMAIL_FROM'], $npshop['constants']['EMAIL_NOTIFICATION'], $npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
    	    }
	    }
	}
}

?>
