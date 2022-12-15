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

function SHOWALLITEM(){
    $connection = connection();
    $sql = oci_parse($connection,"select ITEMID, ITEMNAME from ITEM") ;
    $res = oci_execute($sql);
    return $sql;
}

if(isset($_POST['addItem'])){
	$NAME = $_REQUEST['itemName'];
	$connection = connection();
	$query = oci_parse($connection, "INSERT INTO ITEM VALUES (ITEM_SEQ.NEXTVAL, '$NAME')");
	$result = oci_execute($query);
}

if(isset($_POST['deleteItem'])){
	$NAME = $_REQUEST['deletItemName'];
	$connection = connection();
	$query = oci_parse($connection, "DELETE FROM ITEM WHERE ITEMNAME = '$NAME'");
	$result = oci_execute($query);
}
?>