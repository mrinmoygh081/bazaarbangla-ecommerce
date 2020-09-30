<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$achievement_heading = $_POST['achievement_heading'];


$achievement_image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

$achievement_date = $_POST['achievement_date'];

$achievement_content = $_POST['achievement_content'];	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($image_temp, "../assets/img/courses/achievement/$achievement_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO achievement( achievement_heading, achievement_image, achievement_date, achievement_content ) ";
	
$query .= "VALUES('{$achievement_heading}','{$achievement_image}','{$achievement_date}','{$achievement_content}') ";
	
	
$create_achievement_query = mysqli_query($connection, $query);	


	confirmQuery($create_achievement_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<div class="form-group">
	<label for="achievement_heading">Achievement Heading</label>
	<input type="text" class="form-control" name="achievement_heading">
</div>

<div class="form-group">
	<label for="achievement_image">Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="achievement_content">Achievement Content</label>
	 <textarea  rows="8" cols="45" name="achievement_content"></textarea>
</div>


<div class="form-group">
	<label for="achievement_date">Achievement Date</label>
	<input type="date" class="form-control" name="achievement_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>