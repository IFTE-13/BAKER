<?php 
    include ("employeeToDatabase.php")
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>EMPLOYEE LOGS</h1>
    <table >
        <tr>
            <th>SERIAL</th>
            <th>USER</th>
            <th>OPERATION</th>
            <th>DATA</th>
        </tr>
        <?php
            $res = SHOWALLEMPLOYEELOG();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                echo '<tr>';
                foreach ($row as $item) 
                {
                    echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                }
                echo '</tr>';
                }
        ?>
    </table>
 </body>
</html>