<?php 
session_start();
if(isset($_GET) & !empty($_GET)){
	$id = $_GET['id'];
	if(isset($_GET['quantity']) & !empty($_GET['quantity'])){
		$quantity = $_GET['quantity'];
	}else{
		$quantity = 1;
	}
	
	$_SESSION['cart'][$id] = array("quantity" => $quantity);
}else{
	header("location: cart.php");
	}

header("location: index.php");
?>