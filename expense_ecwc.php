
<?php
$con = mysqli_connect("localhost","root","","budget_ecwc") or die ("database can not connect");
				 
       if(isset($_POST['submit'])){
		
		$sector_id = $_POST['sector_id'];
		$department_id = $_POST['department_id'];
		$expense_main_id = $_POST['expense_main_id'];
		$expense_detail_id = $_POST['expense_detail_id'];
        
		 $amount = $_POST['amount_e'];
		 $date = date('Y,m,d');
		 $year = date('Y');
		 $expense_description = $_POST['expense_description'];
	
           
                   
        $query = mysqli_query($con,"select * from budget_table 
	                     where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");
                                     $row = mysqli_fetch_assoc($query);
								
		if($query->num_rows  > 0)  
		{
		$query1 = mysqli_query($con,"select * from budget_table 
	                     where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");
						 $data1 = mysqli_fetch_array($query1);
						
						
						 
			                 $new = $data1["amount_b"] - $amount;
				             $exp_amount = $expense + $amount;
							 
		 $query2 = mysqli_query($con,"INSERT INTO expense_table (sector_id,department_id,expense_main_id,expense_detail_id,amount_e,expense_date,fiscal_year,expense_description) 
		                                 VALUE ('$sector_id','$department_id','$expense_main_id','$expense_detail_id','$amount','$date','$year','$expense_description')"); 
										 
		$query3 = mysqli_query($con, "UPDATE budget_table SET amount_b='$new' 
							 where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");
       
                            						 
		}
         else {
			 echo "not budgeted";
		//$query6 = mysqli_query($con,"UPDATE budget_table SET amount='$new' 
							 //where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");		
		 }
		
     header("location: expense.php"); 


    
	} ?>
		
       