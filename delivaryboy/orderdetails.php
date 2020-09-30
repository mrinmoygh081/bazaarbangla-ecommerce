<?php
	session_start();
	require_once 'inc/db.php';
require_once 'inc/header.php';
	if(!isset($_SESSION['useremail'])) {
	header("location: login.php");
	}


?>

<div>
<div class="bg-success text-white">
	<h2 class="text-center text-uppercase py-3">Billing Details</h2>
</div>
<div>
	<div class="container py-3">
		<?php 	
					
		if(isset($_POST['search'])) {
			$order_id = $_POST['orderId'];
		} elseif(isset($_GET['id'])) {
			$order_id =	$_GET['id'];
		}

		$sql = "SELECT orders.order_id, orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.user_id, usermeta.name, usermeta.address1, usermeta.mobile FROM orders LEFT JOIN usermeta ON orders.user_id = usermeta.user_id WHERE orders.order_id= '{$order_id}'";
		$res = mysqli_query($connection, $sql);

		while ($r = mysqli_fetch_assoc($res)) {
			if($r['totalprice'] <= 500){
				$delivery_charge = 20;
			}elseif($r['totalprice']>=500 && $r['totalprice']<=1000){
				$delivery_charge = 25;
			}elseif($r['totalprice']>=1000 && $r['totalprice']<=2000){
				$delivery_charge = 30;
			}else{
				$delivery_charge = 35;
			}
		?>
		<h3 class="text-left"> Name: <span class="text-success"> <?php echo $r['name']; ?> </span> </h3>
		<p class="txt"> Order Id: <span class="font-weight-bold"> <?php echo $r['order_id']; ?> </span></p>
		<p class="txt"> Mobile: <span class="font-weight-bold"> <?php echo $r['mobile']; ?> </span></p>
		<p class="txt"> Address: <span class="font-weight-bold"> <?php echo $r['address1']; ?> </span></p>
		<div class="table_list my-4">
			<h3 class="text-center"> <span> Customer Orders </span> </h3>
			<table class="table table-bordered table-striped table-hover text-center">
				<tr>
					<th scope="col">Products</th>
					<th scope="col">Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Price</th>
				</tr>
		<?php
			$_SESSION['total'] = 0;
			$sql = "SELECT orderitem.order_id, orderitem.product_quantity, orderitem.product_price, orderitem.product_id, product.product_title FROM orderitem LEFT JOIN product ON orderitem.product_id = product.product_id WHERE orderitem.order_id= '$order_id'";
				$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
						
				?>
				<tr>
				
				
					<td><?php echo $r['product_title']; ?></td>
					<td>&#8377;<span><?php echo $r['product_price']; ?></span></td>
					<td><?php echo $r['product_quantity']; ?></td>
					<td>&#8377;<span><?php $total=$r['product_quantity'] * $r['product_price']; 
						echo $total ;?></span></td>
				</tr>
				
				<?php 
					$_SESSION['total'] = $total+$_SESSION['total'];
					} ?>
				
			</table>
		</div>
		<div>
			<table class="table table-bordered table-striped table-hover text-center">
				<tr>
					<th>Subtotal</th>
					<th>Delivery Charge</th>
					<th>Final Price</th>
				</tr>
				<tr>
					<td>&#8377;<span><?php echo $_SESSION['total']; ?></span></td>
					<td>&#8377;<span><?php echo $delivery_charge; ?></span></td>
					<td>&#8377;<span><?php echo $_SESSION['total'] + $delivery_charge; ?></span></td>
				</tr>
			</table>
		</div>
		<div class="text-center">
			<p class="text-danger txt">If you deliver the products and collect the money then enter the receiver name & click the below button. </p>
			<?php 
			if(isset($_POST['done'])){
				$status = $_POST['status'];
			    $receiver = $_POST['receiver'];
				$delivered_by = $_SESSION['username'];
			$qstatus = "UPDATE orders SET orderstatus='$status',order_received_by='$receiver',order_delivered_by='$delivered_by'  WHERE order_id = $order_id";
		$qres = mysqli_query($connection, $qstatus);
			}
			?>
			
			
			<form method="post">
			<div class="from-group">
				
				<input type="hidden" value="order delivared" name="status">
			</div>
			<div class="form-group">
				<label style="font-size: 1.5rem;font-weight: 600;padding: 0 0 5px 0;color: #795548;" for="receiver">
					Receiver Name
				</label>
				<input style="border: 1px solid #4CAF50;" class="form-control" type="text"  name="receiver" required>
			</div>
			<button class="btn btn-danger btn-lg btn_deliver" type="submit" name="done">Delivered</button>
			</form>
		</div>
	<?php } ?>
	</div>
</div>
</div>
</body>
</html>