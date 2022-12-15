<?php 
    include ("itemToDatabase.php")
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>CHEFF TABLE</h1>
    <table >
        <tr>
            <th>ITEM ID</th>
            <th>ITEM NAME</th>
        </tr>
        <?php
            $res = SHOWALLITEM();
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
    
    <form action="" method="POST">
        <h1>Item name</h1>
        <input type="text" name='itemName'>
        <input type="submit" value="Add" name='addItem'>
    </form>
    <form action="" method="POST">
        <h1>Item name</h1>
        <input type="text" name='deletItemName'>
        <input type="submit" value="delete" name='deleteItem'>
    </form>
 </body>
</html>