		
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
?>
<?php require_once 'department.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php  if(isset($_SESSION['message'])): ?>
<?php endif ?> 
 
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Department</title>
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
 width:200px;
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
  
	<li class="btn active">
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
   <h3>Add Department</h3>
  <div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<div class="row">
            <div class="col-md-4">
			 <form action="department.php" method="POST">
			  <table border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_budget">
			  
	<tr>		  	 
  <td><label class="Title">Sector_ID:</label> </td>
  <td><select name = "sector_id" id="sector_id">
    <option disabled selected>Select Sector_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From sector_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['sector_id'] ."'>" .$data['sector_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select></td>
 </tr>
			  
			 	<tr>
                   
                        <td><label class="Title">Department_ID</label></td>
	<td><input type="text" name="department_id" class="form-control" id="department_id" placeholder="Enter department id" required  value="<?php echo $department_id; ?>"></td>
				   
					</tr>
			 
			 <tr>
                    
                        <td align="center"><label class="Title">Department_Name</label></td>
	<td><input type="text" name="department_name" class="form-control" id="department_name" placeholder="Enter department name" required  value="<?php echo $department_name; ?>"></td>
				   
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
                    
                    $result = mysqli_query($con, "SELECT * FROM department_table");
                ?>
                <div class="row justify-content-center">
				
                   <table border="0" align="center" cellpadding="0" cellspacing="0" id="tbl_budget_th">
                       <thead>
	
                             <tr>
							    <th>Sector ID</th>
								<th>Department ID</th>
                                <th>Department Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()):
							
							 ?>
                            <tr>
							    <td><?php echo $row['sector_id']; ?></td>
                                <td><?php echo $row['department_id']; ?></td>
                                <td><?php echo $row['department_name']; ?></td>
								
                                <td>
                                    <a href="department_ecwc.php?edit=<?php echo $row['department_id']; ?>" class="btn btn-success">Update</a>
                                    <a href="department.php?delete=<?php echo $row['department_id']; ?>"  class="btn btn-danger">Delete</a>
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








