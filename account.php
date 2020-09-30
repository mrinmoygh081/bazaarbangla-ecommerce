<?php require_once "includes/db.php";  ?>
<?php require_once "includes/header.php"; ?>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- My Account  -->

    <div class="container account_p">
        <h3>My Account</h3>
        <div class="d-flex myAccount">
            <div class="col-md-4 col-sm-12 col-12">
                <a href="myOrder.php">
                    <h3>Your Orders</h3>
                    <p>Your previous orders</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <a href="updateRegister.php">                
                    <h3>Login & Security</h3>
                    <p> Edit mobile number and password</p>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <a href="updateAddress.php">
                    <h3> Your Address </h3>
                    <p> Edit delivery addresses for orders and gifts </p>
                </a>
            </div>
        </div>
    </div>

    <!-- /My Account  -->

    <!-- footer  -->
    <?php require_once "includes/footer.php"; ?>
   