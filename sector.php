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
$sector_name = '';


    if(isset($_POST['save'])){
        $sector_id = $_POST['sector_id'];
        $sector_name = $_POST['sector_name'];

        $query = mysqli_query($con, "INSERT INTO sector_table (sector_id,sector_name) 
		VALUE ('$sector_id','$sector_name')"); 
        
        header("location: sector_ecwc.php");

    }

   
    //delete data

    if(isset($_GET['delete'])){
        $sector_id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM sector_table WHERE sector_id=$sector_id");
        

      header("location: sector_ecwc.php");

    }

    if(isset($_GET['edit'])){
        $sector_id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM sector_table WHERE sector_id=$sector_id");


      
        if( mysqli_num_rows($result) == 1){
          $row = $result->fetch_assoc();
		 $sector_id = $row['sector_id'];
         $sector_name = $row['sector_name'];
		  
			
        }
    
    }

    if(isset($_POST['update'])){
        $sector_id = $_POST['sector_id'];
        $sector_name = $_POST['sector_name'];
		

        $query = mysqli_query($con, "UPDATE sector_table SET sector_id='$sector_id',sector_name='$sector_name' WHERE sector_id='$sector_id'");
        
         header("location: sector_ecwc.php");
    }


?>