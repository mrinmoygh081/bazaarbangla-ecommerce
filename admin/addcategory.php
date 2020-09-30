<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
	      $categoryname = mysqli_real_escape_string($connection, $_POST['categoryname']);
          $categoryimage = $_FILES['productimage']['name'];
	    $cat_image_temp = $_FILES['productimage']['tmp_name'];
        move_uploaded_file($cat_image_temp, "../assets/category/$categoryimage");
		$sql = "INSERT INTO category (category_title, category_img) VALUES ('{$categoryname}', '{$categoryimage}')";
		
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Category Added";
		}else{
			$fmsg = "Failed Add Category";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<form method="post"  enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="Productname">Category Name</label>
			    <input type="text" class="form-control" name="categoryname" id="Categoryname" placeholder="Category Name">
			  </div>
			   <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
