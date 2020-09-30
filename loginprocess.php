<?php 
session_start();
require_once 'includes/db.php'; 
if(isset($_POST) & !empty($_POST)){
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	
	$query = "SELECT * FROM user WHERE user_mobile = '$mobile'";
	$verify_query = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($verify_query);
	$db_password = $row['user_password'];

	if(password_verify($password, $db_password)) {
		$_SESSION['customerid'] = $row['user_id'];
		$_SESSION['customername'] = $row['user_name'];
		if (!isset($_SESSION['cart'])) {
			header("location: index.php");
		} else {
			header("location: checkout.php");
		}
	} else {
		header("location: login.php");
	}
} else {
	header("location: index.php");
}


?>