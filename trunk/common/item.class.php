<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/config/item.sql.php");

class Item {    

    var $quantity; // not in DDBB
    
    function Item($id = null, $quantity=1) {
        global $ddbb;
        
        //$classVars = get_class_vars("Item");
        foreach (array_keys($ddbb->getMapping("Item", null)) as $var) {
        	if (!isset($this->$var))
        		$this->$var = null;
        }
        
        $this->id = $id;
        $this->quantity = $quantity;
        
        if ($this->id != null) {
            $this->_dbLoad();
        }
    }
  
    function _dbStore() { //TODO: no está completado
        global $ddbb;
        $ddbb->insertObject($this);
	}
	
	function _dbUpdate() { 
  	    global $ddbb;
		$varNames = "";
		$first = true;	
		foreach (get_object_vars($this) as $var => $value) {
			if (array_key_exists($var, $ddbb->getMapping("Item", null))) {
				if ($var != "id") {
					if (!$first) {
						$varNames .= ", ";
					} else
						$first = false;
					$varNames .= $ddbb->getMapping("Item", $var)."=".NP_DDBB::encodeSQLValue($value, $ddbb->getType("Item", $var));
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql = "UPDATE ".$ddbb->getTable("Item")." SET ".$varNames. " WHERE ".$ddbb->getMapping("Item", "id")."=".NP_DDBB::encodeSQLValue($this->id, "STRING");	
		$ddbb->executeInsertUpdateQuery($sql);
	}
	
	function _dbLoad() {
	    global $ddbb;
	    
	    $sql = $ddbb->buildSELECT($this, $ddbb->getMapping("Item",'id')."='".$this->id."'");
	
		$data = $ddbb->executePKSelectQuery($sql);

		if (is_array($data)) {	  
	       $ddbb->loadData($this, $data);
	    } else {
	       $this->id = null;
	    }
	}
	
	function _dbDelete() {
	    global $ddbb;
		$sql = "DELETE FROM ".$ddbb->getTable("Item")." WHERE ".$ddbb->getMapping("Item", 'id')."=".NP_DDBB::encodeSQLValue($this->id, "STRING")." LIMIT 1";
		return $ddbb->executeDeleteQuery($sql);
	}
	
	function storeIntoOrder($orderId, $lineNumber) {
		global $npshop,$ddbb;
		$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS ".
			" VALUES (".
			NP_DDBB::encodeSQLValue($orderId, "INT").", ".
			NP_DDBB::encodeSQLValue($lineNumber, "INT").", ".
			NP_DDBB::encodeSQLValue($this->id, "STRING").", ".
			NP_DDBB::encodeSQLValue($this->quantity, "INT").", ".
			NP_DDBB::encodeSQLValue($this->prize, "FLOAT").", ".
			NP_DDBB::encodeSQLValue($this->quantity * $this->prize, "FLOAT").
			")";
		$ddbb->executeInsertUpdateQuery($sql);
		
		//$sql = "UPDATE ".$ddbb->getTable("Item")." SET ".$ddbb->getMapping("Item", 'stock')."=".$ddbb->getMapping("Item", 'stock')."-1 WHERE ".$ddbb->getMapping("Item", 'id')."=".NP_DDBB::encodeSQLValue($this->id, "STRING");
		//NP_executeInsertUpdate($sql);
	}
	
	function deleteFromOrder($orderId) {
		global $npshop,$ddbb;
		
		$sql = "DELETE FROM ".$npshop["ddbb"]["PREFIX"]."PEDIDOSLINEAS ".
			" WHERE PED_CO_CODIGO=".NP_DDBB::encodeSQLValue($orderId, "INT");
		$ddbb->executeDeleteQuery($sql);

	}
	
	
	function modifyStock($quantity) {
	    global $ddbb;
	    $sql = "UPDATE ".$ddbb->getTable("Item")." SET ".$ddbb->getMapping("Item", 'stock')."=".$quantity." WHERE ".$ddbb->getMapping("Item", 'id')."=".NP_DDBB::encodeSQLValue($this->id, "STRING");
		
		$ddbb->executeInsertUpdateQuery($sql);
	}
	
	function addToStock($quantity) {
	    global $ddbb;
	    $sql = "UPDATE ".$ddbb->getTable("Item")." SET ".$ddbb->getMapping("Item", 'stock')."=".$ddbb->getMapping("Item", 'stock')."+".$quantity." WHERE ".$ddbb->getMapping("Item", 'id')."=".NP_DDBB::encodeSQLValue($this->id, "STRING");
		
		$ddbb->executeInsertUpdateQuery($sql);
	}
	
	function setRetired($isRetired) {
	    global $ddbb;
	    $this->retired = $isRetired;
	    
	    $sql = "UPDATE ".$ddbb->getTable("Item")." SET ".$ddbb->getMapping("Item", "retired")."=".NP_DDBB::encodeSQLValue($this->retired, $ddbb->getType("Item", "retired"))." WHERE ".$ddbb->getMapping("Item", "id")."=".NP_DDBB::encodeSQLValue($this->id, $ddbb->getType("Item", "id"));
		
		$ddbb->executeInsertUpdateQuery($sql);
	}
	
	function storeSpecialShippingCost($orderId, $lineNumber) {
		global $npshop;
		$sql = "INSERT INTO ".$npshop["ddbb"]["PREFIX"]."PEDIDOSCOSTES ".
			//"(PED_CO_CODIGO, PEL_NU_LINEA, PRO_CO_CODIGO, PEL_NU_CANTIDAD, PEL_IM_PRECIO, PEL_IM_IMPORTE)".
			" VALUES (".
			NP_DDBB::encodeSQLValue($orderId, "INT").", ".
			NP_DDBB::encodeSQLValue($lineNumber, "INT").", ".
			NP_DDBB::encodeSQLValue($this->id, "STRING").", ".
			NP_DDBB::encodeSQLValue($this->quantity, "INT").", ".
			NP_DDBB::encodeSQLValue($this->specialShippingCost, "FLOAT").", ".
			NP_DDBB::encodeSQLValue($this->quantity * $this->specialShippingCost, "FLOAT").
			")";
		$ddbb->executeInsertUpdateQuery($sql);
	}
	
	function getSubTotal() {
		$prize = $this->prize * $this->quantity;
		return $prize;
		//return number_format($prize, 2, '.', '');
	}
}

?>
