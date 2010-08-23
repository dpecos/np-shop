<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/config/cart.sql.php");

class Cart {
	var $items;
	var $user;

	function Cart($orderId = null) {
		global $ddbb;
		$this->items = array();
		$this->user = null;

		foreach (array_keys($ddbb->getMapping("Cart", null)) as $var) {
			if (!isset($this->$var)) {
				if (!is_array($ddbb->getMapping("Cart",$var))) {
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

	function countItems() {
		$count = 0;
		foreach ($this->items as $itemId => $item) {
			$count += $item->quantity;
		}
		return $count;
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

	function getShippingCost() {
		global $npshop, $ddbb;


		if (!is_null($this->user) && !is_null($this->user->shippingData['country'])) {

			$normalWeight = 0;
			$shippingCost = 0;
			 
			foreach ($this->items as $itemId => $item) {
				if ($item->specialShipping) {
					$shippingCost += $item->specialShippingCost * $item->quantity;
				} else {
					$normalWeight += $item->weight * $item->quantity;
				}
			}

			
			
			if (count($this->items) > 0 && $shippingCost === 0 && $normalWeight === 0) {
				$normalWeight += $npshop['constants']['EXTRA_WEIGHT_SHIPPING_COST'];
			}

			if ($normalWeight > 0) {
				 
				$country = $this->user->shippingData['country'];

				if ($country != 73) {
					$sql = "SELECT c.* FROM NPS_PAISES p, NPS_COSTES_ZONA c WHERE p.costes_zona=c.zona AND p.id=".$country;
					$data = $ddbb->executePKSelectQuery($sql);

					$precio_fijo = round($data["precio_fijo"] + 0.49);
					$precio_kilo = round($data["precio_kilo"] + 0.49);

					$shippingCost += $precio_fijo;
					$shippingCost += round($normalWeight/1000 + 0.49) * $precio_kilo;
				} else {
					$sql = "SELECT * FROM NPS_COSTES_ESP WHERE $normalWeight >= COS_NU_PESOMIN AND $normalWeight < COS_NU_PESOMAX";
					$data = $ddbb->executePKSelectQuery($sql);
					if ($data != null) {
						$shippingCost += $data['COS_IM_IMPORTE'];
					} else {
						// no habrá envios de +20 kg
					}
				}
			}
			return $shippingCost;
		} else {
			return 0;
		}
	  
	}

	/*function getShippingCost($shippingAgentCode) {
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

	 function __obtainShippingCost($weight, $shippingAgentCode) {
	 global $ddbb;
	 if ($weight > 0) {
	 $sql = "SELECT COS_IM_IMPORTE FROM NPS_COSTES WHERE COS_NU_PESOMIN < ".$weight." AND COS_NU_PESOMAX >= ".$weight." AND AGE_CO_CODIGO = ".$shippingAgentCode." AND PAI_CO_CODIGO = 56";

	 $data = $ddbb->executePKSelectQuery($sql);

	 if ($data)
	 return NP_DDBB::decodeSQLValue($data["COS_IM_IMPORTE"], "FLOAT");
	 else
	 die("No se encontro el coste para un peso: ".$weight." y el codigo de agente: ".$shippingAgentCode);
		} else
		return 0;
		}*/

	function updateOrderShippingDays() {
		$days = 0;
		foreach ($this->items as $itemId => $item) {
			if ($item->shippingDays > $days)
			$days = $item->shippingDays;
		}
		$this->shippingDays = $days;
	}

	function _dbStore() {
		global $ddbb;
		 
		return $ddbb->insertObject($this);
	}

	function _dbLoad() {
		global $ddbb, $npshop;

		//$sql = NP_createSELECT($this, $ddbb_table["Cart"], $ddbb_mapping["Cart"], $ddbb_types["Cart"], $ddbb_mapping["Cart"]['orderId']."=".$this->orderId);
		$sql = $ddbb->buildSELECT($this, $ddbb->getMapping("Cart",'orderId')."=".$this->orderId);

		$data = $ddbb->executePKSelectQuery($sql);

		if (is_array($data)) {
			 
			$ddbb->loadData($this, $data);
			 
			$GLOBALS['items'] = &$this->items; // pass by reference
				
			$funcCode =
                '$item = new Item($data["PRO_CO_CODIGO"], $data["PEL_NU_CANTIDAD"]);'.
            	'$item->prize = $data["PEL_IM_PRECIO"];'.
            	'array_push($GLOBALS["items"], $item);';
			 
			$f = create_function('$data', $funcCode);
			 
			$sql = "SELECT * FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS WHERE ".$ddbb->getMapping("Cart",'orderId')."=".$ddbb->encodeSQLValue($this->orderId, "STRING")." ORDER BY PEL_NU_LINEA";
			 
			$ddbb->executeSelectQuery($sql, $f);

			$sql = "SELECT SUM(PEC_IM_IMPORTE) AS COSTS FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES WHERE ".$ddbb->getMapping("Cart",'orderId')."=".$ddbb->encodeSQLValue($this->orderId, "STRING");
			 
			$data = $ddbb->executePKSelectQuery($sql);
			 
			if (isset($data["COSTS"]) && trim($data["COSTS"]) != "")
			$this->totalShippingCost = $data["COSTS"];
			else if (count($this->items) > 0)
			$this->totalShippingCost = "0";
		}
	}

	function _dbStore_ShippingCost($shippingAgentCode) {
		global $npshop, $ddbb;
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
			$shippingCost = $this->getShippingCost($normalWeight, $shippingAgentCode);

			$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES ".
    			"VALUES (".
			NP_DDBB::encodeSQLValue($this->orderId, "INT").", ".
			NP_DDBB::encodeSQLValue($lineNumber, "INT").", ".
    			"NULL".", ".
    			"NULL".", ".
    			"NULL".", ".
			NP_DDBB::encodeSQLValue($shippingCost, "FLOAT").
    			")";
			$ddbb->executeInsertUpdateQuery($sql);
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
		global $npshop, $ddbb;
	  
		foreach ($this->items as $item) {
			$item->deleteFromOrder($this->orderId);
		}
		$sqlShippingCost = "DELETE FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES WHERE PED_CO_CODIGO=".NP_DDBB::encodeSQLValue($this->orderId,$ddbb->getType("Cart","orderId"));
		$ddbb->executeDeleteQuery($sqlShippingCost);
		$sqlOrder = "DELETE FROM ".$ddbb->getTable("Cart")." WHERE ".$ddbb->getMapping("Cart","orderId")."=".NP_DDBB::encodeSQLValue($this->orderId,$ddbb->getType("Cart","orderId"));
		$ddbb->executeDeleteQuery($sqlOrder);

	}

	function _buildMail() {
		global $npshop;
	  
		$text = implode('', file(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/email_header.php"));
	  
		$text .= sprintf(_("Hola %s"), $this->user->billingData['name']).",<br/><br/>";
		$text .= sprintf(_("Estos son los productos asociados al pedido %s:"), formatOrderId($this))."<br/>";

		$text .= "<ul>";
		foreach ($this->items as $item) {
			$text .= "<li><b>".NP_get_i18n($item->name)."</b> ("._("Ref.")." ".$item->id."): "._("Cantidad")." [".$item->quantity."], "._("Precio por unidad")." [".$item->prize." &euro;]</li>";
		}
		$text .= "</ul>";
		 
		$text .= "<blockquote>";
		$text .= _("Subtotal").": ".$this->getSubTotal()." &euro;<br/>";
		$text .= _("Gastos de envío").": ".$this->getShippingCost(1)." &euro;<br/>";
		$text .= "<br/><b>"._("TOTAL").": ".$this->getTotal(1)." &euro;</b><br/>";
		$text .= "</blockquote>";
		 
		$text .= "<br/>";
		 
		$text .= "<p>"._("Datos personales").":</p>";
		$text .= "<center><table border='0' width='70%'>";
		$text .= "    <tr>";
		$text .= "        <td width='50%' valign='top'>";
		$text .= "        <b>"._("Datos de facturación")."</b><br/>";
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
		$text .= _("El pedido <b>queda confirmado</b>.")."<br/>";
		else if ($this->orderStatus == $npshop['constants']['ORDER_STATUS']['PAYMENT_TRANSFER'])
		$text .= _("El pedido <b>queda confirmado</b> y pendiente de que realices una transferencia por la cantidad total del pedido a este número de cuenta: 2038-1576-52-6000042530 (Caja Madrid), Titular: David Benavente.")."<br/>";
		else if ($this->orderStatus == $npshop['constants']['ORDER_STATUS']['PENDING_SENT_ONDELIVERY'])
		$text .= _("El pedido <b>queda confirmado</b> y será enviado contrareembolso a la dirección que has indicado.")."<br/>";
		else if ($this->orderStatus == $npshop['constants']['ORDER_STATUS']['PAYMENT_ERROR'])
		$text .= _("El pedido <b>no ha podido ser confirmado</b>.")."<br/>";
		else
		$text .= sprintf(_("El pedido queda con estado <b>%s</b>."), $this->orderStatus)."<br/>";
		 
		$text .= "<br/>";
		$text .= _("Un saludo");
	  
		$text .= implode('', file(APP_ROOT.$npshop['skin']['path'].$npshop['skin']['name']."/npshop/email_footer.php"));

		return $text;
	}

	function changeStatus($status, $tpvData = null, $sendMail = true) {
		global $ddbb, $npshop;
	  
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
			$this->tpvData = $tpvData;
		}
		 
		/*$sql = "UPDATE ".$ddbb->getTable("Cart").
			" SET ".$ddbb->getMapping('Cart','orderStatus')."=".NP_DDBB::encodeSQLValue($status, $ddbb->getType('Cart','orderStatus')).", ".
			$ddbb->getMapping('Cart','statusHistory')."=".NP_DDBB::encodeSQLValue($this->statusHistory, $ddbb->getType('Cart','statusHistory')).", ".
			$ddbb->getMapping('Cart','date')."=".NP_DDBB::encodeSQLValue($this->date, $ddbb->getType('Cart','date'));
			if ($tpvData != null) {
			$this->tpvData = $tpvData;
			update_cart($this);
			$sql.= ", ".$ddbb->getMapping('Cart','tpvData')."=".NP_DDBB::encodeSQLValue($tpvData, $ddbb->getType('Cart','tpvData'));
			}
			$sql.= " WHERE ".$ddbb->getMapping('Cart','orderId')."=".NP_DDBB::encodeSQLValue($this->orderId, $ddbb->getType('Cart','orderId'));

			$ddbb->executeInsertUpdateQuery($sql);*/
	  
		$ddbb->updateObject($this);

	  
		if ($status == $npshop['constants']['ORDER_STATUS']['PAYMENT_OK'] ||
		$status == $npshop["constants"]["ORDER_STATUS"]["PAYMENT_TRANSFER"] ||
		$status == $npshop["constants"]["ORDER_STATUS"]["PENDING_SENT_ONDELIVERY"]) {
			foreach ($this->items as $item) {
				$item->addToStock(-1 * $item->quantity);
			}
		}
	  
		update_cart($this);
	  
		if ($sendMail) {
			$user = new User();
			$user->_dbLoad($this->user->id);
				
			$statusKey = array_search($status, $npshop['constants']['ORDER_STATUS']);
			 
			$mailContent = $this->_buildMail();
			if ($statusKey == "PAYMENT_OK" || $statusKey == "PAYMENT_TRANSFER" || $statusKey == "PENDING_SENT_ONDELIVERY") {
				sendHTMLMail($npshop['constants']['EMAIL_FROM'], $user->email, $npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
				sendHTMLMail($npshop['constants']['EMAIL_FROM'], $npshop['constants']['EMAIL_NOTIFICATION'], $npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
			}
			sendHTMLMail($npshop['constants']['EMAIL_FROM'], $npshop['constants']['EMAIL_DEBUG'], "DEBUG (DavidBenavente): ".$npshop['constants']['EMAIL_SUBJECT'].$this->orderId, $mailContent);
		}
	}
}

?>
