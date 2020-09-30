<?php require_once "includes/db.php";  ?>
<?php require_once "includes/header.php"; ?>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->
<?php 
if(!isset($_SESSION['customerid']) && $_POST['randcheck']==$_SESSION['rand']){
	header("location: login.php");
}else{
        $user_id = $_SESSION['customerid'];
	   if(isset($_POST['update'])){
		   $phone = $_POST['phone'];
		   $password = $_POST['password'];
		   $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
		   $query = "SELECT * FROM user WHERE user_mobile=$phone && user_id=$user_id";
		   $conn = mysqli_query($connection, $query);
		   $count = mysqli_num_rows($conn);
		   if($count==1){
			$query = "UPDATE user SET ";
            $query .= "user_password = '$password' ";
            $query .= "WHERE user_id = {$user_id}";
			   $update_user = mysqli_query($connection, $query);
              $msg = "Password has been change";
		   }else{?>
			   <h3 class="text-center"><?php echo "Number does match"; ?></h3>
		  <?php }
	   }
       
	
     }
?>

    <!-- update register -->
    <div class="container_smail" style="background-color: #f4f4f4; margin-top: 20px; border-radius: 20px;">
        <form action="" style="margin-top: 20px; padding: 20px;" method="post">
           <?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />   
            <h3 class="text-center"> Update Your Security </h3>
           
            <div class="row align-items-end">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" >
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" name="password" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="register_signup text-center">
                        <input type="submit" name="update" class="btn btn-green btn_register" value="Update Your Security">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /update register -->


    <!-- footer  -->
    
    <?php require_once "includes/footer.php"; ?>