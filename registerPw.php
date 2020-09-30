<?php require_once "includes/header.php";
require_once "includes/db.php"; ?>
<?php
    $the_user_id = $_SESSION['user_id'];

    if(isset($_POST['submit'])) {
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password == $confirmPassword) {
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
            
            $query = "UPDATE user SET ";
            $query .= "user_password = '$password' ";
            $query .= "WHERE user_id = {$the_user_id}";
            
            $update_user = mysqli_query($connection, $query);
            
            if(!$update_user) {
                die("QUERY FAILED " . mysqli_error($connection));
            }
            header("Location: index.php");
        } else {
            $msg = "Password does not match!";
        }
    } else {
        $msg = Null;
    }
?>

    <div class="container-login" style="padding: 25px 0">
		<div class="wrap-login">
			<div class="login-form-title" style="background-image: url(assets/imgs/register_img.jpg);">
				<span class="login-form-title-1"> Set Your Password </span>
			</div>
			<form class="login-form" method="post">
                <div class="text-center text-danger my-2 rounded">
                    <h5 style="font-size: 0.8rem;"><?php echo $msg; ?></h5>
                </div>
                <div class="wrap-input">
					<span class="label-input"> Set Password </span>
					<input class="input" type="password" name="password" placeholder="Set the password here" required>
				</div>
                <div class="wrap-input">
					<span class="label-input"> Confirm Password </span>
					<input class="input" type="password" name="confirmPassword" placeholder="Retype the password here" required>
				</div>
				<div class="container-login-form-btn" style="margin-top: 15px;">
					<input type="submit" name="submit" value="Continue" class="login-form-btn">
				</div>
			</form>
		</div>
    </div>

<?php require_once "includes/footer.php"; ?>