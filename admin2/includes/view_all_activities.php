
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $activitiesValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM social_activities  WHERE id={$activitiesValueId} ";
			
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
      	<a class="btn btn-primary" href="social_activities.php?source=add_activities">Add New</a>
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
		<th>Post By</th>
		<th> Image</th>
		<th>Word</th>
	   
	   
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM social_activities order by id desc";
        $select_activites = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_activites )) {
			
$id = $row['id'];			
$name = $row['name'];
$word = $row['word'];

$image = $row['activities_image'];




echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$name</td>";
			
			
			
	
	echo "<td> <a href='../assets/img/activities/$image'><img width='100px'src='../assets/img/activities/$image'</a></td>";
	
	
			echo "<td>$word</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='social_activities.php?delete={$id}'>Delete</td>";
			
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
	
$the_activities_id = $_GET['delete'];
	
	$query = "DELETE FROM social_activities WHERE id = {$the_activities_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: social_activities.php");
	
}


?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   