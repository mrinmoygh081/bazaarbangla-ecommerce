<?php require_once "includes/header.php";
require_once "includes/db.php"; ?>
<?php

if(isset($_POST['register'])){
    $username = $_POST["user_name"];
    $mobile = $_POST["mobile"];
    $_SESSION['mobile'] = $mobile;

    $query = "INSERT INTO user(user_name, user_mobile, user_status) ";        
    $query .= "VALUES('{$username}', '{$mobile}', 'unverified')";
    $register_user_query = mysqli_query($connection, $query);
    if(!$register_user_query) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

	$mobile='91'.$_POST['mobile'];
    $message=$_POST['message'];
    $randNum =  rand(10000,99999);
    $_SESSION['randNum'] = $randNum;
    $message = "Please enter " . $randNum . " as OTP to verify your mobile on bazaarbangla.in";
	
	$apiKey = urlencode('SRAJ3fLv5BY-nqWAtFkNdM5TUyWFP1dbg8smQzQHT0');
	$numbers = array($mobile);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($message);
	$numbers = implode(',', $numbers);
 	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
    echo $response;
    header("Location: registerConfirm.php");
}	
?>

<link rel="stylesheet" href="./css/main.css">
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->


    <!-- register -->
    <div class="container-login">
		<div class="wrap-login">
			<div class="login-form-title" style="background-image: url(assets/imgs/register_img.jpg);">
				<span class="login-form-title-1"> Signup </span>
			</div>
			<form class="login-form" method="post">
                <div class="wrap-input">
					<span class="label-input">Full Name</span>
					<input class="input" type="text" name="user_name" placeholder="Enter your full number" required>
				</div>
				<div class="wrap-input">
					<span class="label-input">Mobile</span>
					<input class="input" type="text" name="mobile" placeholder="Enter your mobile number" required>
				</div>
				<div class="forgot py-3 d-flex">
					<div class="form-check form-check-inline">
						<input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="" >
						<label class="label-checkbox txt1 m-0" for="ckb1"> Remember me </label>
					</div>
					<div>
						<p class="txt1">Already have an account? <a href="login.php"> Click Login </a></p>
					</div>
				</div>
				<div class="container-login-form-btn">
					<input type="submit" name="register" value="Register" class="login-form-btn">
				</div>
			</form>
		</div>
    </div>


<?php require_once "includes/footer.php"; ?>
