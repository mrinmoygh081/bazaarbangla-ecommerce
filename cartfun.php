<?php 
session_start();
if(isset($_GET['dlt']) & !empty($_GET['dlt'])) {
	$dlt = $_GET['dlt'];
	unset($_SESSION['cart'][$dlt]);
	header("location: cart.php");
}


if(isset($_POST) & !empty($_POST)){
	$id = $_POST['id'];
	if(isset($_POST['quantity']) & !empty($_POST['quantity'])){
		$quantity = $_POST['quantity'];
	}else{
		$quantity = 1;
	}
	
	$_SESSION['cart'][$id] = array("quantity" => $quantity);
}else{
	header("location: cart.php");
	}

header("location: cart.php");


if(isset($_POST['minus']) & !empty($_POST['minus'])){
	$id = $_POST['id'];
	if(isset($_POST['quantity']) & !empty($_POST['quantity'])){
		$quantity = $_POST['quantity'];
	}else{
		$quantity = 1;
	}
	
	$_SESSION['cart'][$id] = array("quantity" => $quantity);
}else{
	header("location: cart.php");
	}

header("location: cart.php");

?>