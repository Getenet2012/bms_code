<?php

$con = new mysqli("localhost","root","","budget_ecwc");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$total = 0;
$update = false;
$id=0;
$expense_detail_id = '';
$expense_main_id = '';
$name_details = '';



    if(isset($_POST['save'])){
		$expense_detail_id = $_POST['expense_detail_id'];
        $expense_main_id = $_POST['expense_main_id'];
		$name_details = $_POST['name_details'];
    

        $query = mysqli_query($con, "INSERT INTO expense_detail_table (expense_detail_id,expense_main_id,name_details) 
		VALUE ('$expense_detail_id','$expense_main_id','$name_details')"); 
        
       
        header("location: expense_details.php");
        

    }

   
    //delete data

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM expense_detail_table WHERE expense_detail_id=$id");
        

        header("location: expense_details.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM expense_detail_table WHERE expense_detail_id=$id");


      
        if( mysqli_num_rows($result) == 1){
           $row = $result->fetch_assoc();
		$expense_detail_id = $row['expense_detail_id'];
        $expense_main_id = $row['expense_main_id'];
		$name_details = $row['name_details'];
		  
			
        }
    
    }

    if(isset($_POST['update'])){
        $expense_detail_id = $_POST['expense_detail_id'];
        $expense_main_id = $_POST['expense_main_id'];
		$name_details = $_POST['name_details'];
		

        $query = mysqli_query($con, "UPDATE expense_detail_table SET expense_detail_id='$expense_detail_id',expense_main_id='$expense_main_id',name_details='$name_details' WHERE expense_detail_id='$expense_detail_id '");
        
       header("location: expense_details.php");
    }


?>