<?php require_once "includes/header.php"; ?>
   <?php require_once "includes/db.php"; ?>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- main -->

    <main id="main">
        <!-- First Slider -->
        
        <div class="container-fluid">
            <!-- <h2 style="padding: 18px 0 0 28px;"> Our Categories</h2> -->
            <div class="site-slider-one px-md-4">
                <div class="row slider-one text-center">
                    <?php 
					
					$query = "SELECT * FROM category";
					$select_all_category = mysqli_query($connection, $query); 
					while ($r = mysqli_fetch_assoc($select_all_category)) {
				?>
                  
                    <div class="col-md-12 category pt-md-5 pt-4">
                       <a href="index.php?category_id=<?php echo $r['category_id'];?>">
                        <img src="./assets/category/<?php echo $r['category_img']; ?>" alt="category 1">
                        <a href="index.php?category_id=<?php echo $r['category_id'];?>" class="catygory_name"><?php echo $r['category_title']; ?> </a>
                        
						</a>
                    </div>
                 
                    <?php  }?>
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fa fa-chevron-left fa-2x i-size"></i></span>
                    <span class="next position-top right-0"><i class="fa fa-chevron-right fa-2x i-size"></i></span>
                </div>
            </div>
        </div>
        
        <!-- /First Slider -->

        <!-- Second Slider -->
        <?php 
					if(isset($_GET['category_id']) & !empty($_GET['category_id'])){
						
						
					}else{ ?>
						 <div class="container-fluid" style="margin-top: 20px;">
            <div class="site-slider-two">
                <div class="slider-two">
                    <div>
                        <img src="./assets/slides/slide0.jpg" class="img-fluid" alt="Banner">
                    </div>
                    <div>
                        <img src="./assets/slides/slide2.jpg" class="img-fluid" alt="Banner">
                    </div>
                    <div>
                        <img src="./assets/slides/slide3.jpg" class="img-fluid" alt="Banner">
                    </div>
                </div>
                <div class="slider-btn">
                    <span class="prev position-top"><i class="fa fa-chevron-left"></i></span>
                    <span class="next position-top right-0"><i class="fa fa-chevron-right"></i></span>
                </div>
            </div>
        </div>
					
       <?php }  ?>

        <!-- /Second Slider -->

        <!-- Top Selling Product -->

        <section class="content-box-md">
            <div class="container-fluid">
                <div class="container topSelling">
                    <div class="d-flex">
                        <?php 
                        if(isset($_GET['category_id']) & !empty($_GET['category_id'])){
                            $category_id =$_GET['category_id']; 
                        $query = "SELECT * FROM category WHERE category_id = '$category_id'";
                        $select_all_category = mysqli_query($connection, $query); 
                        while ($r = mysqli_fetch_assoc($select_all_category)) {
                    ?>
                    
                    <hr>
                    <h3 class="col-md-8 col-sm-8 text-uppercase"><?php echo $r['category_title'];?></h3>

				<?php	}}else{ ?>
                        <hr>
						<h3 class="col-md-8 col-sm-8 text-uppercase" style="font-size: 1.5rem;">Top Selling Product</h3>
				<?php	}
                       ?>
                        
                        <!-- <div class="col-md-4 col-sm-4 text-right btn-seeAll">
                            <a href="seeAll.html" class="btn btn-primary">See All</a>
                        </div> -->
                    </div>

                    <div class="row">
                       <?php 	
					$query = "SELECT * FROM product ";
						if(isset($_GET['category_id']) & !empty($_GET['category_id'])){
							$category_id =$_GET['category_id']; 
							$query .= " WHERE product_category_id='$category_id'";
						}
						$query .= "ORDER BY rand()";
					$select_all_product = mysqli_query($connection, $query); 
					while ($r = mysqli_fetch_assoc($select_all_product)) {
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
                       
                        <?php } ?>
                       
                       
                        
                       
                    </div>
                </div>
            </div>
        </section>

        <!-- /Top Selling Product -->

    </main>

    <!-- /main -->

    <!-- footer  -->

   <?php require_once "includes/footer.php"; ?>