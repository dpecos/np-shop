<?php
$npsql_dbconfig = null;

function encodeSQLValue($strVal, $sqlType) {
	if (isset($strVal) && $strVal != null) {
		if ($sqlType == "STRING") 
			return "'".$strVal."'";
		else if ($sqlType == "BOOL") {
			if (isset($strVal) && $strVal != "") {
			    if (strtolower($strVal) == "true")
			        return 1;
			    else if (strtolower($strVal) == "false")
				    return 0;
			} else
				return 0;
		} else {
			if (isset($strVal) && $strVal != "")
				return $strVal;
			else 
				return 0;
		}
	} else {
		return "NULL";
	}
}

function decodeSQLValue($strVal, $sqlType) {
	if (isset($strVal) && $strVal != null) {
		if ($sqlType == "STRING") 
			return $strVal;
		else if ($sqlType == "BOOL") 
			if (isset($strVal) && $strVal != "")
				return ($strVal == "1");
			else
				return false;
		else if ($sqlType == "INT")
			if (isset($strVal) && $strVal != "")
				return intval($strVal);
			else 
				return 0;
	    else if ($sqlType == "FLOAT")
	    	if (isset($strVal) && $strVal != "")
				return number_format((float)$strVal, 2, '.', '');
			else 
				return 0;
	    else if ($sqlType == "DATE")
	        if (isset($strVal) && $strVal != "") {
	            $year = substr($strVal,0,4);
                $mon  = substr($strVal,4,2);
                $day  = substr($strVal,6,2);
                $hour = substr($strVal,8,2);
                $min  = substr($strVal,10,2);
                $sec  = substr($strVal,12,2);
                //return date("l F dS, Y h:i A",mktime($hour,$min,$sec,$mon,$day,$year));	            
                return mktime($hour,$min,$sec,$mon,$day,$year);	            
	        } else
	            return null;
	    else 
	        return $strVal;
	} else {
		return null;
	}
}

function __NP_initDDBB($dbconfig) {
	global $npsql_dbconfig;
	
	if ($npsql_dbconfig == null)
		$npsql_dbconfig = $dbconfig;
}

function __NP_connectSQL () {
	global $npsql_dbconfig;

	$db_con = mysql_connect ($npsql_dbconfig ["HOST"], $npsql_dbconfig ["USER"], $npsql_dbconfig ["PASSWD"])
		or die ("No se pudo conectar con la BBDD: ".mysql_error());
	mysql_select_db ($npsql_dbconfig ["NAME"])
		or die ("No se encontró la BBDD en el servidor.");
	return $db_con;
}

function __NP_disconnectSQL ($db_con) {
	//mysql_close($db_con);
}

function NP_executePKSelect($sql) {
	$con = __NP_connectSQL();

	$resultado = mysql_query($sql);

	if (!$resultado) {
		echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) en la BD: " . mysql_error();
		exit;
	}

	$datos = mysql_fetch_assoc ($resultado);

	mysql_free_result($resultado);
		
	__NP_disconnectSQL($con);
	return $datos;
}

function NP_executeSelect($sql, $f) {
	$con = __NP_connectSQL();

	$resultado = mysql_query($sql);

	if (!$resultado) {
		echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) en la BD: " . mysql_error();
		exit;
	}

	while ($datos = mysql_fetch_assoc ($resultado)) {
		$f ($datos);
	}

	mysql_free_result($resultado);
		
	__NP_disconnectSQL($con);
}

function NP_executeInsertUpdate($sql) {
	$con = __NP_connectSQL();
		
	$resultado = mysql_query($sql);
	
	if (!$resultado) {
		echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) en la BD: " . mysql_error();
		exit;
	}
	
	$id = mysql_insert_id();
	
	__NP_disconnectSQL($con);
	
	return $id;
}

function NP_executeDelete($sql) {
	$con = __NP_connectSQL();
		
	$resultado = mysql_query($sql);
	
	__NP_disconnectSQL($con);
}
?>