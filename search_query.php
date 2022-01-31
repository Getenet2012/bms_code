<?php
	require 'db.php';
	if(ISSET($_POST['search'])){
?>
	<table id="budget_t" padding-left="30px">
		<thead class="alert-info">
			<tr>
                                <th>Sector ID</th>
								<th>Department ID</th>
								<th>Expense Main ID</th>
								 <th>Expense Details ID</th>
								 <th>Intial Budget</th>
								<th>Available Budget</th>
                                <th>Expense</th>
								<th>Variance</th>
								<th>Budget Transfer</th>
								  <th>Date and Budget Year </th>
								  <th>Description</th>
            </tr>
		</thead>
		<tbody>
			<?php
				$keyword = $_POST['keyword'];
				$query = mysqli_query($con, "SELECT * FROM `budget_table` WHERE `sector_id` LIKE '%$keyword%' or `department_id` LIKE '%$keyword%' or `expense_main_id` LIKE '%$keyword%' or `expense_detail_id` LIKE '%$keyword%'") or die(mysqli_error());
				$count = mysqli_num_rows($query);
				if($count > 0){
					while($fetch = mysqli_fetch_array($query)){
			?>
					<tr>
						<td><?php echo $fetch['sector_id']?></td>
						<td><?php echo $fetch['department_id']?></td>
						<td><?php echo $fetch['expense_main_id']?></td>
						<td><?php echo $fetch['expense_detail_id']?></td>
						<td><?php echo $fetch['original_balance']?></td>
						<td><?php echo $fetch['amount']?></td>
						<td><?php echo $fetch['amount']?></td>
						<td><?php echo $fetch['allocation_date']?></td>
						
					</tr>
			<?php
					}
				}else{
					echo "<tr><td colspan='3' class='text-danger'><center>No result found!</center></td></tr>";
				}
			?>
		</tbody>
	</table>
<?php		
	}else{
?>
	<table class="table table-striped">
		<thead class="alert-info">
			<tr>
				                <th>Sector ID</th>
								<th>Department ID</th>
								<th>Expense Main ID</th>
								 <th>Expense Details ID</th>
								 <th>Intial Budget</th>
								<th>Available Budget</th>
                                <th>Expense</th>
								<th>Variance</th>
								<th>Budget Transfer</th>
								  <th>Date </th>
								  <th>Description</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = mysqli_query($con, "SELECT * FROM `budget_table` ORDER BY `department_id` ASC") or die(mysqli_error());
				while($fetch = mysqli_fetch_array($query)){
			?>
			<tr>
				        <td><?php echo $fetch['sector_id']?></td>
						<td><?php echo $fetch['department_id']?></td>
						<td><?php echo $fetch['expense_main_id']?></td>
						<td><?php echo $fetch['expense_detail_id']?></td>
						<td><?php echo $fetch['original_balance']?></td>
						<td><?php echo $fetch['amount']?></td>
						<td><?php echo $fetch['amount']?></td>
						<td><?php echo $fetch['allocation_date']?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
<?php
	}
?>