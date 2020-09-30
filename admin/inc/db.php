<?php ob_start();

$db['DB_HOST'] = "localhost";
$db['DB_USER'] = "root";
$db['DB_PASS'] ="";
$db['DB_NAME'] ="b_bazar";

foreach($db as $key => $value){
	
define (strtoupper ($key), $value);

}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connection){
	echo "not connect";
}
$query = "SET NAMES utf8";
mysqli_query($connection,$query);

?>