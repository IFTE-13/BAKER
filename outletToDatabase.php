<?php

function connection()
{
	$connectionObject = oci_connect("system","ifte","localhost/XE");
	if(!$connectionObject){

		$error = oci_error();
		trigger_error(htmlentities($error['message'], ENT_QUOTES),E_USER_ERROR);
	}
	
	return $connectionObject;
}

function SHOWALLOUTLET(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT OUTLETID, OUTLETNAME, LOC from OUTLET") ;
    $res = oci_execute($sql);
    return $sql;
}

if(isset($_POST['add'])){
	$NAME = $_REQUEST['name'];
	$ID = $_REQUEST['id'];
	$LOCATION = $_REQUEST['location'];
	$connection = connection();
	$query = oci_parse($connection, "INSERT INTO OUTLET VALUES ($ID, '$NAME', '$LOCATION')");
	$result = oci_execute($query);
}

if(isset($_POST['delete'])){
	$ID = $_REQUEST['ID'];
	$connection = connection();
	$query = oci_parse($connection, "DELETE FROM OUTLET WHERE OUTLETID = '$ID'");
	$result = oci_execute($query);
}
?>