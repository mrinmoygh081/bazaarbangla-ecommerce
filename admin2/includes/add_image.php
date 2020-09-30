<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$image_title = $_POST['image_title'];

$image_cat = $_POST['image_cat'];
$image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

$image_date = $_POST['image_date'];

$image_about = $_POST['image_about'];	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($image_temp, "../assets/img/gallery/small/$image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO images( image_title, image_cat, image, image_date, image_about ) ";
	
$query .= "VALUES('{$image_title}','{$image_cat}','{$image}','{$image_date}','{$image_about}') ";
	
	
$create_image_query = mysqli_query($connection, $query);	


	confirmQuery($create_image_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<div class="form-group">
	<label for="image_title">Image Title</label>
	<input type="text" class="form-control" name="image_title">
</div>

<div class="form-group">
	<label for="image_cat">Image Categories</label>
<select name="image_cat" >
<option value="">Select Option</option>
<option value="lab">lab</option>
<option value="classroom">classroom</option>
<option value="others">others
</option>
<option value="cafe">cafe</option>
<option value="library">library</option>
	
</select>
</div>


<div class="form-group">
	<label for="image">Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="image_about">About Image</label>
	<input type="text" class="form-control" name="image_about">
</div>
<div class="form-group">
	<label for="image_date">Upload Date</label>
	<input type="date" class="form-control" name="image_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>