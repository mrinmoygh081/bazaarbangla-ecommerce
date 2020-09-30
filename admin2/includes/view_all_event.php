
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $eventValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM event  WHERE event_id={$eventValueId} ";
			
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
      	<a class="btn btn-primary" href="news&event.php?source=add_event">Add New</a>
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
		<th>Event Heading</th>
		<th> Event Date</th>
		<th>Image</th>
	    <th>Event Content</th>
	    
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM event order by event_id desc";
        $select_event = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_event )) {
			
$event_id = $row['event_id'];			
$event_heading = $row['event_heading'];
$event_date = $row['event_date'];
$event_image = $row['event_image'];

$event_content = $row['event_content'];






echo "<tr>";
			
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $event_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$event_heading</td>";
			echo "<td>$event_date</td>";
			
			
	
	echo "<td><a href='../assets/img/event/$event_image'><img width='100px'src='../assets/img/event/$event_image'<\a></td>";
	
	
			echo "<td>$event_content</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='news&event.php?delete={$event_id}'>Delete</td>";
			
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
	
	
$the_event_id = $_GET['delete'];
	
	$query = "DELETE FROM event WHERE event_id = {$the_event_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: news&event.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   