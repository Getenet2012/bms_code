		
<?php 
session_start ();
if(!isset($_SESSION["login"]))
	header("location:login.php");
	
?>
<?php $con = new mysqli("localhost","root","","budget_ecwc");
 $total = 0;
 ?>
<?php  if(isset($_SESSION['message'])): ?>
<?php endif ?> 
 
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Budget vs Expense</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link href="css/style_budget_one.css" type="text/css" rel="stylesheet" >
	 <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
 <link href="css/style_budget.css" type="text/css" rel="stylesheet">
 
	    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
  
	
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
 width:10%;
 padding:5px;
 margin:1px;
 text-align:center;
 background-image: linear-gradient(green,yellow, blak);
 font-family:"Times New Roman", Times, serif;
 font-size:18px;
 color:#000;
}
#list_head {
	display:flex;
font-family:"Times New Roman", Times, serif;
}
#head_1 {
	display:grid-list;
	font-size:18px;
	padding-left:5px;
	
}
.head_2 {
	
	padding-left:500px;
	text-align:left;
}
.mycssquote{
	color: blue;
   
    padding: 5px;
}
#budget_t {
  width:auto;
  border-collapse: collapse;
  font-family: 'Times New Roman', Times, serif;
  float:center;
  border:1px solid red;
 
	
}
#budget_t tr,td {
	 padding:10px;
	 border:1px solid blue;
}
#budget_t th {
	 padding:10px;
	 border:1px solid green;
}
.container {
	padding-left:20px;
}
.print_btn {
	padding-left:950px;
	margin:20px;
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
		<li class="btn active">
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
   <h3>Budget vs Expense</h3>
<div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->   
<div class="container">
	  <form method="POST" action="search_query.php">
				<div class="form-inline">
					<b>Search: 
          <input name="keyword" id="gete" type="text" placeholder="Search by sector,department,detail_id here">
        </b> 
					<button class="btn btn-success" name="search">Search</button>
				</div>
			</form>
	  

        <br>
		
      
		<div id='printableArea'>
		<h5> <?php 
     $date = date("d-M-Y");
        echo "Date: " .$date. "<br>";

       ?></h5>
        <table id="budget_t" padding-left="30px">
            <tr>
                                <th>Sector ID</th>
								<th>Department ID</th>
								<th>Expense Main ID</th>
								 <th>Expense Details ID</th>
								 <th>Intial Budget</th>
								<th>Available Budget</th>
                                <th>Expense</th>
								<th>Variance</th>
								
								  <th>Date and Budget Year </th>
								  <th>Description</th>
            </tr>
            <tbody id="res_lt">
			
		<?php

		  $query=mysqli_query($con,"SELECT b.* , e.* FROM budget_table b,expense_table e WHERE b.budget_id=e.expense_id");
			//$query=mysqli_query($con,"SELECT * FROM `budget_table` LEFT JOIN `expense_table` ON budget_table.expense_detail_id = expense_table.expense_detail_id") or die(mysqli_error());
			while($row=mysqli_fetch_array($query)){
				 $var = $row['amount_b'] - $row['amount_e'];
		?>
		<tr>
			                    <td><?php echo $row['sector_id']; ?></td>
                                <td><?php echo $row['department_id']; ?></td>
								<td><?php echo $row['expense_main_id']; ?></td>
                                <td><?php echo $row['expense_detail_id']; ?></td>
                                <td><?php echo $row['original_balance']; ?></td>
								<td><?php echo $row['amount_b']; ?></td>
								<td><?php echo $row['amount_e']; ?></td>
								<td><?php echo $var; ?></td>
								<td><?php echo $row['expense_date']; ?></td>
								<td><?php echo $row['expense_description']; ?></td>
								
		</tr>
		<?php
			}
		?>
	</tbody>
</table>

			
			
			
			
		
		</div>

		<div class="print_btn">
 <input type="button" onclick="printDiv('printableArea')" value="print"  />
 </div>
       <script>
            $(document).ready(function() {
                $("#gete").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#res_lt tr").filter(function() {
                        $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
<script type="text/javascript">
 function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
      
</div> <!--- end content-2 --->
</div> <!--- end content-1 --->
  	
</section>

<div class="footer">
<p> Copyright &copy; 2013 E.C Ethiopian Construction Works Corporation </p>
</div>
</body>
</html>