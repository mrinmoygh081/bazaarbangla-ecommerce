<?php
     session_start();
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
	require_once 'inc/db.php';
    if(isset($_GET['id'])){
	$order_id = $_GET['id'];
     }

include 'inc/header.php';
include 'inc/nav.php';
?>
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT orderitem.order_id, orderitem.product_quantity, orderitem.product_price, orderitem.product_id, product.product_title FROM orderitem LEFT JOIN product ON orderitem.product_id = product.product_id WHERE orderitem.order_id= '$order_id'";
				$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['order_id']; ?></th>
						<td><?php echo $r['product_title']; ?></td>
						<td><?php echo $r['product_price']; ?></td>
						<td><?php echo $r['product_quantity']; ?></td>
						
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
