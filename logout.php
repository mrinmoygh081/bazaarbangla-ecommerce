<?php
session_start();
unset($_SESSION['customer']);
unset($_SESSION['customername']);
header("location: login.php");


?>