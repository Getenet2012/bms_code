		
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	
?>

<?php require_once 'expense_main_ecwc.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php  if(isset($_SESSION['message'])): ?>
<?php endif ?> 
 
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Expense Main</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <link href="css/style_budget.css" type="text/css" rel="stylesheet" >
	 <style type="text/css">

button {
 width:30%;
 padding:5px;
 margin:1px;
 text-align:center;
 background-image: linear-gradient(green,blak, white);
 font-family:"Times New Roman", Times, serif;
 font-size:18px;
 color:#000000;
}
select {
 padding:10px;
 margin:10px;
 width:250px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
} 

	 
	 </style>
	   
   </head>
<body>
<div class="header"> <h3>Budget Managemnet System </h3></div>
   <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-ECWC-plus-plus'></i>
      <span class="logo_name">BMS ECWC</span>
    </div>
      <ul class="nav-links">
		<li class="btn">
          <a href="dashboard.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name" href="dashboard.php">Dashboard</span>
          </a>
        </li> 
   <li class="btn">
    <a href="sector_ecwc.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="sector_ecwc.php">Add Sector</span>
          </a>
        </li> 
  
	<li class="btn">
    <a href="department_ecwc.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="department_ecwc.php">Add Department</span>
          </a>
        </li> 
		
	<li class="btn active">
    <a href="expense_main.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="expense_main.php">Add Expense Main</span>
          </a>
        </li> 
		
		<li class="btn">
    <a href="expense_details.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="expense_details.php">Add Expense Details</span>
          </a>
        </li> 
		
 <li class="btn">
    <a href="../user/budget.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="budget.php">Budget </span>
          </a>
        </li> 
		
		<li class="btn">
    <a href="../user/expense.php">
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
        <a href="../user/budgetvsexpense.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="budgetvsexpense.php">Budget vs Expense</span>
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
   <h3>Add Expense Main</h3>
  <div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<div class="row">
            <div class="col-md-4">
			 <form action="expense_main_ecwc.php" method="POST">
			  <table border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_budget">
			  
			  
			   <tr>
                    <div class="form-group">
                        <td align="center"><label class="Title">Expense_Main_ID</label></td>
	<td colspan="3"><input type="text" name="expense_main_id" class="form-control" id="expense_main_id" placeholder="Enter expense main id" required  value="<?php echo $expense_main_id; ?>"></td>
				   </div>
					</tr>
				
			 <tr>
                    <div class="form-group">
                        <td align="center"><label class="Title">Name_Details</label></td>
	<td colspan="3"><input type="text" name="name_details" class="form-control" id="name_details" placeholder="Enter details name" required  value="<?php echo $name_details; ?>"></td>
				   </div>
					</tr>
					
					<tr>
					<td> </td>
					<td colspan="3" align="right"> <?php if($update == true): ?>
                    <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" class="btn btn-primary btn-block">Add</button>
                    <?php endif; ?></td>
					</tr>
					</table>
                    
                </form>
            </div>
            <div class="col-md-8">
              
               <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM expense_main_table");
                ?>
                <div class="row justify-content-center">
				
                   <table border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_budget_th">
                       <thead>
	
                             <tr>
								<th>Main ID</th>
                                <th>Name Details</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()):
							
							 ?>
                            <tr>
                                <td><?php echo $row['expense_main_id']; ?></td>
                                <td><?php echo $row['name_details']; ?></td>
								
                                <td>
                                    <a href="expense_main.php?edit=<?php echo $row['expense_main_id']; ?>" class="btn btn-success">Update</a>
                                    <a href="expense_main_ecwc.php?delete=<?php echo $row['expense_main_id']; ?>"  class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>






</div> <!--- end content-2 --->
</div> <!--- end content-1 --->
  	
</section>

<div class="footer">
<p> Copyright &copy; 2013 E.C Ethiopian Construction Works Corporation </p>
</div>
</body>
</html>








