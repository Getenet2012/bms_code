
<?php
$con = mysqli_connect("localhost","root","","budget_ecwc") or die ("database can not connect");
				 
       if(isset($_POST['transfer'])){
		
		$sector_id = $_POST['sector'];
		$From_depart = $_POST['transfer_depart'];
		$To_depart = $_POST['recive_depart'];
		$expense_main = $_POST['expense_main_id'];
        $expense_detail = $_POST['expense_detail_id'];
	    $Transfer_amount = $_POST['trans_amount'];
		 $date = date('Y,m,d');
		 $trans_description = $_POST['description'];
	
           
      
							 
		 $query = mysqli_query($con,"INSERT INTO budget_transfer_table (sector_id,From_depart,To_depart,expense_main,expense_detail,Transfer_amount,transfer_date,trans_description) 
		                                 VALUE ('$sector_id','$From_depart','$To_depart','$expense_main','$expense_detail','$Transfer_amount','$date','$trans_description')"); 
			if($query == 1){
				$query1 = mysqli_query($con,"select * from budget_table 
	                     where department_id='".$From_depart."' and expense_detail_id='".$expense_detail."'");
						 $data1 = mysqli_fetch_array($query1);
				
			                 $budget = $data1["amount_b"];
				             $trans = $budget - $Transfer_amount; 
												 
		         $query2 = mysqli_query($con, "UPDATE budget_table SET amount_b='$trans' 
							 where department_id='".$From_depart."' and expense_detail_id='".$expense_detail."'");
			}							 
					
		 
		
     header("location: trasfer.php"); 


    
	} ?>
		
       