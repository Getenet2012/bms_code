<?php require_once 'budget_ecwc.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php 

if(!empty($_POST["sector_id"])){ 
   
    $result = mysqli_query($con, "SELECT * FROM department_table WHERE sector_id = ".$_POST['sector_id']." ORDER BY department_id ASC");
     
   
    if($result->num_rows > 0){ 
        echo '<option value="">Select Department</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['department_id'].'">'.$row['department_id'].', '.$row['department_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Department not available</option>'; 
    } 
}