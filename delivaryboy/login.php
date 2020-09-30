<?php include "inc/db.php"; ?>
<?php include "inc/header.php"; ?>

<?php session_start(); ?>


<?php
if(isset($_POST['login'])){
 
	
 $useremail = $_POST['useremail'];
	
 $password = $_POST['password'];
	
//$useremail = mysqli_real_escape_string($connection, $username);
//$password = mysqli_real_escape_string($connection, $password);
	
$query = "SELECT * FROM deliveryboy WHERE deliveryboy_email = '{$useremail}'";	
	
$select_user_query = mysqli_query($connection, $query);
	if(!$select_user_query) {
		
		die("query faild" . mysqli_error($connection));
	}
	
	
while($row = mysqli_fetch_array($select_user_query)) {
	
	
$db_user_id = $row['deliveryboy_id'];
$db_useremail = $row['deliveryboy_email'];

$db_user_password = $row['deliveryboy_password'];
$db_user_name = $row['deliveryboy_name'];
}
	
//$password = ($password, $db_user_password);	
	
if($useremail !== $db_useremail && $password !== $db_user_password) {
	
header("Location: ../index.php ");	
} else if($useremail == $db_useremail && $password == $db_user_password) {
	
$_SESSION['useremail'] = $db_useremail;	
$_SESSION['username'] = $db_user_name;
$_SESSION['delivery_id'] = $db_user_id;	

	
	
header("Location: index.php");
	
} else {	
	
header("Location: login.php ");	
}
	
	
	
}

?>



<!-- Navigation -->




<!-- Page Content -->
<div class="container-login">
		<div class="wrap-login">
			<div class="login-form-title" style="background-image: url(../assets/imgs/register_img.jpg);">
				<span class="login-form-title-1"> Delivery App </span>
			</div>
			<form class="login-form" method="post" action="">
				<div class="wrap-input">
					<span class="label-input">Email</span>
					<input class="input" type="text" name="useremail" placeholder="Enter your email" required>
				</div>
				<div class="wrap-input">
					<span class="label-input">Password</span>
					<input class="input" type="password" name="password" placeholder="Enter password" required>
				</div>
				<div class="forgot py-3 d-flex">
					<div class="form-check form-check-inline">
						<input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="" >
						<label class="label-checkbox txt1 m-0" for="ckb1"> Remember me </label>
					</div>
					<div>
						<a href="#" class="txt1"> Forgot Password? </a>
					</div>
				</div>
				<div class="container-login-form-btn">
					<button class="login-form-btn" name="login"> Login </button>
				</div>
			</form>
		</div>
	</div>

<?php include "inc/footer.php";?>


