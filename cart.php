
<?php
require_once "includes/db.php"; 
require_once "includes/header.php";


if(!isset($_SESSION['cart'])){
	$cart = "";
}else{
$cart = $_SESSION['cart'];
}
?>
<style>
    .borderTable thead tr th {
        width: 50px;
    }
    .borderTable tbody tr td {
        width: 50px;
    }
    .borderTable tbody tr .quantity {
        width: 120px;
    }
</style>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- /header -->

    <!-- miniCart class="noneMiniCart" -->
    
    <section style="margin: 30px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12 cart-position" style="display: inline;">
                    <div class="cart-list">
                        <table class="table table-bordered borderTable">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Product</th>
                                    <!-- <th>Product name</th> -->
                                    <th>Price</th>
                                    <th style="width: 100px">Quantity</th>
                                    <!-- <th>Total</th>
                                    <th>&nbsp;</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
							if(!isset($_SESSION['cart'])){
								$total = 0;
								
	                           echo "";
							}else{
								$total = 0;
								foreach($cart as $key => $value){
									$cart = "SELECT * FROM product WHERE product_id='$key'";
									$query = mysqli_query($connection, $cart);
									$carres = mysqli_fetch_assoc($query);
								    $_SESSION['quantity']=$value['quantity'];
								?>
                                <tr>
                                    <td rowspan="2">
                                        <img src="./assets/products/<?php echo $carres['product_img1']; ?>" alt="" class="img img-fluid" width="100%">
                                        <h5><?php echo $carres['product_title']; ?></h5>
                                    </td>
                                    <td> &#8377;<?php echo $carres['product_price']; ?></td>
                                    <td>
                                        <form method="post" action="cartfun.php" style="display: inline">
                                            <input id="value" type="hidden" name="id" class="quantity form-control text-center" value="<?php echo $key;?>">
                                            <input id="value" type="hidden" name="quantity" class="quantity form-control text-center" value="<?php echo $value['quantity']-1;?>" min="1" max="3">
                                            <input type="submit" name="minus" value="-" style="width: 30px; background-color: #FF9800; color: white; border: none; border-radius: 10%; cursor: pointer; font-size: 32px;">
                                        </form>
                                
                                        <h3 style="display: inline; padding: 0 5px;"><?php echo $value['quantity']; ?></h3>
                                        <form method="post" action="cartfun.php" style="display: inline">
                                            <input id="value" type="hidden" name="id" class="quantity form-control text-center" value="<?php echo $key;?>">
                                            <input id="value" type="hidden" name="quantity" class="quantity form-control text-center" value="<?php echo $value['quantity']+1;?>" min="1" max="3">
                                            <input type="submit" name="plus" value="+" style="width: 30px; background-color: #4CAF50; color: white; border: none; border-radius: 10%; cursor: pointer; font-size: 32px;">
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h5 style="text-align: left; float: left;"> Total : &#8377;<?php echo $value['quantity']*$carres['product_price']; ?> </h5>
                                        <p style="text-align: right; margin-right: 10px;"><a href="cartfun.php?dlt=<?php echo $key;?>" style="padding: 6px 12px; color: #fff; background: red; font-size: 20px;"><i class="fa fa-times-circle"></i></a></p>
                                    </td>
                                </tr>
                                <?php
								$total = ($total + ($value['quantity']*$carres['product_price']));
                                } 
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12 cart-position">
                    <div class="cart-total">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>&#8377;<?php 
								if(!isset($total)){
								echo 0;	
								}else{
								$_SESSION['total'] = $total;
									echo $_SESSION['total'];
								}
								
								?></span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>&#8377;
                            <?php
								if(!isset($total)){
								echo 0;
								}elseif($total<=1000 && $total>=1) {
									$_SESSION['delivary'] = 20;
									echo $_SESSION['delivary'];
								}else{
									$_SESSION['delivary'] = ($_SESSION['total'] *2)/100;
									echo $_SESSION['delivary'];
								}
								?>
                            
                            </span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>&#8377;
                            <?php
								if(!isset($total)){
									$_SESSION['dis'] = 0;
								echo $_SESSION['dis'];	
								}else{
									$_SESSION['dis'] = $total/100;
									echo $_SESSION['dis'];
								}
								
								?>
                            
                            </span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>&#8377;
                            <?php
								$_SESSION['totalprice'] = ($_SESSION['total']-$_SESSION['dis'])+$_SESSION['delivary'];
								echo $_SESSION['totalprice'];
								?>
                            
                            
                            </span>
                        </p>
                    </div>
                    <p class="text-center"><a href="checkout.php" class="btn btn-green py-3 px-4">Proceed to
                            Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- /miniCart -->
<?php require_once "includes/footer.php"; ?>