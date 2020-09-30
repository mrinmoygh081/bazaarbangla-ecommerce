
   
   <?php include "includes/admin_header.php";?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
                Welcome admin panel
                <small><?php echo $_SESSION['username'];?></small>
            </h1>
            
<!--
		   <small><?php echo $_SESSION['username'] ?>
		  </small>
-->
		
		
	</div>
</div>
<!-- row-->
				
				
				       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                       
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query = "SELECT * FROM product";
$select_all_products = mysqli_query($connection, $query);
$products_count = mysqli_num_rows($select_all_products);
echo "<div class='huge'>{$products_count}</div>"

?>
                    
                  
                        <div><h4>Products</h4></div>
                    </div>
                </div>
            </div>
            <a href="product.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
$query = "SELECT * FROM category";
$select_all_category = mysqli_query($connection, $query);
$category_count = mysqli_num_rows($select_all_category);
echo "<div class='huge'>{$category_count}</div>"

?>
                      <div><h4>Category</h4></div>
                    </div>
                </div>
            </div>
            <a href="category.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
     <div class="col-lg-4 col-md-6">
        <div class="panel panel-ylow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-picture fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
$query = "SELECT * FROM orders";
$select_all_orders = mysqli_query($connection, $query);
$orders_count = mysqli_num_rows($select_all_orders);
echo "<div class='huge'>{$orders_count}</div>"

?>
                      <div><h4>Orders</h4></div>
                    </div>
                </div>
            </div>
            <a href="orders.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
       <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-film fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
$query = "SELECT * FROM user";
$select_all_user = mysqli_query($connection, $query);
$user_count = mysqli_num_rows($select_all_user);
echo "<div class='huge'>{$user_count}</div>"

?>
                         <div><h4>Customers</h4></div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="glyphicon glyphicon-facetime-video fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
$query = "SELECT * FROM deliveryboy";
$select_all_deliveryboy = mysqli_query($connection, $query);
$deliveryboy_count = mysqli_num_rows($select_all_deliveryboy);
echo "<div class='huge'>{$deliveryboy_count}</div>"

?>
                         <div><h4>Delivery boy</h4></div>
                    </div>
                </div>
            </div>
            <a href="deliveryboy.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> 
  
  
        
          
            
                
                
                  
                    
   

</div>
                <!-- /.row -->
                
              
            
			   </div> 
			</div>      
            
		
                
          
				
			</div>
			
				<!-- container-->
		</div>
	
		 <?php include "includes/admin_footer.php" ?>
        
