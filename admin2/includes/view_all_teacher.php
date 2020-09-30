
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $teacherValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM teacher  WHERE teacher_id={$teacherValueId} ";
			
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
<option value=""></option>
<option value="published">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
<option value="clone">Clone</option>
	
</select>	

</div>
      
              	
      <div class="col-xs-4">
      	<input type="submit" name="submit" class="btn btn-success" value="Apply">
      	<a class="btn btn-primary" href="teacher.php?source=add_teacher">Add New</a>
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
		<th>Teacher Name</th>
		<th>Teacher Post</th>
		
		<th>Qualification</th>
		
		
		<th>Image</th>
	    <th>Ph No.</th>
		
		<th>Delete</th>
		

	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM teacher";
        $select_teacher = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_teacher )) {
			
$teacher_id = $row['teacher_id'];
$teacher_name = $row['teacher_name'];
$teacher_address = $row['teacher_address'];
$teacher_depertment = $row['teacher_depertment'];

$teacher_image = $row['teacher_image'];

$teacher_ph_no = $row['teacher_ph_no'];


echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $teacher_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$teacher_name</td>";
			echo "<td>$teacher_address</td>";
			
			
			
			echo "<td>$teacher_depertment</td>";
			
	
		
			
	
	echo "<td><img width='100px'src='../assets/img/teachers/$teacher_image'</td>";
	echo "<td>$teacher_ph_no</td>";
	
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='teacher.php?delete={$teacher_id}'>Delete</td>";

		
			
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
	
	
	
$the_teacher_id = $_GET['delete'];
	
	$query = "DELETE FROM teacher WHERE teacher_id = {$the_teacher_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: teacher.php");
	
}

	}
}
?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   