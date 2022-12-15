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

function SHOWALLCUSTOMER(){
    $connection = connection();
    $sql = oci_parse($connection,"select CUSTOMERID, CUSTOMERNAME, ADDRESS, PHONE from CUSTOMER") ;
    $res = oci_execute($sql);
    return $sql;
}

if(isset($_POST['addcustomer'])){
	$NAME = $_REQUEST['customername'];
	$ADDRESS = $_REQUEST['customeraddress'];
	$PHONE = $_REQUEST['customerPhone'];
	$PASSWORD = $_REQUEST['customerPassword'];
	$connection = connection();
	$query = oci_parse($connection, "INSERT INTO CUSTOMER VALUES (CUSTOMER_SEQ.NEXTVAL, '$NAME', '$ADDRESS', $PHONE, '$PASSWORD')");
	$result = oci_execute($query);
}

if(isset($_POST['deletecustomer'])){
	$NAME = $_REQUEST['deletecustomerName'];
	$connection = connection();
	$query = oci_parse($connection, "DELETE FROM CUSTOMER WHERE CUSTOMERNAME = '$NAME'");
	$result = oci_execute($query);
}
?>