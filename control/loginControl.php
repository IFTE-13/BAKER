<?php
        $loginError = "";
        $conn = oci_connect("system", "ifte", "//localhost/xe");
        if(isset($_POST['submit'])){
            $userID = $_POST['userID'];
            $userPassword = $_POST['userPassword'];
            
            $s = oci_parse($conn, "select EMPID,PASSWORD from EMPLOYEE where EMPID='$userID' and PASSWORD='$userPassword'");       
            oci_execute($s);
            $row = oci_fetch_all($s, $res);
            if($row){
                    header("location: http://localhost/FinalProjectADMS/view/admin/profile.php");
            }else{
                $loginError = "wrong password or username";
            }
        }
?>