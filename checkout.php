
<?php
require_once 'includes/db.php';

require_once "includes/header.php"; ?>

<?php



	if(!isset($_SESSION['customername']) & empty($_SESSION['customername'])){
		header('location: login.php');
	}
   
?>
   
   
   
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

<?php
$user_id = $_SESSION['customerid'];
if(!isset($_SESSION['cart'])){
	$cart = "";
	header ("location: cart.php");
}else{
$cart = $_SESSION['cart'];
}
if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$name = $_POST['name'];

$phone = $_POST['phone'];
$altphone = $_POST['altphone'];

$area = $_POST['area'];
$landmark = $_POST['landmark'];


$pin = $_POST['pin'];
$payment = $_POST['payment'];
	$sql = "SELECT * FROM usermeta WHERE user_id='$user_id'";
	$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($res);
	$r = mysqli_fetch_assoc ($res);
	if($count == 1) {
		
		$usql = "UPDATE usermeta SET name='$name', address1='$area', mobile2='$altphone', mobile='$phone', zip='$pin', nearby='$landmark' WHERE user_id = $user_id";
		$res = mysqli_query($connection, $usql);
		if($res){
		$total = 0;
				foreach ($cart as $key => $value) {
					$key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM product WHERE product_id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);

					$total = $total + ($ordr['product_price']*$value['quantity']);
				}
                 if(!isset($_SESSION['cart'])){
					header ("location: index.php");
				 }else{
				 $iosql = "INSERT INTO orders (user_id, totalprice, orderstatus, paymentmode) VALUES ('$user_id', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					//echo "Order inserted, insert order items <br>";
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$ordsql = "SELECT * FROM product WHERE product_id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['product_id'];
						$productprice = $ordr['product_price'];
						$quantity = $value['quantity'];


					echo	$orditmsql = "INSERT INTO orderitem (product_id, order_id, product_price, product_quantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
						//if($orditmres){
							//echo "Order Item inserted redirect to my account page <br>";
						//}
					}
				} }
				unset($_SESSION['cart']);
				header("location: account.php");
		
		
	}

}else {
$query = "INSERT INTO usermeta( user_id, name, address1,  mobile2, mobile, zip, nearby ) ";
	
$query .= "VALUES('{$user_id}','{$name}', '{$area}','{$altphone}', '{$phone}', '{$pin}', '{$landmark}') ";
	
	
$create_email_query = mysqli_query($connection, $query);	

}
}
$sql = "SELECT * FROM usermeta WHERE user_id='$user_id'";
	$res = mysqli_query($connection, $sql);
	$r = mysqli_fetch_assoc ($res);
?>      
    <!-- checkout -->
    <section style="margin: 25px;">
        <div class="container clear" style="border: 1px solid #ccc; padding-top: 25px;">
           <form action="" class="billing-form" method="post">
            <div class="col-md-8 col-sm-12" style="float: left;">
                <?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />   
                    <h3>Billing Details</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"> Full Name <span data-toggle="tooltip" title="Required!">*</span></label>
                                <input type="text" name="name" required  value=" <?php echo $r['name']; ?> ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number<span data-toggle="tooltip" title="Required!">*</span></label>
                                <input type="text" name="phone" required  value="<?php echo $r['mobile']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="altphone">Alternate Phone Number (Optional) </label>
                                <input type="text" name="altphone" value=" <?php echo $r['mobile2']; ?> ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="area"> Colony, Area, Road Name <span data-toggle="tooltip" title="Required!">*</span></label>
                                <input type="text" name="area" required value=" <?php echo $r['address1']; ?> ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="landmark"> Landmark (Optional) </label>
                                <input type="text" name="landmark" value=" <?php echo $r['nearby']; ?> ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="town">Town / City</label>
                                <input type="text" name="town" value="Malda" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pin"> Pincode / ZIP <span data-toggle="tooltip" title="Required!">*</span> </label>
                                <input type="text" name="pin" required value=" <?php echo $r['zip']; ?> ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state"> State </label>
                                <input type="text" name="state" value="West Bengal" readonly>
                            </div>
                        </div>
                    </div>
               
            </div>
            <div class="col-md-4 col-sm-12" style="float: left; padding-top: 20px;">
                <div class="row clear">
                    <div class="col-md-12 d-flex clear">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>&#8377;
							<?php echo $_SESSION['total'];
									?>
                           
                           </span>
                            </p>
                            <p class="d-flex">
                                <span>Delivery</span>
                                <span>&#8377;
                                <?php
									echo $_SESSION['delivary'];
									?></span>
                            </p>
                            <p class="d-flex">
                                <span>Discount</span>
                                <span>&#8377;
								 <?php
									echo $_SESSION['dis'];
									?></span>
                            </p>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>&#8377;
                                <?php
									echo $_SESSION['totalprice'];
									?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 clear">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <input type="radio" name="payment" id="cash" value="cod" checked style="display: inline">
                                        <label for="cash" style="display: inline"> Cash On Delivery </label><br>
                                        <!-- <input type="radio" name="payment" id="credit" value="credit">
                                        <label for="credit"> Credit Cards </label><br>
                                        <input type="radio" name="payment" id="paytm" value="paytm">
                                        <label for="paytm"> Paytm </label><br>
                                        <input type="radio" name="payment" id="gpay" value="gpay">
                                        <label for="gpay"> Google Pay </label> -->
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit"  class="btn btn-primary btn-green py-3 px-4" value="Place Order">
                        </div>
                    </div>
                </div>
            </div>
			</form>
     
        </div>
    </section>
    <!-- /checkout -->

   <?php require_once "includes/footer.php"; ?>