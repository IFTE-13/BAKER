<?php 
    include ("menuToDatabase.php")
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php 
    require_once 'navbar.php';
    ?>
    
<div class="overflow-x-auto">
  <table class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>DISH NO</th>
        <th>DISH</th>
        <th>QUANTITY</th>
        <th>PRICE</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php
            $res = SHOWALLMENUUSER();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                echo '<tr>';
                foreach ($row as $item) 
                {
                    echo '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                }
                echo '</tr>';
                }
        ?>
    </tbody>
  </table>
</div>
 </body>
</html>