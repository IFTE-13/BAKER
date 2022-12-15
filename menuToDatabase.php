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

function SHOWALLMENU(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT DISHNO, DISH, QUANTITY, PRICE, ITEMID from MENU") ;
    $res = oci_execute($sql);
    return $sql;
}

function SHOWALLMENUUSER(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT DISHNO, DISH, QUANTITY, PRICE from MENU") ;
    $res = oci_execute($sql);
    return $sql;
}

if(isset($_POST['addmenu'])){
	$NAME = $_REQUEST['dishName'];
	$itemID = $_REQUEST['itemID'];
	$quantity = $_REQUEST['quantity'];
	$price = $_REQUEST['price'];
	$connection = connection();
	$query = oci_parse($connection, "INSERT INTO MENU VALUES (MENU_SEQ.NEXTVAL, '$NAME', $quantity, $price, $itemID)");
	$result = oci_execute($query);
}

if(isset($_POST['deletemenu'])){
	$NAME = $_REQUEST['deletmenuName'];
	$connection = connection();
	$query = oci_parse($connection, "DELETE FROM MENU WHERE DISH = '$NAME'");
	$result = oci_execute($query);
}
?>