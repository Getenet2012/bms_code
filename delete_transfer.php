<?php
$con = mysqli_connect("localhost","root","","budget_ecwc") or die ("database can not connect");
 if(isset($_GET['delete'])){
        $id = $_GET['delete'];

       $query = mysqli_query($con,"DELETE FROM budget_transfer_table WHERE trasfer_id =$id");
        

       header("location: trasfer.php");

    }
    

?>

