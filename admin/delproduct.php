<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET['product_id']) & !empty($_GET['product_id'])){
		$id = $_GET['product_id'];
		$sql = "SELECT product_img1 FROM product WHERE product_id=$id";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);
		if(!empty($r['product_img1'])){
			if(unlink($r['product_img1'])){
				$delsql = "DELETE FROM product WHERE product_id=$id";
				if(mysqli_query($connection, $delsql)){
					header("location:products.php");
				}
			}
		}else{
			$delsql = "DELETE FROM product WHERE product_id=$id";
				if(mysqli_query($connection, $delsql)){
					header("location:products.php");
				}
		}

	}else{
		header('location: products.php');
	}