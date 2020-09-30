
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $carouselValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM carousel  WHERE carousel_id={$carouselValueId} ";
			
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
      	<a class="btn btn-primary" href="carousel.php?source=add_carosuel">Add New</a>
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
		<th>Carosuel Heading</th>
		<th> Carosuel Title</th>
		
		<th>Carosuel Content</th>
		
		
		<th>Image</th>
	   
		
		<th>Delete</th>
		

	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM carousel order by carousel_id desc ";
        $select_carosuel = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_carosuel )) {
			
$carousel_id = $row['carousel_id'];
$carousel_heading = $row['carousel_heading'];
$carousel_title = $row['carousel_title'];
$carousel_content = $row['carousel_content'];

$carousel_image = $row['carousel_image'];




echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $carousel_id;  ?>'> </td>



<?php		
echo "<td>" . $counter ."</td>";
			echo "<td>$carousel_heading</td>";
			echo "<td>$carousel_title</td>";
			
			
			
			echo "<td>$carousel_content</td>";
			
	
		
			
	
	echo "<td><img width='100px'src='../assets/img/teachers/$carousel_image'</td>";
	
	
	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='carousel.php?delete={$carousel_id}'>Delete</td>";

		
			
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
	
$the_carousel_id = $_GET['delete'];
	
	$query = "DELETE FROM carousel WHERE carousel_id = {$the_carousel_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: carousel.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   