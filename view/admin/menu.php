<?php 
    include ("../../menuToDatabase.php")
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php 
    require_once 'navbar.php';
    ?>

<section class="bg-white dark:bg-gray-900 mt-16">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <div class='flex justify-between'>
    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new dish</h2>
    <label for="my-modal" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
  <div class="modal-box">
    <form action="" method="POST">
    <h3 class="font-bold text-lg">Delete from menu</h3>
    <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item ID</label>
                  <input type="text" name="deletmenuName" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
    </div>
    <div class='flex justify-between'>
    <input type="submit" name="deletemenu" id="brand" class="mt-8 btn" placeholder="Product brand" required="">
    <div class="modal-action">
      <label for="my-modal" class="btn mt-2">Close</label>
    </div>
    </div>
  </form>
  </div>
</div>
    </div>
      <form action="#" method="POST">
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                  <input type="text" name="dishName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>
              <div class="w-full">
                  <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item ID</label>
                  <input type="text" name="itemID" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                  <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
              </div>
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                  <input type="number" name="quantity" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
              </div>
          </div>
          <button name='addmenu' type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Add product
          </button>
      </form>
  </div>
</section>
    
    
<div class="overflow-x-auto mx-4">
  <table class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>DISH NO</th>
        <th>DISH</th>
        <th>QUANTITY</th>
        <th>PRICE</th>
        <th>ITEM ID</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <?php
            $res = SHOWALLMENU();
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