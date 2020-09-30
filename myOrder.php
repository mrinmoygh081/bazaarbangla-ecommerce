<?php require_once "includes/db.php"; 

  require_once "includes/header.php"; 
  
   require_once "includes/navigation.php"; ?>
<?php
	if(!isset($_SESSION['customername']) & empty($_SESSION['customername'])){
		header('location: login.php');
	}
  $customer_id = $_SESSION['customerid']; 
?>
   
  
    <!-- /nav
	<!-- add header -->
	<div>
		<div class="bg-success text-white">
			<h2 class="text-center text-uppercase py-3 m-0">My Order</h2>
		</div>
		<div>
		<?php
			$query = "SELECT * FROM orders WHERE user_id = $customer_id && orderstatus= 'Order Placed' ORDER BY order_id DESC";
			$order_query = mysqli_query($connection, $query);
			while($ro = mysqli_fetch_assoc($order_query)){
				$order_id = $ro['order_id'];
				?>
				
							
			<div class="container py-3">
				<div class="table_list my-4">
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
					while($row = mysqli_fetch_assoc($res)){
						
				?>
						<tr>
							<td><?php echo $row['product_title']; ?></td>
					<td>&#8377;<span><?php echo $row['product_price']; ?></span></td>
					<td><?php echo $row['product_quantity']; ?></td>
					<td>&#8377;<span><?php $total=$row['product_quantity'] * $row['product_price']; 
						echo $total ;?></span></td>
						</tr>
						<?php 
					$_SESSION['total'] = $total+$_SESSION['total'];
					}
					 ?>
				

					</table>
				</div>
				<div>
					<table class="table table-bordered table-striped table-hover text-center table-dark">
						<tr>
							<th>Subtotal</th>
							<th>Delivery Charge</th>
							<th>Discount</th>
							<th>Final Price</th>
						</tr>
						<tr>
							<td>&#8377;<span><?php echo $_SESSION['total']; ?></span></td>
					<td>&#8377;<span><?php  
						
						if($_SESSION['total']<=1000){
							$delivary = 20;
							echo $delivary;
						}else{
							$delivary = ($_SESSION['total']*2)/100;
							echo $delivary;
						}
			           
						?></span>
						</td>
						<td>&#8377;
							<span><?php
								$discount = ($_SESSION['total']*1)/100;
				                  echo $discount;
							?></span>
						</td>
						<td>
							&#8377;<span><?php echo ($_SESSION['total'] + $delivary)-$discount; ?></span>
						</td>
						</tr>
					</table>
				</div>
			</div>
				
				
		<?php
			}
			?>
			<h5 class="bg-danger text-white text-center p-2 m-0 order_warnings"> Your order has been delivared successfully. </h5>
				<?php	
			
			?>
			
				
			
			

		</div>
	</div>
<?php require_once "includes/footer.php";  ?>