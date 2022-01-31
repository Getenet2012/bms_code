<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>database conncet</title>
</head>

<body>
<?php
 ob_start();
 $servername = "localhost";
 $user = "root";
 $password = "";
 $db = "budget_ecwc";
 
 $con=mysqli_connect($servername, $user, $password, $db);
 
 if(!$con) {
     die("connection failed:".mysqli_connect_error());
 }
     ob_end_flush();
 ?>
</body>
</html>
