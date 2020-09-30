
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $videosValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM videos  WHERE videos_id={$videosValueId} ";
			
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
      	<a class="btn btn-primary" href="videos.php?source=add_videos">Add New</a>
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
		<th>Videos Title</th>
		<th> Upload Date</th>
		<th>Videos Image</th>
	    <th>Videos Link</th>
	    <th>Some Word</th>
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM videos order by videos_id desc";
        $select_videos = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_videos )) {
			
$videos_id = $row['videos_id'];			
$videos_title = $row['videos_title'];
$videos_link = $row['videos_link'];
$videos_content = $row['videos_content'];

$videos_date = $row['videos_date'];

$videos_image = $row['videos_image'];




echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $videos_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$videos_title</td>";
			echo "<td>$videos_date</td>";
			
			
	
	echo "<td><img width='100px'src='../assets/img/gallery/videos/$videos_image'</td>";
	
	echo "<td>$videos_link</td>";
			echo "<td>$videos_content</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='videos.php?delete={$videos_id}'>Delete</td>";
			
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
	
	
$the_videos_id = $_GET['delete'];
	
	$query = "DELETE FROM videos WHERE videos_id = {$the_videos_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: videos.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   