<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/config/user.sql.php");

class User {
	var $email;
	var $password;
	
	var $shippingData;
	var $billingData;
	
	function User($email = null, $password = null) {
        $this->_initialize();
		
		if (isset($email) && isset($password) && $email != null && $password != null) {
			$this->email = $email;
			$this->password = $password;
			$this->_dbLoad();
		}
	}
	
	function _initialize() {
	 	global $ddbb;
		
    	//$classVars = get_class_vars("User");
    	foreach (array_keys($ddbb->getMapping("User",null)) as $var) {
    		if (!isset($this->$var)) {
				if (is_array($ddbb->getMapping("User",$var))) {					
					$this->$var = array();
					foreach (array_keys($ddbb->getMapping("User",$var)) as $subvar) {
						$this->$var = array_merge($this->$var, array($subvar => null));
					}
				} else {
					$this->$var = null;
				}
			}
		}
	}
	
	function update($userData) {
	    
	    $objectVars = get_object_vars($this);
	
		foreach (array_keys($objectVars) as $var) {
			if (is_array($var)) {	
				foreach (array_keys($var) as $subvar) {
				    if (isset($userData->$var[$subvar]) && $userData->$var[$subvar] != null)
                        $this->$var[$subvar] = $userData->$var[$subvar];
				}
			} else {
				if (isset($userData->$var) && $userData->$var != null)
                    $this->$var = $userData->$var;
			}
			
		}
	    
	    if (isset($this->id) && $this->id != null) 
		    $this->_dbUpdate();
		else
		    $this->_dbInsert();
	}
	
	function _dbLoad($id = null) {
    	global $ddbb;

        if ($id != null) {
		    $where = $ddbb->getMapping("User",'id')."=".$id;
		} else {
		    $where = $ddbb->getMapping("User",'email')."='".$this->email."' AND ".$ddbb->getMapping("User",'password')."='".$this->password."'";
		}
		
		$sql = $ddbb->buildSELECT($this, $where);
		
		$data = $ddbb->executePKSelectQuery($sql);
	
		if (is_array($data)) {
			 $ddbb->loadData($this, $data);
		} else {
			$this->email = null;
			$this->password = null;
		}
		//print_r($this);
	}
	
	function _dbInsert() {
		global $ddbb;
		$this->id = $ddbb->insertObject($this);
		
		/*$objectVars = get_object_vars($this);
		$first = true;
	
      $ddbb_mapping = $ddbb->getMapping("User", null);
      $ddbb_types = $ddbb->getType("User", null);

		$sql = "INSERT INTO ".$ddbb->getTable("User")."";
		$names = "";
		$values = "";
		foreach (array_keys($objectVars) as $var) {
			if (array_key_exists($var, $ddbb_mapping)) {				
				if (is_array($ddbb_mapping[$var])) {	
					foreach (array_keys($ddbb_mapping[$var]) as $subvar) {
						if (!$first) {
							$names .= ", ";
							$values .= ", ";
						} else
							$first = false;
						$names .= $ddbb_mapping[$var][$subvar];
						$values .= NP_DDBB::encodeSQLValue($objectVars[$var][$subvar], $ddbb_types[$var][$subvar]);
					}
				} else {
					if (!$first) {
						$names .= ", ";
						$values .= ", ";
					} else
						$first = false;
					$names .= $ddbb_mapping[$var];
					$values .= NP_DDBB::encodeSQLValue($objectVars[$var], $ddbb_types[$var]);
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql .= "(".$names.") VALUES (".$values.")";
		
		//echo $sql;
	
		$this->id = $ddbb->executeInsertUpdateQuery($sql);*/
	}
	
	function _dbUpdate() {
		global $ddbb;
		$objectVars = get_object_vars($this);
		$first = true;

      $ddbb_mapping = $ddbb->getMapping("User", null);
      $ddbb_types = $ddbb->getType("User", null);
	
		$sql = "UPDATE ".$ddbb->getTable("User")." SET ";
		foreach (array_keys($objectVars) as $var) {
			if (array_key_exists($var, $ddbb_mapping)) {				
				if (is_array($ddbb_mapping[$var])) {	
					foreach (array_keys($ddbb_mapping[$var]) as $subvar) {
						if (!$first) 
							$sql .= ", ";
						else
							$first = false;
					    //echo $var.$subvar.$ddbb_types["User"][$var][$subvar].$objectVars[$var][$subvar]."-->".encodeSQLValue($objectVars[$var][$subvar], $ddbb_types["User"][$var][$subvar])."<br>";
						$sql .= $ddbb_mapping[$var][$subvar]."=".NP_DDBB::encodeSQLValue($objectVars[$var][$subvar], $ddbb_types[$var][$subvar]);
					}
				} else {
					if ($var != "id") {
						if (!$first) 
							$sql .= ", ";
						else
							$first = false;
						$sql .= $ddbb_mapping[$var]."=".NP_DDBB::encodeSQLValue($objectVars[$var], $ddbb_types[$var]);
					}
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql .= " WHERE ".$ddbb_mapping["id"]."=".NP_DDBB::encodeSQLValue($objectVars["id"], $ddbb_types["id"]);
	
		$ddbb->executeInsertUpdateQuery($sql);
	}
}

?>
