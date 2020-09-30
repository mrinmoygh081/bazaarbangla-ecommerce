<!--complete-->
<?php
session_start();
ob_start();
require_once 'inc/db.php';
if(!isset($_SESSION['useremail'])) {

header("location: login.php");
}


?>



<?php include 'inc/header.php'; ?><!-- add header -->
<div class="container">
<div style="padding: 15px;">
<form class="delivery-form" action="" method="post">
	<div class="delivery-label">
		<label> Enter Order ID </label>
	</div>
	<div class="wrap-input">
		<span class="label-input"> Order ID </span>
		<input class="input" type="text" name="orderId" placeholder="Enter Order ID" required>
	</div>
	<div class="container-login-form-btn my-3">
		<button class="login-form-btn" name="submit"> Submit </button>
	</div>
</form>
</div>

<section>
<div class="container-fluid">
	<div class="table_list">
		<table class="table table-striped table-bordered table-dark text-center">
			<thead class="text-center">
				<tr>
					<th scope="col"> Order ID </th>
					<th scope="col"> Customer Name </th>
					<th scope="col"> Mobile </th>
					<th scope="col"> Order Status </th>
					<th scope="col"> Address </th>
					<th scope="col"> View </th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(isset($_POST['submit'])) {
							$delivery_id =  $_SESSION['delivery_id'];
							$orderId = $_POST['orderId'];

							$sql = "SELECT orders.order_id, orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.user_id, usermeta.name, usermeta.address1, usermeta.mobile ";
							$sql .= "FROM orders LEFT JOIN usermeta ON orders.user_id = usermeta.user_id WHERE orders.deliveryboy_id = '$delivery_id' && orders.order_id = '$orderId'";

							$res = mysqli_query($connection, $sql); 
							while ($r = mysqli_fetch_assoc($res)) {
						?>
						<tr>
							<th scope="row"><?php echo $r['order_id']; ?></th>
							<td><?php echo $r['name']; ?></td>
							<td><?php echo $r['mobile']; ?></td>
							<td><?php echo $r['orderstatus']; ?></td>
							<td><?php echo $r['address1']; ?></td>
							<td><a href="orderdetails.php?id=<?php echo $r['order_id']; ?>"> View </a></td>
						</tr>
						<?php
						 } }

					 else {

					
					$delivery_id =  $_SESSION['delivery_id'];
					$sql = "SELECT orders.order_id, orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.user_id, usermeta.name, usermeta.address1, usermeta.mobile FROM orders LEFT JOIN usermeta ON orders.user_id = usermeta.user_id WHERE orders.deliveryboy_id = '$delivery_id' ";

					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
				<tr>
					<th scope="row"><?php echo $r['order_id']; ?></th>
					<td><?php echo $r['name']; ?></td>
					<td><?php echo $r['mobile']; ?></td>
					<td><?php echo $r['orderstatus']; ?></td>
					<td><?php echo $r['address1']; ?></td>
					<td><a href="orderdetails.php?id=<?php echo $r['order_id']; ?>"> View </a></td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>	
</div>
</section>
</div>
<?php  require_once "inc/footer.php";?>