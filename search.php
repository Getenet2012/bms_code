<?php 
<div class="form-1">
<form action="" method="GET">
	<input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>
	
<button type="submit">search </button>
	</form>
	</div>
$con = mysqli_connect("localhost", "root", "", "budget_ecwc");
$output = '';
$sql = "SELECT * FROM department_id	 WHERE department_id LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
      $output .= '<h4 align="center">Search Result</h4>';
      $output .= '<div class="table-responsive">
                          <table class="table table bordered">
                               <tr>
                                 q<th>Expense Main Code</th>
								<th>Expense Detail Code</th>
								<th>Budget Amount</th>
								 <th>Month</th>
								<th>Expense Amount</th>
                                <th>Department</th>
								 <th>Variance Amount</th>
								  <th>Transfar Budget</th>
								   <th>Year</th>
                               </tr>';
      while($row = mysqli_fetch_array($result))
      {
           $output .= '
                <tr>
                     <td>'.$row["expense_main_id"].'</td>
                     <td>'.$row["expense_detail_id"].'</td>
                     <td>'.$row["amount"].'</td>
                     <td>'.$row["allocation_date"].'</td>
                     <td>'.$row["fiscal_year"].'</td>    
                </tr>
           ';
      }
      echo $output;
}
else
{
      echo 'Data Not Found';
}
?>  