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

function COOK_VIEW(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT EMPID, EMPNAME, SALARY, ITEMID, OUTLETID from COOK") ;
    $res = oci_execute($sql);
    return $sql;
}

function DISH_VIEW(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT DISHNO, DISH from SPE_DISH") ;
    $res = oci_execute($sql);
    return $sql;
}

function AVG_SAL(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT EMPID, EMPNAME, PHONE, ROLE from AVG_SAL") ;
    $res = oci_execute($sql);
    return $sql;
}

function ITEM_DETAILS(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT DISH, QUANTITY, ITEMNAME from ITEM_DETAILS") ;
    $res = oci_execute($sql);
    return $sql;
}

function EMP_DESC(){
    $connection = connection();
    $sql = oci_parse($connection,"SELECT EMPNAME, JOB, OUTLETNAME, LOC, DISH from EMP_DESC") ;
    $res = oci_execute($sql);
    return $sql;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
<section>
<div class="container mx-auto">
	<?php
		include_once 'navbar.php';
	?>
<h1 class="mt-32 text-white">COOK VIEW</h1>
<p class=" text-white">Information of those emloyee who's job is COOK</p>

<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									EMPID
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									NAME
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									SALARY
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									ITEMID
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									OUTLETID
								</th>
							</tr>
						</thead>
						<tbody>

                        <?php
            $res = COOK_VIEW();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                
                
					echo'
					<tr>
                    
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["EMPID"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["EMPNAME"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["SALARY"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
									'.$row["ITEMID"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["OUTLETID"].'
									</p>
								</td>
								</tr>';
                
            };
    ?>
			</tbody>
		</table>
	</div>
</section>

<section>
<div class="container mx-auto">
	<?php
		include_once 'navbar.php';
	?>
<h1 class="mt-32 text-white">DISH VIEW</h1>
<p class=" text-white">Information of those emloyee who's job is COOK</p>

<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									DISHNO
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									DISH
								</th>
							</tr>
						</thead>
						<tbody>

                        <?php
            $res = DISH_VIEW();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                
                
					echo'
					<tr>
                    
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["DISHNO"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["DISH"].'
									</p>
								</td>
								</tr>';
                
            };
    ?>
			</tbody>
		</table>
	</div>
</section>

<section>
<div class="container mx-auto">
	<?php
		include_once 'navbar.php';
	?>
<h1 class="mt-32 text-white">DISH VIEW</h1>
<p class=" text-white">Information of those emloyee who's job is COOK</p>

<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									EMPID
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									EMPNAME
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									PHONE
								</th>
							</tr>
						</thead>
						<tbody>

                        <?php
            $res = AVG_SAL();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                
                
					echo'
					<tr>
                    
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["EMPID"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["EMPNAME"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["PHONE"].'
									</p>
								</td>
								</tr>';
                
            };
    ?>
			</tbody>
		</table>
	</div>

</section>

<section>
<div class="container mx-auto">
	<?php
		include_once 'navbar.php';
	?>
<h1 class="mt-32 text-white">DISH VIEW</h1>
<p class=" text-white">Information of those emloyee who's job is COOK</p>

<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									DISH
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									QUANTITY
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									ITEMNAME
								</th>
							</tr>
						</thead>
						<tbody>

                        <?php
            $res = ITEM_DETAILS();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                
                
					echo'
					<tr>
                    
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["DISH"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["QUANTITY"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["ITEMNAME"].'
									</p>
								</td>
								</tr>';
                
            };
    ?>
			</tbody>
		</table>
	</div>

</section>

<section>
<div class="container mx-auto">
	<?php
		include_once 'navbar.php';
	?>
<h1 class="mt-32 text-white">DISH VIEW</h1>
<p class=" text-white">Information of those emloyee who's job is COOK</p>

<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									EMPNAME
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									JOB
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									OUTLETNAME
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									LOC
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									DISH
								</th>
							</tr>
						</thead>
						<tbody>

                        <?php
            $res = EMP_DESC();
            while ($row = oci_fetch_array($res, OCI_RETURN_NULLS+OCI_ASSOC)) {
                
                
                
					echo'
					<tr>
                    
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["EMPNAME"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["JOB"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["OUTLETNAME"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["LOC"].'
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
                                    '.$row["DISH"].'
									</p>
								</td>
								</tr>';
                
            };
    ?>
			</tbody>
		</table>
	</div>

</section>
	</body>
</html>
