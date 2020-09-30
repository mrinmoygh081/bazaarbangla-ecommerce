<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['productname']);
		$description = mysqli_real_escape_string($connection, $_POST['productdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['productcategory']);
		$price = mysqli_real_escape_string($connection, $_POST['productprice']);
        $post_image1 = $_FILES['image1']['name'];
	    $post_image_temp1 = $_FILES['image1']['tmp_name'];
		$post_image2 = $_FILES['image2']['name'];
	    $post_image_temp2 = $_FILES['image2']['tmp_name'];
	    $post_image3 = $_FILES['image3']['name'];
		$post_image_temp3 = $_FILES['image3']['tmp_name'];
		
		$product_tag = $_POST['product_tag'];
        move_uploaded_file($post_image_temp1, "../assets/products/$post_image1");
		move_uploaded_file($post_image_temp2, "../assets/products/$post_image2");
		move_uploaded_file($post_image_temp3, "../assets/products/$post_image3");
		
		$query = "INSERT INTO product(product_title, product_price, product_img1, product_img2, product_img3, product_category_id, product_descibtion, product_tags) ";
	
$query .= "VALUES('{$prodname}','{$price}','{$post_image1}','{$post_image2}','{$post_image3}','{$category}','{$description}', '{$product_tag}' ) ";
	
	
$create_post_query = mysqli_query($connection, $query);	


	
		
		
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<form method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="Productname">Product Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Product Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Product Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
				  <option value="">---SELECT CATEGORY---</option>
				  <?php 	
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<option value="<?php echo $r['category_id']; ?>"><?php echo $r['category_title']; ?></option>
				<?php } ?>
				</select>
			  </div>
			  

			  <div class="form-group">
			    <label for="productprice">Product Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
			  </div>
			  <div class="form-group">
			    <label for="productim1">Product Image</label>
			    <input type="file" name="image1" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div> 
		    <div class="form-group">
			    <label for="productimg2">Product Image</label>
			    <input type="file" name="image2" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			   <div class="form-group">
			    <label for="productim3">Product Image</label>
			    <input type="file" name="image3" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			   <div class="form-group">
			    <label for="product_tag">Product Tags</label>
			    <input type="text" name="product_tag" class="form-control">
			  </div>
			  
			  
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
