	   
  <b>Sector Report: 
          <input id="sector" type="text" placeholder="Search here">
        </b> 
		<br />
		 <b>Department Report: 
          <input id="deprt" type="text" placeholder="Search here">
        </b> 
		<br />
		 <b>Search Main ID: 
          <input id="main_id" type="text" placeholder="Search here">
        </b>
		<br />
        <b>Search Detail ID: 
          <input id="detail_id" type="text" placeholder="Search here">
        </b> 
		
		

<?php
$con = new mysqli("localhost","root","","budget_ecwc");
$i = '';
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['submit']))
{
       $sector = $_POST['sector']; 
	   $department = $_POST['department']; 
	   $main = $_POST['main_id']; 
	   $detail = $_POST['detail_id']; 
	   
       
       if($sector == "sector") And ($department=="department") And ($main="main_id") And ()
         $query = "SELECT sector_id,department_id,expense_main_id,expense_detail_id,original_balance,amount FROM budget_table WHERE sector_id='sector'"; 
 
       else if($selection == "department") 
         $query = "SELECT * FROM collegeinfo_tbl WHERE Gender='gender'"; 
 
       else if($selection == "course") 
         $query = "SELECT * FROM collegeinfo_tbl WHERE Course='course'"; 
 
      

}
 
if (isset($query))
{
 
  $result = mysql_query($query) or die(mysql_error());     

echo "<br /> <br />";  
echo "<table border='1' cellpadding='10'>";
  echo "<tr> <th>ID Number:</th> <th>First Name:</th> <th>Last Name:</th> <th>Gender:</th> <th>Year:</th> <th>Course:</th> </tr>";    
       
   while ($row = mysql_fetch_array($result)) { 
    

echo "<tr>";
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['FirstName'] . '</td>';
    echo '<td>' . $row['LastName'] . '</td>';
    echo '<td>' . $row['Gender'] . '</td>';
    echo '<td>' . $row['Year'] . '</td>';
echo '<td>' . $row['Course'] . '</td>';
    echo "</tr>"; 
  } 
 
 
  echo "</table>";
 
 
}

?>
