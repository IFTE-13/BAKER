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

function SHOWALLEMPLOYEE(){
    $connection = connection();
    $sql = oci_parse($connection,"select EMPID, EMPNAME, ADDRESS, PHONE, JOININGDATE, DOB, SALARY, JOB, OUTLETID, ITEMID, ROLE from EMPLOYEE") ;
    $res = oci_execute($sql);
    return $sql;
}

function SHOWALLEMPLOYEELOG(){
    $connection = connection();
    $sql = oci_parse($connection,"select OPT_NO, USER_NAME, OPT_NAME, OPT_DATE from EMPLOYEE_LOG") ;
    $res = oci_execute($sql);
    return $sql;
}

if(isset($_POST['addemployee'])){
	$NAME = $_REQUEST['employeename'];
	$ADDRESS = $_REQUEST['employeeaddress'];
	$PHONE = $_REQUEST['employeePhone'];
	$PASSWORD = $_REQUEST['employeePassword'];
	$JOININGDATE = $_REQUEST['employeeJOININGDATE'];
	$DOB = $_REQUEST['employeeDOB'];
	$JOB = $_REQUEST['employeeJOB'];
	$SALARY = $_REQUEST['employeeSALARY'];
	$OUTLETID = $_REQUEST['employeeOUTLETID'];
	$ITEMID = $_REQUEST['employeeITEMID'];
	$ROLE = $_REQUEST['employeeROLE'];
	$connection = connection();
	$query = oci_parse($connection, "INSERT INTO EMPLOYEE VALUES (EMPLOYEE_SEQ.NEXTVAL, '$NAME', '$ADDRESS', $PHONE, TO_DATE('$JOININGDATE', 'YYYY-MM-DD'), TO_DATE('$DOB', 'YYYY-MM-DD'), $SALARY, '$PASSWORD' , '$JOB', $OUTLETID, $ITEMID, '$ROLE')");
	$result = oci_execute($query);
}

if(isset($_POST['removeemployee'])){
	$NAME = $_REQUEST['deleteemployeeName'];
	$connection = connection();
	$query = oci_parse($connection, "DELETE FROM EMPLOYEE WHERE EMPNAME = '$NAME'");
	$result = oci_execute($query);
}
?>