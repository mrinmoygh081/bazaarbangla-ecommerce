<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$notice_date = $_POST['notice_date'];


$notice_image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

$notice_post_by = $_POST['notice_post_by'];

$notice_contant = $_POST['notice_contant'];	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($image_temp, "../assets/img/notice/$notice_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO notice( notice_date, notice_image, notice_post_by, notice_contant ) ";
	
$query .= "VALUES('{$notice_date}','{$notice_image}','{$notice_post_by}','{$notice_contant}') ";
	
	
$create_notice_query = mysqli_query($connection, $query);	


	confirmQuery($create_notice_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<div class="form-group">
	<label for="notice_post_by">Notice Post By</label>
	<input type="text" class="form-control" name="notice_post_by">
</div>

<div class="form-group">
	<label for="notice_image">Notice Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="notice_contant">Notice Content</label>
	 <textarea  rows="8" cols="45" name="notice_contant"></textarea>
</div>


<div class="form-group">
	<label for="notice_date">Notice Date</label>
	<input type="date" class="form-control" name="notice_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>