<?php

if(isset($_POST['create_post'])  && $_POST['randcheck']==$_SESSION['rand']) {
	

$name = $_POST['name'];
$word = $_POST['word'];
$activities_image = $_FILES['image']['name'];
$activities_image_temp = $_FILES['image']['tmp_name'];



	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($activities_image_temp, "../assets/img/activities/$activities_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO social_activities( name, word, activities_image ) ";
	
$query .= "VALUES('{$name}','{$word}','{$activities_image}') ";
	
	
$create_activities_query = mysqli_query($connection, $query);	


	confirmQuery($create_activities_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
<div class="form-group">

	<label for="name">Image Post By</label>
	<input type="text" class="form-control" name="name">
</div>
<div class="form-group">
	<label for="word">Activities Content</label>
	 <textarea  rows="8" cols="45" name="word"></textarea>
	
	
</div>



<div class="form-group">
	<label for="activities_image">Activities Image</label>
	<input type="file" name="image">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>