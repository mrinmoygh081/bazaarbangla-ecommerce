<script>
$('#select_all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});




</script>
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $eventValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM achievement  WHERE achievement_id={$eventValueId} ";
			
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
      
              	
      <div class="col-xs-4">
      	<input type="submit" name="submit" class="btn btn-success" value="Apply">
      	<a class="btn btn-primary" href="achievement.php?source=add_achievement">Add New</a>
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
		<th>Achievement Heading</th>
		<th> Achievement Date</th>
		<th>Image</th>
	    <th>Achievement Content</th>
	    
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM achievement order by achievement_id desc";
        $achievement_event = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $achievement_event )) {
			
$achievement_id = $row['achievement_id'];			
$achievement_heading = $row['achievement_heading'];
$achievement_date = $row['achievement_date'];
$achievement_image = $row['achievement_image'];

$achievement_content = $row['achievement_content'];






echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $achievement_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$achievement_heading</td>";
			echo "<td>$achievement_date</td>";
			
			
	
	echo "<td><a href='../assets/img/courses/achievement/$achievement_image'><img width='100px'src='../assets/img/courses/achievement/$achievement_image'<\a></td>";
	
	
			echo "<td>$achievement_content</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='achievement.php?delete={$achievement_id}'>Delete</td>";
			
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
	
	
$the_achievement_id = $_GET['delete'];
	
	$query = "DELETE FROM achievement WHERE achievement_id = {$the_achievement_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: achievement.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   