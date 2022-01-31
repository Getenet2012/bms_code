<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
?>
<?php require_once 'sector.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php  if(isset($_SESSION['message'])): ?>
<?php endif ?> 
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sector</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link href="css/style_budget.css" type="text/css" rel="stylesheet" >
	<style type="text/css">

button {
 width:35%;
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
   <li class="btn active">
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
		
	<li class="btn">
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
   <h3>Add Sector</h3>
  <div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<div class="row">
            <div class="col-md-4">
			 <form action="sector.php" method="POST">
			  <table border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_budget">
			  
			  <tr>
                    <div class="form-group">
                        <td align="center"><label class="Title">Sector_ID</label></td>
	<td colspan="3"><input type="text" name="sector_id" class="form-control" id="sector_id" placeholder="Enter sector id" required  value="<?php echo $sector_id; ?>"></td>
				   </div>
					</tr>
					
		 <tr>
                    <div class="form-group">
                        <td align="center"><label class="Title">Sector_Name</label></td>
	<td colspan="3"><input type="text" name="sector_name" class="form-control" id="sector_name" placeholder="Enter sector name" required  value="<?php echo $sector_name; ?>"></td>
				   </div>
					</tr>			
	
					<tr>
					<td> </td>
					<td colspan="3" align="right"> <?php if($update == true): ?>
                    <button type="submit" name="update" id="success">Update</button>
                    <?php else: ?>
                    <button type="submit" name="save" id="primary">Add</button>
                    <?php endif; ?></td>
					</tr>
					</table>	
                    
                </form>
            </div>
      <div class="col-md-8">
              
               <?php 
                    $result = mysqli_query($con, "SELECT * FROM sector_table");
                ?>
                <div class="row justify-content-center">
				
                   <table border="1" align="center" cellpadding="5" cellspacing="5" id="tbl_budget_th">
                       <thead>
	
                             <tr>
								<th>Sector ID</th>
                                <th>Sector Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()):
							
							 ?>
                            <tr>
							    <td><?php echo $row['sector_id'];?></td>
                                <td><?php echo $row['sector_name']; ?></td>
								
                                <td>
                                    <a href="sector_ecwc.php?edit=<?php echo $row['sector_id']; ?>" class="btn btn-success">Update</a>
                                    <a href="sector.php?delete=<?php echo $row['sector_id']; ?>"  class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>
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








