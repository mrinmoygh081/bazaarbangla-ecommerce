<?php include "includes/admin_header.php" ?>
 <div id="wrapper">
        
  

        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">

  <h1 class="page-header">
                Welcome to email panel
                <small><?php echo $_SESSION['username'];?></small>
            </h1>
                 
        
          <div class="table-responsive">
           <table class="table table-bordered table-hover">
        	<thead>
        		<tr>
        			<th>Sl.no</th>
        			<th>Email Id</th>
        			<th>Name</th>
        			<th>Subject</th>
        			<th>Massege</th>
        			<th>Email Date</th>
        			<th>Delete</th>
        		
        		</tr>
        		
        	</thead>
       
        <tbody>
<?php
	$counter = 1;
$query = "SELECT * FROM email order by email_id desc";
 $select_email = mysqli_query($connection,$query);  
 while($row = mysqli_fetch_assoc( $select_email )) {
		
$email_id = $row['email_id'];
$email_sender = $row['email_sender'];
$email_from	 = $row['email_from'];
$email_sub = $row['email_sub'];
$email_date = $row['email_date'];
$email_content = $row['email_content'];


echo "<tr>";
			echo "<td>" . $counter ."</td>";	
            echo "<td>$email_from</td>";
			echo "<td>$email_sender</td>";
			echo "<td>$email_sub</td>";

			
			echo "<td>$email_content</td>";
			echo "<td>$email_date</td>";
			

			echo "<td><a href='email.php?delete={$email_id}'>Delete</td>";
			
echo "</tr>";
			
			
		$counter = $counter+1;
			
			
		}
	
	
	
?>
        		
        	
        </tbody>
  </table>
          
			</div>    
   <?php



if(isset($_GET['delete'])) {
	
	if(isset($_SESSION['user_role'])) {
		
	if($_SESSION['user_role'] == 'admin') {
	

	
$the_email_id =$_GET['delete'];
	
	$query = "DELETE FROM email WHERE email_id = {$the_email_id} ";
	$delete_query = mysqli_query($connection, $query);
	
	header("LOCATION: email.php");
	}
}
}

?>     
       
  <?php include "includes/admin_footer.php" ?>     
     
    
  
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

</div> 