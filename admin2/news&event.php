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
                Welcome to News & Event panel
                <small><?php echo $_SESSION['username'];?></small>
            </h1>
            
            
<?php
			
if(isset($_GET['source'])) {
	
	$source = $_GET['source']; 


} else {
	
	$source = '';
}	



	switch($source)	{
			
			case 'add_event';
			
			include "includes/add_event.php";
			
			break;
			
			case 'edit_teacher';
include "includes/edit_teacher.php";			
			include "includes/edit_teacher.php";
			break;
			
			case '34';
			echo "NICE 34";
			break;
			
			case 'view_profile';
			
			include "includes/view_profile.php";
			break;
		default:
			
			include "includes/view_all_event.php";
			break;
			
	}	
	





?>
    
     
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

     
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>
