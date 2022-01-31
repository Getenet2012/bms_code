<?php require_once 'budget_ecwc.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php 

if(!empty($_POST["expense_main_id"])){ 
   
    $result = mysqli_query($con, "SELECT * FROM expense_detail_table WHERE expense_main_id = ".$_POST['expense_main_id']." ORDER BY expense_detail_id ASC");
     
   
    if($result->num_rows > 0){ 
        echo '<option value="">Select Expense</option>'; 
        while($row = $result->fetch_assoc()){ 
             echo '<option value="'.$row['expense_detail_id'].'">'.$row['expense_detail_id'].', '.$row['name_details'].'</option>';		
            //echo '<option value="'.$row['expense_detail_id'].'">'.$row['name_details'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Expense not available</option>'; 
    } 
}