<?php require_once "includes/header.php";
require_once "includes/db.php"; ?>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- /navbar -->

    <!-- login -->
    <div class="container-login">
		<div class="wrap-login">
			<div class="login-form-title" style="background-image: url(assets/imgs/register_img.jpg);">
				<span class="login-form-title-1"> Login </span>
			</div>
			<form action="loginprocess.php" class="login-form" method="post">
                
				<div class="wrap-input">
					<span class="label-input">Mobile</span>
					<input class="input" type="text" name="mobile" placeholder="Enter your mobile number" required>
				</div>
                <div class="wrap-input">
					<span class="label-input"> Password </span>
					<input class="input" type="password" name="password" placeholder="Enter your password" required>
				</div>
				<div class="forgot py-3 d-flex">
					<div class="form-check form-check-inline">
						<input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="" >
						<label class="label-checkbox txt1 m-0" for="ckb1"> Remember me </label>
					</div>
					<div>
						<p class="txt1"><a href="register.php">New to Flipkart? Create an account </a></p>
					</div>
				</div>
				<div class="container-login-form-btn">
					<input type="submit" name="login" value="Login" class="login-form-btn">
				</div>
			</form>
		</div>
    </div>
    <!-- /login -->


    <!-- footer  -->
   <?php require_once "includes/footer.php"; ?>