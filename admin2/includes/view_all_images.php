
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $imageValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM images  WHERE image_id={$imageValueId} ";
			
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
      	<a class="btn btn-primary" href="gallery.php?source=add_image">Add New</a>
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
		<th>Image Title</th>
		<th> Upload Date</th>
		<th>Image</th>
	    <th>Image Category</th>
	    <th>Some Word</th>
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM images order by image_id desc";
        $select_image = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_image )) {
			
$image_id = $row['image_id'];			
$image_title = $row['image_title'];
$image_cat = $row['image_cat'];
$image_about = $row['image_about'];

$image_date = $row['image_date'];

$image = $row['image'];




echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $image_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$image_title</td>";
			echo "<td>$image_date</td>";
			
			
	
	echo "<td><img width='100px'src='../assets/img/gallery/small/$image'</td>";
	
	echo "<td>$image_cat</td>";
			echo "<td>$image_about</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='gallery.php?delete={$image_id}'>Delete</td>";
			
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
	
	
$the_image_id = $_GET['delete'];
	
	$query = "DELETE FROM images WHERE image_id = {$the_image_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: gallery.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   