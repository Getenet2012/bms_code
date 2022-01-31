<?php 
session_start ();
if(!isset($_SESSION["login"]))

	header("location:login.php"); 
?>
<?php $con = new mysqli("localhost","root","","budget_ecwc");
  $total = 0;
  $expensetotal = 0;
  $totalcap = 0;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>dashboard</title>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <link href="css/style_budget.css" type="text/css" rel="stylesheet">
 
</head>

<body>
<div class="header"> <h3>Budget Managemnet System </h3></div>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-ECWC-plus-plus'></i>
      <span class="logo_name">BMS ECWC</span>
    </div>
      <ul class="nav-links">
		<li class="btn active">
          <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name" href="dashboard.php">Dashboard</span>
          </a>
        </li> 
   
 <li class="btn">
    <a href="budget.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="budget.php">Budget </span>
          </a>
        </li> 
		
		<li class="btn">
    <a href="expense.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="expense.php">Expense </span>
          </a>
        </li> 
		 <!----- <li class="btn">
        <a href="request.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="request.php">Budget Request</span>
          </a>
        </li> 
		 <li class="btn">
        <a href="check.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="check.php">Budget Checking</span>
          </a>
        </li> ------->
		<li class="btn">
        <a href="budgetvsexpense.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="budgetvsexpense.php">Budget vs Expense</span>
          </a>
        </li>
		<li class="btn">
    <a href="trasfer.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="trasfer.php">Budget Transfer </span>
          </a>
        </li> 
        <li>
        <a href="logout.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="logout.php">logout</span>
          </a>
        </li>
	 
      </ul>
  </div>
<section class="home-section">
    <div class="home-content">
      <div class="overview-boxes">
         <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Budget</div>
            <div class="number">
		<?php

include "db.php"; // Using database connection file here
 $result = mysqli_query($con, "SELECT * FROM budget_table");
    while($row = $result->fetch_assoc()){
	  
        $total = $total + $row['amount_b'];
    }

?>
<tbody>
  <tr>
	 <td style="number_format"> <?php echo  $total; ?></td>
  </tr>	
   </tbody>
		</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>        </div>
		
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Expense</div>
            <div class="number">
<?php

include "db.php"; // Using database connection file here
  $result = mysqli_query($con, "SELECT * FROM expense_table");
    while($row = $result->fetch_assoc()){
        $expensetotal = $expensetotal + $row['amount_e'];
    }

?>
<tbody>
  <tr
	 <td><?php echo $expensetotal; ?></td>
  </tr>	
  
   </tbody>		
		</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>        </div>
          <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Capital</div>
            <div class="number"><?php $totalcap = $total + $expensetotal; 
			
		echo $totalcap;
			?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
         <div class="title"> Corporate Budget List</div>
          <div class="sales-details">

<table border="2">
   <thead>
    <tr>
	  
      <th>Sector/Department</th>  
      <th>Budget Amount</th>
	  <th>Budget Year</th>
    </tr>
  </thead>

<?php

include "db.php"; // Using database connection file here
$records = mysqli_query($con,"select * from budget_table"); // fetch data from database

while($data = mysqli_fetch_array($records))

{
?>
<tbody>
  <tr>
    <td><?php echo $data['department_id']; ?></td>
    <td><?php echo $data['amount_b']; ?></td>
	 <td><?php echo $data['fiscal_year']; ?></td>
     
	 
  </tr>	
   </tbody>
<?php
}
?>
</table>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Expense List</div>
		  <table border="1">
   <thead>
    <tr>
       <th>Sector/Department Code</th>
      <th>Expense Amount</th>
	  <th>Expense Description</th>
    </tr>
  </thead>

<?php

include "db.php"; // Using database connection file here

$records = mysqli_query($con,"select * from expense_table"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
<tbody>
  <tr>
    <td><?php echo $data['department_id']; ?></td>
	 <td><?php echo $data['amount_e']; ?></td>
	 <td><?php echo $data['expense_description']; ?></td>
	
  </tr>	
   </tbody>
<?php

}
?>
</table>
        </div>
      </div>
    </div>
  </section>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("c-bar");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active", "");
  }
  this.className += " active";
  });
}
</script>
<div class="footer">
<p> Copyright &copy; 2013 E.C Ethiopian Construction Works Corporation </p>
</div>
</body>
</html>
