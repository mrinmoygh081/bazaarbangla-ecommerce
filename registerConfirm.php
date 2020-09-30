<?php require_once "includes/header.php";
require_once "includes/db.php"; ?>
<?php
    $mobile = $_SESSION['mobile'];

    if(isset($_POST['submit'])) {
        //$the_user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_mobile = $mobile";
        $con = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($con);
        $the_user_id = $row['user_id'];
        $_SESSION['user_id'] = $the_user_id;

        $verify = $_POST['verify'];
        if($verify == $_SESSION['randNum']) {
            $query = "UPDATE user SET ";
            $query .= "user_status = 'verified' ";
            $query .= "WHERE user_id = {$the_user_id}";
            
            $update_user = mysqli_query($connection, $query);
            header("Location: registerPw.php");
        }
    }
?>

    <!-- <form action="" method="POST">
        <div class="form-group text-center bg-dark p-4" style="width: 300px; margin: 30px auto;">
            <label class="text-white"> Verification</label>
            <input type="text" name="verify" class="form-control my-4" placeholder="Type the OTP here">
            <input type="submit" name="submit" value="verify" class="btn btn-primary">
        </div>
    </form> -->
    <div class="container-login" style="margin: 25px 0">
		<div class="wrap-login">
			<div class="login-form-title" style="background-image: url(assets/imgs/register_img.jpg);">
				<span class="login-form-title-1"> Verification </span>
			</div>
            <div class="text-center text-danger">
                OTP has been sent to your mobile number
            </div>
			<form class="login-form" method="post">
                <div class="wrap-input">
					<span class="label-input"> OTP </span>
					<input class="input" type="text" name="verify" placeholder="Type the OTP here" required>
				</div>
				<div class="container-login-form-btn" style="margin-top: 15px;">
					<input type="submit" name="submit" value="verify" class="login-form-btn">
				</div>
			</form>
		</div>
    </div>

<?php require_once "includes/footer.php"; ?>
