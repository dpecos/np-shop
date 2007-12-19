<?php
require_once(APP_ROOT."/config/main.php");
require_once(APP_ROOT."/lib/NPLib_Sql.php");
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
	 	global $ddbb_mapping;
		
    	//$classVars = get_class_vars("User");
    	foreach (array_keys($ddbb_mapping["User"]) as $var) {
    		if (!isset($this->$var)) {
				if (is_array($ddbb_mapping["User"][$var])) {					
					$this->$var = array();
					foreach (array_keys($ddbb_mapping["User"][$var]) as $subvar) {
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
    	global $ddbb_table, $ddbb_mapping, $ddbb_types;

        if ($id != null) {
		    $where = $ddbb_mapping["User"]['id']."=".$id;
		} else {
		    $where = $ddbb_mapping["User"]['email']."='".$this->email."' AND ".$ddbb_mapping["User"]['password']."='".$this->password."'";
		}
		
		$sql = NP_createSELECT($this, $ddbb_table["User"], $ddbb_mapping["User"], $ddbb_types["User"], $where);
		
		$data = NP_executePKSelect($sql);
	
		if (is_array($data)) {
			 NP_loadData($this, $data, $ddbb_mapping["User"], $ddbb_types["User"]);
		} else {
			$this->email = null;
			$this->password = null;
		}
		//print_r($this);
	}
	
	function _dbInsert() {
		global $ddbb_table, $ddbb_mapping, $ddbb_types;
		$objectVars = get_object_vars($this);
		$first = true;
	
		$sql = "INSERT INTO ".$ddbb_table["User"]."";
		$names = "";
		$values = "";
		foreach (array_keys($objectVars) as $var) {
			if (array_key_exists($var, $ddbb_mapping["User"])) {				
				if (is_array($ddbb_mapping["User"][$var])) {	
					foreach (array_keys($ddbb_mapping["User"][$var]) as $subvar) {
						if (!$first) {
							$names .= ", ";
							$values .= ", ";
						} else
							$first = false;
						$names .= $ddbb_mapping["User"][$var][$subvar];
						$values .= encodeSQLValue($objectVars[$var][$subvar], $ddbb_types["User"][$var][$subvar]);
					}
				} else {
					if (!$first) {
						$names .= ", ";
						$values .= ", ";
					} else
						$first = false;
					$names .= $ddbb_mapping["User"][$var];
					$values .= encodeSQLValue($objectVars[$var], $ddbb_types["User"][$var]);
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql .= "(".$names.") VALUES (".$values.")";
		
		//echo $sql;
	
		$this->id = NP_executeInsertUpdate($sql);
	}
	
	function _dbUpdate() {
		global $ddbb_table, $ddbb_mapping, $ddbb_types;
		$objectVars = get_object_vars($this);
		$first = true;
	
		$sql = "UPDATE ".$ddbb_table["User"]." SET ";
		foreach (array_keys($objectVars) as $var) {
			if (array_key_exists($var, $ddbb_mapping["User"])) {				
				if (is_array($ddbb_mapping["User"][$var])) {	
					foreach (array_keys($ddbb_mapping["User"][$var]) as $subvar) {
						if (!$first) 
							$sql .= ", ";
						else
							$first = false;
					    //echo $var.$subvar.$ddbb_types["User"][$var][$subvar].$objectVars[$var][$subvar]."-->".encodeSQLValue($objectVars[$var][$subvar], $ddbb_types["User"][$var][$subvar])."<br>";
						$sql .= $ddbb_mapping["User"][$var][$subvar]."=".encodeSQLValue($objectVars[$var][$subvar], $ddbb_types["User"][$var][$subvar]);
					}
				} else {
					if ($var != "id") {
						if (!$first) 
							$sql .= ", ";
						else
							$first = false;
						$sql .= $ddbb_mapping["User"][$var]."=".encodeSQLValue($objectVars[$var], $ddbb_types["User"][$var]);
					}
				}
			} else {
				//TODO: ERROR
			}
		}
		$sql .= " WHERE ".$ddbb_mapping["User"]["id"]."=".encodeSQLValue($objectVars["id"], $ddbb_types["User"]["id"]);
	
		NP_executeInsertUpdate($sql);
	}
}

?>