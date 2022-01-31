<?php
$con = new mysqli("localhost","root","","budget_ecwc");
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
//if(isset($_GET['delete'])) {
  //$rows = mysql_query($con,"DELETE FROM expense_table WHERE 'department_id'=".$department_id." AND expense_detail_id=".$expense_detail_id);
  //header("Location:expense.php");
//}


 if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM expense_table WHERE expense_id=$id");
        

        header("location: expense.php");

    }
?>

