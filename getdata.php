<?php 
// Include configuration file 
require_once 'db.php'; 
 
// Include User class 
require_once 'class.php'; 
 
// Initialize User class 
$user = new User(); 
 
// Define filters 
$conditions = array(); 
 
// If search request is submitted 
if(!empty($_POST['keywords'])){ 
    $conditions['search'] = array('sector_id' => $_POST['keywords'], 'department_id' => $_POST['keywords']); 
} 
 
// If filter request is submitted 
if(!empty($_POST['filter'])){ 
    $sortVal = $_POST['filter']; 
    $sortArr = array( 
        'new' => array( 
            'order_by' => 'created DESC' 
        ), 
        'asc'=>array( 
            'order_by'=>'sector_id ASC' 
        ), 
        'desc'=>array( 
            'order_by'=>'sector_id DESC' 
        ), 
        'active'=>array( 
            'where'=>array('status' => 1) 
        ), 
        'inactive'=>array( 
            'where'=>array('status' => 0) 
        ) 
    ); 
    $sortKey = key($sortArr[$sortVal]); 
    $conditions[$sortKey] = $sortArr[$sortVal][$sortKey]; 
} 
 
// Get members data based on search and filter 
$members = $user->getRows($conditions); 
 
if(!empty($members)){ 
    $i = 0; 
    foreach($members as $row){ $i++; 
        echo '<tr>'; 
        echo '<td>'.$i.'</td>'; 
        echo '<td>'.$row['sector_id'].'</td>'; 
        echo '<td>'.$row['department_id'].'</td>'; 
        echo '<td>'.$row['expense_main_id	'].'</td>'; 
         
        echo '</tr>'; 
    } 
}else{ 
    echo '<tr><td colspan="7">No members(s) found...</td></tr>'; 
} 
exit;