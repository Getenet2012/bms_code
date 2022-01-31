 <?php 
$query = mysqli_query($con, "UPDATE amount budget_table 
JOIN amount expense_table ON (budget_table.budget_id = expense_table.expense_id) 
SET budget_table.amount = '$upbudget',expense_table.amount = '$exp_amount' 
where department_id='".$department_id."' and expense_detail_id ='" .$expense_detail_id."'");

/***********************************************/

	$budget_compare = mysqli_query($con,"select amount from budget_table 
	                     where department_id='".$department_id."' and expense_detail_id='".$expense_detail_id."'");
        $row = $budget_compare->fetch_assoc();
		     $newamount = $row['amount'];



$new_test = mysqli_query($con,"select * from budget_table where department_id='".$department_id."' and expense_detail_id ='" .$expense_detail_id."'");
							 $row = $new_test->fetch_assoc();
							   $new_amount = $row['amount'];
							   $see = $new_amount -  $exp_amount;
							 $upadte = mysqli_query($con,"UPDATE budget_table SET amount='$see' 
							 where department_id='".$department_id."' and expense_detail_id ='" .$expense_detail_id."'"); 




$query1 = mysqli_query($con, "UPDATE budget_table SET amount='$see' 
							 where department_id='".$department_id." ' and expense_detail_id ='" .$expense_detail_id."'"); 
							 
							 
							 	<form action="result.php" method="POST">
<select name="dropdown">
<option  disabled selected value="sector">Sector</option>
 <?php
        
        $records = mysqli_query($con, "SELECT * From sector_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['sector_id'] ."'>" .$data['sector_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
</select>
<br />
<select id="depart">
<option disabled selected value="department">Deprtment </option>
<?php
        
        $records = mysqli_query($con, "SELECT * From department_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['department_id'] ."'>" .$data['department_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
</select>
<br />
<select id ="main">
<option disabled selected value="main_id">Main</option>
 <?php
        
        $records = mysqli_query($con, "SELECT * From expense_main_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['expense_main_id'] ."'>" .$data['name_details'] ."</option>";  // displaying data in option menu
        }	
    ?> 
</select>
<br />
<select id="detail_id">
<option disabled selected value="detail_id">Detail</option>
 <?php
        
        $records = mysqli_query($con, "SELECT * From expense_detail_table");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['expense_detail_id'] ."'>" .$data['name_details'] ."</option>";  // displaying data in option menu
        }	
    ?>

</select>
<input type="submit" name="search" />
</form>  
  
							 
							 
							 $good_now = "SELECT b.*,e.amount FROM budget_table b ,expense_table e  WHERE b.expense_detail_id = e.expense_detail_id";
$result = mysqli_query($con,$good_now);
while ($row=mysqli_fetch_assoc($result))
{
	$budget = $row['original_balance'];
	$expense = $row['amount'];
	$new_val = $budget - $expense;
	?>
	
	<?php 
	
}
?>
<?php
$query = "SELECT
p.PersonID
,p.ImagePath
,p.FamilyName
,p.FirstName
,p.OtherNames
,p.Gender
,p.CountryID
,i.IncidentDate
,i.KeywordID
,i.IncidentCountryID
,i.StatusID

FROM t_incidents AS i
    LEFT JOIN t_persons AS p ON i.PersonID = p.PersonID
WHERE
    FamilyName LIKE '%" . $likes . "%' AND
    FirstName LIKE '%" . $likes . "%' AND
    OtherNames LIKE '%" . $likes . "%' AND
    Gender LIKE '%" . $likes . "%' AND
    IncidentDate LIKE '%" . $likes . "%' AND
    KeywordID LIKE '%" . $likes . "%' AND
    IncidentCountryID LIKE '%" . $likes . "%' AND
    StatusID LIKE '%" . $likes . "%'
ORDER BY PersonID DESC $pages->limit";


?>