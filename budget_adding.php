
			
					
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
	  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	 
	 
	 <script> 
	 
	 $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );
 </script>
<style type="text/css">

select {
 padding:10px;
 margin:10px;
 width:150px;
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
 width:150px;
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
 tfoot input {
        width: 50%;
        padding: 2px;
        box-sizing: border-box;
    }
.budget_t {
 
  border-collapse: collapse;
  font-family: 'Times New Roman', Times, serif;
  float:center;
  border:1px solid red;
 
	
}
.budget_t tr,td {
	 text-align:center;
	 border:1px solid blue;
}
.budget_t th {
	text-align:center;
	 border:1px solid green;
}
.container {
	padding-left:20px;
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
<div id="wrapper"> <!--- content-1 --->
<div id="body"> <!--- content-2 --->
<div class="container">
<table id="example" class="budget_t" style="width:100%">
        <thead>
            <tr>
                <th>Sector ID</th>
                <th>Department ID</th>
                <th>Expense Main</th>
                <th>Expense Detail</th>
                <th>Budget Amount</th>
				 <th>Allocation date</th>
            </tr>
        </thead>
        <tbody>
		<?php 
			$result = mysqli_query($con, "SELECT * FROM budget_table");
			?>
                  <?php 
                            while($row = $result->fetch_assoc()){
							 ?>
                            <tr>
                                <td><?php echo $row['sector_id']; ?></td>
                                <td><?php echo $row['department_id']; ?></td>
								<td><?php echo $row['expense_main_id']; ?></td>
                                <td><?php echo $row['expense_detail_id']; ?></td>
								
                                <td><?php echo $row['amount']; ?></td>
								<td><?php echo $row['allocation_date']; ?></td>
								
                               
                            </tr>
							
                        <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Sector ID</th>
                <th>Department ID</th>
                <th>Expense Main</th>
                <th>Expense Detail</th>
                <th>Budget Amount</th>
				<th>Allocation date</th>
            </tr>
        </tfoot>
    </table>



</div>
</div> <!--- end content-2 --->
</div> <!--- end content-1 --->
 
</section>

<div class="footer">
<p>Copyright &copy; 2013 E.C Ethiopian Construction Works Corporation </p>
</div>
</body>
</html>
	








			