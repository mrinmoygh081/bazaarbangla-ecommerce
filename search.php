
  <?php require_once "includes/db.php"; ?>

  <?php require_once "includes/header.php"; ?>
  
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- main -->
   

    <main id="main">
        
        <!-- Top Selling Product -->

        <section class="content-box-md">
            <div class="container-fluid">
                <div class="container topSelling">
                   <div class="row">
                    <?php
                    if(isset($_POST['submit']) && !empty($_POST['search'])){
                        $search = $_POST['search'];
                        $query = "SELECT * FROM product WHERE product_tags LIKE '%$search%'";
                        $search_query = mysqli_query($connection, $query);
                        
                        $count = mysqli_num_rows($search_query);
                        

                        if($count == 0){
                            echo "<h5>No Product Found</h5>";
                        } else{
                            while($row=mysqli_fetch_assoc($search_query)){

                    ?>
        
                    <div class="col-md-3 col-sm-6 col-6 d-flex p-0">
                        <div class="product">
                            <div class="products_details">
                                <div class="products_details_div">
                                    <a href="productsingle.php?product_id=<?php echo $row['product_id']; ?>">
                                        <img src="./assets/products/<?php echo $row['product_img1']; ?>" class="img-fluid">
                                        <div class="price">
                                            <h5>&#8377;<?php echo $row['product_price']; ?></h5>
                                            <p><?php echo $row['product_title']; ?></p>
                                            <p><?php echo $row['product_weight']; ?></p>
                                        </div>
                                    </a>
                                    <a href="addtocart.php?id=<?php echo $row['product_id'];?>">
                                        <div class="add clear">
                                            <div class="add_cart">ADD</div>
                                            <div class="add_plus">+</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>      
                       
 <?php  }}} ?>
                       
                        
                </div>
                    </div>
                </div>
        </section>

        <!-- /Top Selling Product -->

    </main>

    <!-- /main -->

    <!-- footer  -->

   <?php require_once "includes/footer.php"; ?>