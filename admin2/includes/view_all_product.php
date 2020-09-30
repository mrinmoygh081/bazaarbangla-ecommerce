<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $productValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = "DELETE FROM product  WHERE product_id = {$productValueId} ";
			
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
      	<a class="btn btn-primary" href="student.php?source=add_student">Add New</a>
      </div> 
      
      	         	
      <div class="col-xs-4">
       <br>
      
<h4>Blog Search</h4>
<form action="" method="post">
<div class="input-group">
<input name="search" type="text" class="form-control">
<span class="input-group-btn">
<button name="submit" class="btn btn-default" type="submit">
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form><!--search form-->
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
		<th>Product Title</th>
		<th>Product Category</th>
		<th>Product Price</th>
		<th>Product Quantity</th>
		<th></th>
		
		<th>Delete</th>

	</tr>

</thead>

<tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM product order by product_id desc";
        $select_product = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_product )) {
			
$row['product_id'];


echo "<tr>";
?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $student_id;  ?>'> </td>

<td> <?php  echo $counter;   ?></td>
<td> <?php  echo $row['product_title'];  ?></td>

<?php		

	
	
	echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='student.php?delete={$student_id}'>Delete</td>";

		
			
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
	
	
$the_student_id = $_GET['delete'];
	
	$query = "DELETE FROM student WHERE student_id = {$the_student_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: student.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   