<?php

$con = new mysqli("localhost","root","","budget_ecwc");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$total = 0;
$update = false;
$id=0;
$sector_id = '';
$department_id = '';
$department_name = '';


    if(isset($_POST['save'])){
		$sector_id = $_POST['sector_id'];
        $department_id = $_POST['department_id'];
        $department_name = $_POST['department_name'];
		
		


        $query = mysqli_query($con,"INSERT INTO department_table (sector_id,department_id,department_name) 
		VALUE ('$sector_id','$department_id','$department_name')"); 
        
       
        header("location: department_ecwc.php");
        

    }

   
    //delete data

    if(isset($_GET['delete'])){
        $department_id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM department_table WHERE department_id=$department_id");
        

        header("location: department_ecwc.php");

    }

    if(isset($_GET['edit'])){
        $department_id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM department_table WHERE department_id=$department_id");


      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
			$sector_id = $row['sector_id'];
		    $department_id = $row['department_id'];
            $department_name = $row['department_name'];
		  
			
        }
    
    }

    if(isset($_POST['update'])){
		$sector_id = $_POST['sector_id'];
        $department_id = $_POST['department_id'];
        $department_name = $_POST['department_name'];
		

        $query = mysqli_query($con, "UPDATE department_table SET department_id='$department_id',department_name='$department_name' WHERE department_id='$department_id'");
        
         header("location: department_ecwc.php");
    }


?>