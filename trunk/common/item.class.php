<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/lib/NPLib_Sql.php");
require_once(APP_ROOT."/config/item.sql.php");

class Item {    

    var $quantity; // not in DDBB
    
    function Item($id, $quantity=1) {
    	global $ddbb_mapping;
    	
    	//$classVars = get_class_vars("Item");
    	foreach (array_keys($ddbb_mapping["Item"]) as $var) {
    		if (!isset($this->$var))
				$this->$var = null;
		}
		
		$this->id = $id;
		$this->quantity = $quantity;
		
		if ($this->id != null)
		    $this->_dbLoad();
		//print_r(get_object_vars($this));
    }
    
    function _dbStore() {
    	global $ddbb_table, $ddbb_mapping, $ddbb_types;
		$varNames = "";
		$varValues = "";
		$first = true;	
		foreach (get_object_vars($this) as $var => $value) {
			if (array_key_exists($var, $ddbb_mapping["Item"])) {
				if (!$first) {
					$varNames .= ", ";
					$varValues .= ", ";
				} else
					$first = false;
				$varNames .= $ddbb_mapping["Item"][$var];
				$varValues .= scapeSQLValue($value, $ddbb_types["Item"][$var]);
			} else {
				//TODO: ERROR
			}
		}
		$sql = "INSERT INTO ".$ddbb_table." ($varNames) VALUES ($varValues)";	
		echo $sql;
	}
	
	function _dbLoad() {
    	global $ddbb_table, $ddbb_mapping, $ddbb_types;
		$objectVars = get_object_vars($this);
		
		$first = true;
		$sql = "SELECT ";
		foreach (array_keys($objectVars) as $var) {
			if (array_key_exists($var, $ddbb_mapping["Item"])) {
				if (!$first) 
					$sql .= ", ";
				else
					$first = false;
				$sql .= $ddbb_mapping["Item"][$var];
			} else {
				//TODO: ERROR
			}
		}
		$sql .= " FROM ".$ddbb_table["Item"]." WHERE ".$ddbb_mapping["Item"]['id']."=".encodeSQLValue($this->id, "STRING");
		
		$data = NP_executePKSelect($sql);
	
		if (is_array($data)) {
			foreach (array_keys($data) as $dbFieldName) {
				$objectFieldName = _obtainKeyForValue($ddbb_mapping["Item"], $dbFieldName);
				if ($objectFieldName && array_key_exists($objectFieldName, $objectVars)) {
					$this->$objectFieldName = decodeSQLValue($data[$dbFieldName], $ddbb_types["Item"][$objectFieldName]);	
				} else 
					die("El campo ".$objectFieldName."(".$dbFieldName.") no se ha definido en el objeto "."Item");
				
			}
		} else {
			die("Producto con identificador \"".$this->id."\" no encontrado");
		}
		//print_r($this);
	}
	
	function storeIntoOrder($orderId, $lineNumber) {
		global $npshop,$ddbb_table,$ddbb_mapping;
		$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS ".
			" VALUES (".
			encodeSQLValue($orderId, "INT").", ".
			encodeSQLValue($lineNumber, "INT").", ".
			encodeSQLValue($this->id, "STRING").", ".
			encodeSQLValue($this->quantity, "INT").", ".
			encodeSQLValue($this->prize, "FLOAT").", ".
			encodeSQLValue($this->quantity * $this->prize, "FLOAT").
			")";
		NP_executeInsertUpdate($sql);
		
		//$sql = "UPDATE ".$ddbb_table["Item"]." SET ".$ddbb_mapping["Item"]['stock']."=".$ddbb_mapping["Item"]['stock']."-1 WHERE ".$ddbb_mapping["Item"]['id']."=".encodeSQLValue($this->id, "STRING");
		//NP_executeInsertUpdate($sql);
	}
	
	function deleteFromOrder($orderId) {
		global $npshop,$ddbb_table,$ddbb_mapping;
		
		$sql = "DELETE FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS ".
			" WHERE PED_CO_CODIGO=".encodeSQLValue($orderId, "INT");
		NP_executeDelete($sql);

	}
	
	function retireFromStock() {
	    global $ddbb_table, $ddbb_mapping;
	    $sql = "UPDATE ".$ddbb_table["Item"]." SET ".$ddbb_mapping["Item"]['stock']."=".$ddbb_mapping["Item"]['stock']."-".$this->quantity." WHERE ".$ddbb_mapping["Item"]['id']."=".encodeSQLValue($this->id, "STRING");
	    
		NP_executeInsertUpdate($sql);
	}
	
	function storeSpecialShippingCost($orderId, $lineNumber) {
		global $npshop;
		$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES ".
			//"(PED_CO_CODIGO, PEL_NU_LINEA, PRO_CO_CODIGO, PEL_NU_CANTIDAD, PEL_IM_PRECIO, PEL_IM_IMPORTE)".
			" VALUES (".
			encodeSQLValue($orderId, "INT").", ".
			encodeSQLValue($lineNumber, "INT").", ".
			encodeSQLValue($this->id, "STRING").", ".
			encodeSQLValue($this->quantity, "INT").", ".
			encodeSQLValue($this->specialShippingCost, "FLOAT").", ".
			encodeSQLValue($this->quantity * $this->specialShippingCost, "FLOAT").
			")";
		NP_executeInsertUpdate($sql);
	}
	
	function getSubTotal() {
		$prize = $this->prize * $this->quantity;
		return $prize;
		//return number_format($prize, 2, '.', '');
	}
}

?>
