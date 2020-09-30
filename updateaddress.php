<?php require_once "includes/db.php";  ?>
<?php require_once "includes/header.php"; ?>
    <!-- /header -->
<?php 

	$the_user_id = $_SESSION['customerid'];

	$query = "SELECT * FROM usermeta WHERE user_id= $the_user_id";
	$select_users = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($select_users)) {
		$user_name = $row['name'];
		$user_mobile = $row['mobile'];
		$user_mobile2 = $row['mobile2'];
		$user_pin = $row['zip'];
		$user_nearby = $row['nearby'];
		$user_address1 = $row['address1'];
	}


    if(isset($_POST['edit_user'])) {
        
        $user_name = $_POST['name'];
        $user_adderss = $_POST['area'];
        $user_mobile = $_POST['phone'];
        $user_mobile2 = $_POST['altphone'];
        $user_pin = $_POST['pin'];
        $user_landmark = $_POST['landmark'];
        
        	
		$usql = "UPDATE usermeta SET name='$user_name', address1='$user_adderss', mobile='$user_mobile', zip='$user_pin', nearby='$user_landmark', mobile2='$user_mobile2' WHERE user_id = $the_user_id";
		$res = mysqli_query($connection, $usql);
        
        $update_user = mysqli_query($connection, $query);
        header("Location: updateaddress.php");
    }


?>
    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- Update Delivery Address -->
    <div class="container" style="background-color: #f4f4f4;">
        <form action="" style="margin-top: 10px; padding: 15px 0;" method="post">
            <h3 class="text-center text-uppercase"> Update Your Delivery Address </h3>
            <div class="row align-items-end">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name"> Full Name </label>
                        <input type="text" name="name" value="<?php echo $user_name; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" value="<?php echo $user_mobile; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="altPhone"> Alternative Phone Number </label>
                        <input type="text" name="altphone" value="<?php echo $user_mobile2; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="area"> Colony, Area, Road Name </label>
                        <input type="text" name="area" value="<?php echo $user_address1; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="landmark"> Landmark (Optional) </label>
                        <input type="text" name="landmark" value="<?php echo $user_nearby; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="town">Town / City</label>
                        <input type="text" name="town" value="Malda" readonly>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="pin">Postcode / ZIP </label>
                        <input type="text" name="pin" value="<?php echo $user_pin; ?>">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="state"> State </label>
                        <input type="text" name="state" value="West Bengal" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="register_signup text-center">
                       <input type="submit" name="edit_user" value="Update Delivery Address" class="btn btn-green btn_register">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /Update Delivery Address -->

    <!-- footer  -->
	<?php require_once "includes/footer.php"; ?>
    
   