<?php

if(isset($_POST['create_post'])  && $_POST['randcheck']==$_SESSION['rand']) {
	

$blogs_title = $_POST['blogs_title'];
$blogs_contant = $_POST['blogs_contant'];
$blogs_image = $_FILES['image']['name'];
$blogs_image_temp = $_FILES['image']['tmp_name'];

$blogs_date = $_POST['blogs_date'];

	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($blogs_image_temp, "../assets/img/blog/$blogs_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO blogs( blogs_title, blogs_contant, blogs_image, blogs_date ) ";
	
$query .= "VALUES('{$blogs_title}','{$blogs_contant}','{$blogs_image}','{$blogs_date}') ";
	
	
$create_blogs_query = mysqli_query($connection, $query);	


	confirmQuery($create_blogs_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
<div class="form-group">

	<label for="blogs_title">blogs_title</label>
	<input type="text" class="form-control" name="blogs_title">
</div>
<div class="form-group">
	<label for="blogs_contant">blogs_contant</label>
	 <textarea  rows="8" cols="45" name="blogs_contant"></textarea>
	
</div>



<div class="form-group">
	<label for="blogs_image">blogs_image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="blogs_date">Upload Date</label>
	<input type="date" class="form-control" name="blogs_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>