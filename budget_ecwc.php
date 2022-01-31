<?php

$con = new mysqli("localhost","root","","budget_ecwc");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
if(isset($_POST['save'])){
		 $sector_id = $_POST['sector_id'];
		 $department_id = $_POST['department_id'];
		 $expense_main_id = $_POST['expense_main_id'];
		 $expense_detail_id	 = $_POST['expense_detail_id'];
         //$orginal_balance = $_POST['original_balance'];
		 $new_amount = $_POST['amount_b'];
		 $date = date('Y,m,d');
		 $year = date('Y');
		 
		 
		
$query = mysqli_query($con,"select * from budget_table 
	                     where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");
                   $row = $query->fetch_assoc();
     
		if($query->num_rows  > 0)  
			
		{ 
		                    $initial_amount = $row['amount_b'];
		                    $app_amount = $row['amount_b'] + $new_amount;							 
							 $query = mysqli_query($con, "UPDATE  budget_table SET amount_b='$app_amount' 
							 where department_id=".$department_id." and expense_detail_id =" .$expense_detail_id."");					
		}
         else {
	$query = mysqli_query($con, "INSERT INTO budget_table (sector_id,department_id,expense_main_id,expense_detail_id,original_balance,amount_b,allocation_date,fiscal_year) 
		VALUE ('$sector_id','$department_id','$expense_main_id','$expense_detail_id','$new_amount','$new_amount','$date','$year')"); 
									 	
						}
       header("location: budget.php");  

    
	} ?>