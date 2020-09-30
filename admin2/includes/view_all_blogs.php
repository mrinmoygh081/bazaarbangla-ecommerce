
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $blogsValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM blogs  WHERE blogs_id={$blogsValueId} ";
			
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
      	<a class="btn btn-primary" href="blogs.php?source=add_blog">Add New</a>
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
		<th>blog Title</th>
		<th> Upload Date</th>
		<th>Blog Image</th>
	    <th>Blog Content</th>
	   
		<th>Delete</th>
		
	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM blogs order by blogs_id desc";
        $select_blogs = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_blogs )) {
			
$blogs_id = $row['blogs_id'];			
$blogs_title = $row['blogs_title'];
$blogs_contant = $row['blogs_contant'];


$blogs_date = $row['blogs_date'];

$blogs_image = $row['blogs_image'];




echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $blogs_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$blogs_title</td>";
			echo "<td>$blogs_date</td>";
			
			
	
	echo "<td><img width='100px'src='../assets/img/blog/$blogs_image'</td>";
	
	
			echo "<td>$blogs_contant</td>";
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='blogs.php?delete={$blogs_id}'>Delete</td>";
			
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
	
	
$the_blogs_id = $_GET['delete'];
	
	$query = "DELETE FROM blogs WHERE blogs_id = {$the_blogs_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: blogs.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   