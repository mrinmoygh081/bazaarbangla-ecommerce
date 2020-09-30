<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php 
    if(isset($_POST['checkBoxArray'])){
	foreach($_POST['checkBoxArray'] as $orderValueId){
		$bulk_options = $_POST['bulk_options'];

		switch($bulk_options) {                    
			case 'Delete':
			$query = "DELETE FROM orders WHERE order_id = {$orderValueId} ";
			$delete_orders = mysqli_query($connection, $query);
			if (!$delete_orders) {
				die("Falied " . mysqli_error($connection));
			}
			break;
			
			case $bulk_options:
			$query = "UPDATE orders SET ";
			$query .= "deliveryboy_id = '{$bulk_options}' ";
			$query .= "WHERE order_id = {$orderValueId} ";
			
			$update_delivery_boy = mysqli_query($connection, $query);
			if (!$update_delivery_boy) {
				die("Falied " . mysqli_error($connection));
			}
			break;
					
				
			}
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<form action="" method="post">
			<table class="table table-bordered table-striped">
				<div id="bulkOptionsContainer" class="col-xs-4">
					<select class="form-control" name="bulk_options" id="">
						<option value="">Select Options</option>
						<?php 
						$query = "SELECT * FROM deliveryboy";
						$delivery_boys = mysqli_query($connection, $query);

						while ($row = mysqli_fetch_assoc($delivery_boys)) {
							$boy_id = $row['deliveryboy_id'];
							$boy_name = $row['deliveryboy_name']; 
							?>

							<option value="<?php echo $boy_id; ?>"> <?php echo $boy_name; ?> </option>
					
							<?php
						}
						?>
						<option value="Delete">Delete</option>
					</select>
				</div>
				<div class="col-xs-4">
					<input type="submit" name="submit" class="btn btn-success" value="Apply">
				</div>
				<thead>
					<tr>
						<th><input type="checkbox" id="selectAllBox"></th>
						<th>Order Id</th>
						<th>Customer Name</th>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Payment Mode</th>
						<th>Order Placed On</th>
						<th>Address</th>
						<th>Mobile no</th>
						<th>Delete</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT orders.order_id, orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.user_id, usermeta.name, usermeta.address1, usermeta.mobile FROM orders LEFT JOIN usermeta ON orders.user_id = usermeta.user_id ORDER BY orders.order_id DESC";
				$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
						$the_order_id =  $r['order_id'];
				?>
					<tr>
						<td><input type='checkbox' name='checkBoxArray[]' value='<?php echo $the_order_id; ?>'  class='checkBoxes'></td>
						<th scope="row"><?php echo $the_order_id ?></th>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['totalprice']; ?></td>
						<td><?php echo $r['orderstatus']; ?></td>
						<td><?php echo $r['paymentmode']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						<td><?php echo $r['address1']; ?></td>
						<td><?php echo $r['mobile']; ?></td>
						<td><a onClick= "javascript: return confirm('Are you sure you want to delete?')" href='orders.php?delete=<?php echo $the_order_id;?>'>Delete</a></td>
						<td><a href="view.php?id=<?php echo $the_order_id ?>">View</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			</form>
		</div>
	</div>

</section>

<?php include 'inc/footer.php' ?>
<?php 
    if(isset($_GET['delete'])) {
        $the_order_id = $_GET['delete'];
        $query = "DELETE FROM orders WHERE order_id = {$the_order_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: orders.php");
    }
?>
