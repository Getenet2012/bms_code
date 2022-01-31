<?php
$con = mysqli_connect("localhost", "root", "", "budget_ecwc");
if(isset($_POST["import"]))
{
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {

    $sector = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $department = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
	
	$main_id = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $detail_id = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
	
	$initi = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $amount = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
	
	$date = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $year = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
	

    $query = "INSERT INTO budget_table(sector_id,department_id,expense_main_id,expense_detail_id,original_balance,amount,allocation_date,fiscal_year) 
	                        VALUES ('".$sector."', '".$department."','".$main_id."', '".$detail_id."','".$initi."', '".$amount."','".$date."', '".$year."')";
     $yes = mysqli_query($con, $query);
  if(!$yes){
			 echo "file not import";
		 }else {
		echo 'File has been successfully Imported';
        header('Location: budget.php');
		 }
   }
  } 

 }
}
?>