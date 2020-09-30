<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['category_id'];
		$sql = "DELETE FROM category WHERE category_id='$id'";
		if(mysqli_query($connection, $sql)){
			header('location:categories.php');
		}
	}else{
		header('location: categories.php');
	}
?>