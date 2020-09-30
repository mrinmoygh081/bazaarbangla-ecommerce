
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $studentresultValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM studentresult  WHERE studentresult_id={$studentresultValueId} ";
			
			$delete_status = mysqli_query($connection, $query);
			confirmQuery($delete_status);
			
			
			break;
			
			
			
		case 'clone':
			
			
			
			
			
	}
	
		
	}
	
}
?>
      

       
        
         
           <form action="" method="post"> 
        
        
        <div class="row">
 <div id="bulkOptionsContainer" class="col-xs-4">
	
<select class="form-control" name="bulk_options" id="">
<option value="">Select Option</option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
<option value="clone">Clone</option>
	
</select>	

</div>
       
              	
      <div class="col-xl-4">
     
      	<input type="submit" name="submit" class="btn btn-success" value="Apply">
      	<a class="btn btn-primary" href="result.php?source=add_result">Add New</a>
      </div> 
      
      	         	
      <div class="col-xs-4">
       <br>
      

<!-- /.input-group -->
<?php  ?>
      

      </div> 
      		
      				
     </div>
      <div class="table-responsive">
      
       <table class="table table-bordered table-hover">  	

<thead>
<br>
	<tr>
	<br>
	<th><input name="selectAllBoxes" id="selectAllBoxes" type="checkbox"> </th>
		<th>Sl.No</th>
		<th>Student Name</th>
		<th>Class</th>
		<th>Section</th>
		<th> Roll No</th>
		<th>Total Marks</th>
		<th>Status</th>
		<th>Delete</th>

	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM studentresult order by studentresult_id desc";
        $select_student = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_student )) {
			
$studentresult_id = $row['studentresult_id'];
$studentresult_name = $row['studentresult_name'];
$studentresult_class = $row['studentresult_class'];
$studentresult_roll = $row['studentresult_roll'];
$studentresult_section = $row['studentresult_section'];
$total_no = $row['total_no'];
$status = $row['status']; 


echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $studentresult_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$studentresult_name</td>";
			echo "<td>$studentresult_class</td>";
			
			
			
			echo "<td>$studentresult_section</td>";
			
	
		
			
	echo "<td>$studentresult_roll</td>";
	echo "<td>$total_no</td>";
	echo "<td>$status</td>";
	
			
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='result.php?delete={$studentresult_id}'>Delete</td>";

		
			
echo "</tr>";
			
			$counter = $counter+1;
		
		}
	
?>
 		        		        		        		
        	
        </tbody>
</table>
</div>
     </form>     
         
   <?php
if(isset($_GET['delete'])) {
	
	if(isset($_SESSION['user_role'])) {
		
	if($_SESSION['user_role'] == 'admin') {
	
	
$the_studentresult_id = $_GET['delete'];
	
	$query = "DELETE FROM studentresult WHERE studentresult_id = {$the_studentresult_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: result.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   