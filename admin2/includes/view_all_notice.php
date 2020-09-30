
<?php
if(isset($_POST['checkBoxArray'])){
	
foreach($_POST['checkBoxArray'] as $noticeValueId){
	
	
 $bulk_options = $_POST['bulk_options'];
	
	switch($bulk_options) {
		
			
		case 'delete':
			
	$query = " DELETE FROM notice  WHERE notice_id={$noticeValueId} ";
			
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
      	<a class="btn btn-primary" href="notice.php?source=add_notice">Add New</a>
      </div> 	
     
       </div> 	
 <div class="table-responsive">
      
       <table class="table table-bordered table-hover">
<thead>
<br>
	<tr>
	<br>
	<th><input name="selectAllBoxes" id="selectAllBoxes" type="checkbox"> </th>
		
        			<th>Sl.no</th>
        			<th>Date</th>
        			<th>Notice</th>
        			<th>Notice Image</th>
        			<th>Notice Post By</th>
        			
        			<th>Delete</th>
        			
        			
        			
        		</tr>
        		
        	</thead>
       
        <tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM notice order by notice_id desc LIMIT 100";
        $select_notice = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_notice )) {
		
$notice_id = $row['notice_id'];
$notice_contant = $row['notice_contant'];
$notice_post_by = $row['notice_post_by'];
$notice_image = $row['notice_image'];
$notice_date = $row['notice_date'];
echo "<tr>";
	?>
		
		
		<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $notice_id;  ?>'> </td>
				
						<?php		
			
			echo "<td>" . $counter ."</td>";	
            echo "<td>$notice_date</td>";
			echo "<td>$notice_contant</td>";
			echo "<td><a href = 'assets/img/notice/$notice_image'><img width='100px' height='120px' src='assets/img/notice/$notice_image'</a></td>";
			echo "<td>$notice_post_by</td>";
		
			
			echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete
	'); \" href='notice.php?delete={$notice_id}'>Delete</td>";
			
			
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
	
	
$the_notice_id = $_GET['delete'];
	
	$query = "DELETE FROM notice WHERE notice_id = {$the_notice_id} ";
	$delete_query = mysqli_query($connection, $query);
	header("LOCATION: notice.php");
	
}
	}
}

?>     
       
 <div>
 	 <script src="js/scripts.js"></script>

 </div>     
     
    
   