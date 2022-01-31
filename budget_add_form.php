		
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	
?>
<?php 
$date = '';
?>

<?php $con = new mysqli("localhost","root","","budget_ecwc"); ?>
<?php  if(isset($_SESSION['message'])): ?>
<?php endif ?> 
 
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Budget Report</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link href="css/style_budget_one.css" type="text/css" rel="stylesheet" >
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css">
table {
  width:auto;
  border-collapse: collapse;
  font-family: 'Times New Roman', Times, serif;
  float:center;
  
}

td, th{
  border: 0px solid #999;
 
  text-align: left;
}
 #tbl_budget{
 
}

#tbl_budget td, #tbl_budget th {
  padding: 5px;
}

#tbl_budget th {
  padding-top: 0px;
  padding-bottom: 0px;
  text-align: left;
 color: #006400;
}
/******* table th ****/
#tbl_budget_th {
  width: auto;
   border:2px solid;
 
}

#tbl_budget_th td, #tbl_budget_th th {
  padding: 10px;
    border:1px solid;
}
#tbl_budget_th th {
  font-size:12px;
  padding-top: 10px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#B0C4DE;
  color: #006400;
  
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
input[type=text]{
padding:10px;
 margin:10px;
 width:235px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
input[type=date]{
padding:10px;
 margin:10px;
 width:235px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
input[type=year]{
padding:10px;
 margin:10px;
 width:235px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
button {
 width:30%;
 padding:5px;
 margin:1px;
 text-align:center;
 background-image: linear-gradient(green,aquamarine, white);
 font-family:"Times New Roman", Times, serif;
 font-size:18px;
 color:#000000;
}
.import_cvs {
	padding-left:900px;
}
.head_to_content {
	display:flex;
	
	
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
    <a href="budget.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="budget.php">Budget Report</span>
          </a>
        </li> 
		
		<li class="btn">
    <a href="expense.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="expense.php">Expense Report</span>
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
		
		
        <li>
        <a href="logout.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name" href="logout.php">logout</span>
          </a>
        </li>
	 
      </ul>
  </div>

  <section class="home-section"> 
  <div class="head_to_content">
  <div class="h3_to">
   <h4>Add Budget</h4> 
   <h4 class="import_cvs"><form method="post" action="import_file.php" enctype="multipart/form-data">
  <input type="file" name="file"/>
  <input type="submit" name="Import" value="Submit"/>
 </form> </h4>
 </div>
 </div>
  <div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<div class="row">
            <div class="col-md-4">
			<form action="budget_ecwc.php" name="frmUser" method="POST">
			  <table border="0" align="left" cellpadding="0" cellspacing="0" id="tbl_budget">
			  
<tr>  			 
			 
  <td><label class="Title">Sector_ID:</label></td>
  <td><select name="sector_id" id="sector_id">
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
			  
  <td><label class="Title">Department_ID:</label></td>
  <td><select name="department_id" id="department_id">
    <option disabled selected>Select Department_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From department_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['department_id'] ."'>" .$data['department_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 </td>
 </tr>
		
<tr>
  <td><label class="Title">Expense_Main_ID:</label></td>
  <td><select name="expense_main_id" id="expense_main_id">
    <option disabled selected>Select Expense_Main_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From expense_main_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['expense_main_id'] ."'>" .$data['name_details'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</td>
</tr>
<tr>          
	
			  
 <td> <label class="Title">Expense_Details_ID:</label></td>
  <td> <select name="expense_detail_id" id="expense_detail_id">
    <option disabled selected>Select Expense_Details_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From expense_detail_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['expense_detail_id'] ."'>" .$data['name_details'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
 </td>
 </tr>

		<tr>
			 
 <td> <label class="Title">Budget Amount:</label></td>
 <td><input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount" required ></td>
 
</tr>


					
					<tr>
					<td></td>
					<td colspan="3" align="right">
                    
                    <button type="submit" name="save" class="btn">Add</button>
                   </td>
					</tr>
					</table>
                    
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
 <script>
$(document).ready(function(){
    $('#sector_id').on('change', function(){
        var SectID = $(this).val();
        if(SectID){
            $.ajax({
                type:'POST',
                url:'dept.php',
                data:'sector_id='+SectID,
                success:function(html){
                  $('#department_id').html(html);  
                }
            }); 
        }else{
            $('#department_id').html('<option value="">Select Sector first</option>');
   
        }
    });
	
});
</script>
<script>
$(document).ready(function(){
    $('#expense_main_id').on('change', function(){
        var ExpID = $(this).val();
        if(ExpID){
            $.ajax({
                type:'POST',
                url:'expdet.php',
                data:'expense_main_id='+ExpID,
                success:function(html){
                  $('#expense_detail_id').html(html);  
                }
            }); 
        }else{
            $('#expense_detail_id').html('<option value="">Select Main Expense Id First</option>');
   
        }
    });
	
});
</script>

                </form>
           
</div>

           
        </div>
    </div>

</div> <!--- end content-2 --->
</div> <!--- end content-1 --->
 
</section>

<div class="footer">
<p>Copyright &copy; 2013 E.C Ethiopian Construction Works Corporation </p>
</div>
</body>
</html>
	







