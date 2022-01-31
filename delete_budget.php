<?php
$con = new mysqli("localhost","root","","budget_ecwc");
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
//if(isset($_GET['delete'])) {
//$rows = mysqli_query($con,"DELETE FROM budget_table WHERE 'department_id'=".$department_id." AND 'expense_detail_id'=".$expense_detail_id);
 //mysqli_query($con,$rows);
//header("Location:budget.php");
//}


 if(isset($_GET['delete'])){
        $id = $_GET['delete'];

       $query = mysqli_query($con,"DELETE FROM budget_table WHERE budget_id =$id");
        

       header("location: budget.php");

    }
    

?>

