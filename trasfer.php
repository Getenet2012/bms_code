		
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
	<title>Budget transfer</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link href="css/style_budget_one.css" type="text/css" rel="stylesheet" >
     <link href="css/style_budget.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
<style type="text/css">
#dispaly_table {
  padding:auto;
  font-size:12px;
  text-align: left;
  
}
#dispaly_table th {
	border: 2px solid #00ff80;
	padding:5px;
	
}
#dispaly_table td {
	border: 1px solid #00ffbf;
	padding:5px;
	
}
select {
 padding:10px;
 margin:5px;
 width:216px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
} 
input[type=text]{
 padding:10px;
 margin:5px;
 width:200px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
 input[type=submit]{
 padding:5px;
 margin:1px;
}
input[type=date]{
 padding:10px;
 margin:5px;
 width:200px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
input[type=year]{
 padding:10px;
 margin:5px;
 width:200px;
 display: list;
            list-template-rows: repeat(2, 1fr);
            list-template-columns: repeat(2, 1fr);
            list-gap: 6rem;
           
            border: 1px solid #ccc;
            justify-content: space-evenly;
}
.title {
	 font-style: italic;
	 font-weight: bold;
}

.import_this {
	padding-left:10px;
}
.this_button {
	padding:10px;
}
.date_info {
	padding:20px;
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
			<li class="btn active">
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
 <div class="import_this">
   <h4>Budget Transfer</h4> 
  
</div>
 <div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<div class="row">
            <div class="col-md-4">
			<form action="transfer_budget.php" name="frmUser" method="POST">
			  <table border="0" align="left" cellpadding="0" cellspacing="0" id="tbl_budget">
			  			  
<tr>  			 
			 
  <td class="title">Sector:</td>
  <td><select name="sector" id="sector_id">
    <option disabled selected>Select Sector_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From sector_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
         echo "<option value='". $data['sector_id'] ."'>" .$data['sector_name'] ."</option>";   // displaying data in option menu
        }	
    ?>  
  </select></td>
  </tr>
			  
<tr>  			 
			 
  <td class="title">From Department:</td>
  <td><select name="transfer_depart" id="sector_id">
    <option disabled selected>Select Sector_ID</option>
    <?php
        
        $records = mysqli_query($con, "SELECT * From department_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
         echo "<option value='". $data['department_id'] ."'>" .$data['department_name'] ."</option>";   // displaying data in option menu
        }	
    ?>  
  </select></td>
  </tr>


	
	<tr>		
			  
  <td class="title">To Department:</td>
  <td><select name="recive_depart" id="department_id">
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
  <td class="title">Expense_Main_ID:</td>
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
	
			  
 <td class="title">Expense_Details_ID:</td>
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
 <td class="title"> Transfer Amount:</td>
 <td><input type="text" name="trans_amount" class="form-control" id="amount" placeholder="Enter amount" required ></td>
</tr>
<tr>
 <td class="title">Transfer Description:</td>
<td><input type="text" name="description" class="form-control" id="expense_description" placeholder="Enter expense descrpition" required ></td>
 
</tr>


					
					<tr>
					<td></td>
					<td colspan="3" align="right">
                    
                    <button type="submit" name="transfer" class="btn">Transfer</button>
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
<br> <br> <br>
            <div class="col-md-8">
            
               <?php 
                    
                    $result = mysqli_query($con, "SELECT * FROM budget_transfer_table");
                ?>
                <div class="row justify-content-center">
	
                   <table border="0" align="center" cellpadding="0" cellspacing="0" id="dispaly_table">
                       <thead>
	
                             <tr class="date_info">
							   <th>Sector </th>
								<th>From Department</th>
								<th>To Department </th>
								<th>Expense Main</th>
								 <th>Expense Details</th>
								
                                <th>Transfer Amount</th>
								 <th>Transfer Date</th>
								 <th>Transfer  Description</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = $result->fetch_assoc()){
								
							 ?>
                            <tr>
                                <td><?php echo $row['sector_id']; ?></td>
                                <td><?php echo $row['From_depart']; ?></td>
								<td><?php echo $row['To_depart']; ?></td>
                                <td><?php echo $row['expense_main']; ?></td>
								<td><?php echo $row['expense_detail']; ?></td>
                                <td><?php echo $row['Transfer_amount']; ?></td>
								<td><?php echo $row['transfer_date']; ?></td>
								<td><?php echo $row['trans_description']; ?></td>
                                <td>
                                <a href="delete_transfer.php?delete=<?php echo $row['trasfer_id'];?>"  class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
							
                        <?php } ?>
						
                    </table>
                   
                </div>
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
	







