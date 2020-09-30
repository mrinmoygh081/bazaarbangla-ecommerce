 <?php
require_once "includes/db.php";?>
 <?php require_once "includes/header.php";?>
  
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php";?>

    <!-- /navbar -->


    <!-- Feature Single Product -->

    <section class="container">
        <div class="row d-flex" style="margin: 30px 0;">

           <?php
if (isset($_GET['product_id']) & !empty($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
	$query = "SELECT * FROM product WHERE product_id = '$product_id'";
	$singal_product = mysqli_query($connection, $query);
	$r = mysqli_fetch_assoc($singal_product);
}

?>


            <div class="col-md-6 col-sm-12 col-12 miniP-0">
                <div style="width: 100%; margin: 0 auto;">
                    <div class="singleProductCarousel">
                        <div class="slider">
                            <div>
                                <img src="./assets/products/<?php echo $r['product_img1']; ?>" class="img-fluid" alt="Banner">
                            </div>
                            <div>
                                <img src="./assets/products/<?php echo $r['product_img2']; ?>" class="img-fluid" alt="Banner">
                            </div>
                            <div>
                                <img src="./assets/products/<?php echo $r['product_img3']; ?>" class="img-fluid" alt="Banner">
                            </div>
                        </div>
                        <div class="slider-btn">
                            <span class="prev position-top"><i class="fa fa-chevron-left"></i></span>
                            <span class="next position-top right-0"><i class="fa fa-chevron-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12 col-12 text-justify singleProduct" style="border: 1px solid #ccc; padding: 10px 20px;">

                <div class="singleProductDetails">
                    <h3 style="font-size: 30px;"><?php echo $r['product_title']; ?></h3>
                    <p class="rupees">
                        &#8377;<span><?php echo $r['product_price']; ?></span>
                    </p>
                    <p>
                       <?php echo $r['product_descibtion']; ?>
                    </p>

                    <div class="clear">

<!--
                       <div>
                       	<button class="cal"><span onclick="plus()" class="p-2">+</span></button>
    					<button class="cal" style="width: 200px;"><span id="value" class="p-2"> Add to Cart </span> </button>
    					<button class="cal"><span onclick="minus()" class="p-2"> - </span></button>


                       </div>
-->
                       <form method="get" action="addtocart.php">
                        <div class="col-md-6" style="padding-left: 0;">
                           <div>
                            	<input class="form-group" type="hidden"  name="id" value="<?php echo $r['product_id']; ?>">
                           </div>
                           <div class="form-group">
                           	 <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="3"
                                style="text-align: center; width: 90%;" placeholder="Enter Quantity">
                           </div>
                           <div class="single_product_cart">
                        	 <input type="submit"  name="submit" value="Add to Cart" class="btn btn-success btn-lg">
                    	    </div>
                        </div>
                        </form>


                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- /Feature Single Product -->

    <!-- related product -->

    <section class="content-box-md">
        <div class="container-fluid">
            <div class="container topSelling">
                <div class="d-flex">
                    <h3 class="col-md-8 col-sm-8 text-uppercase">Related Product</h3>
                    <div class="col-md-4 col-sm-4 text-right btn-seeAll">
                        <a href="seeAll.html" class="btn btn-primary">See All</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php

$query = "SELECT * FROM product WHERE product_category_id = '{$r['product_category_id']}' AND product_id != '{$r['product_id']}' ORDER BY rand() LIMIT 4";
$singal_product = mysqli_query($connection, $query);
while ($r = mysqli_fetch_assoc($singal_product)) {
	?>
                    <div class="col-md-3 col-sm-6 col-6 d-flex p-0">
                        <div class="product">
                            <div class="products_details">
                                <div class="products_details_div">
                                    <a href="productsingle.php?product_id=<?php echo $r['product_id']; ?>">
                                        <img src="./assets/products/<?php echo $r['product_img1']; ?>" class="img-fluid">
                                        <div class="price">
                                            <h5>&#8377;<?php echo $r['product_price']; ?></h5>
                                            <p><?php echo $r['product_title']; ?></p>
                                            <p><?php echo $r['product_weight']; ?></p>
                                        </div>
                                    </a>
                                    <a href="addtocart.php?id=<?php echo $r['product_id'];?>">
                                        <div class="add clear">
                                            <div class="add_cart">ADD</div>
                                            <div class="add_plus">+</div>
                                        </div>
										</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   <?php }?>
                </div>
            </div>
        </div>
    </section>

    <!-- /related product -->

    <!-- footer  -->

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 d-flex footer-py">
                    <div class="col-md-6 col-6">
                        <div class="address">
                            <img src="./assets/logo/logoWhite.png">
                        </div>
                    </div>
                    <div class="col-md-6 col-6 address">
                        <h2>Delivery Location</h2>
                        <ul>
                            <li>Malda</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-12 d-flex footer-my p-0">
                    <div class="col-md-6 col-6 address">
                        <h2> Banglabazaar </h2>
                        <ul>
                            <li>About Us</li>
                            <li>Contact</li>
                            <li>Complain</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-6 address">
                        <h2>Helpline Number</h2>
                        <ul>
                            <li>8240491818</li>
                            <li>8617063982</li>
                            <li>
                                <!--  <i class="fa fa-envelope" aria-hidden="true"></i>--> something@gmail.com </li>
                        </ul>
                        <p>(24x7 Customers support Services)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /footer  -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>



   <?php require_once "includes/footer.php";?>