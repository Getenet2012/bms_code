<?php

$con = new mysqli("localhost","root","","budget_ecwc");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$total = 0;
$update = false;
$id=0;
$expense_main_id = '';
$name_details = '';



    if(isset($_POST['save'])){
        $expense_main_id = $_POST['expense_main_id'];
		$name_details = $_POST['name_details'];
    

        $query = mysqli_query($con, "INSERT INTO expense_main_table (expense_main_id,name_details) 
		VALUE ('$expense_main_id','$name_details')"); 
        
       
        header("location: expense_main.php");
        

    }

   
    //delete data

    if(isset($_GET['delete'])){
        $expense_main_id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM expense_main_table WHERE expense_main_id=$expense_main_id");
        

       header("location: expense_main.php");

    }

    if(isset($_GET['edit'])){
        $expense_main_id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM expense_main_table WHERE expense_main_id=$expense_main_id");


      
        if( mysqli_num_rows($result) == 1){
           $row = $result->fetch_assoc();
		 $expense_main_id = $row['expense_main_id'];
		 $name_details = $row['name_details'];
		  
			
        }
    
    }

    if(isset($_POST['update'])){
        $expense_main_id = $_POST['expense_main_id'];
		$name_details = $_POST['name_details'];
		

        $query = mysqli_query($con, "UPDATE expense_main_table SET expense_main_id='$expense_main_id',name_details='$name_details' WHERE expense_main_id=' $expense_main_id'");
        
       header("location: expense_main.php");
    }


?>