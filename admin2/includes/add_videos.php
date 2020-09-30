<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$videos_title = $_POST['videos_title'];

$videos_image = $_FILES['image']['name'];
$videos_temp = $_FILES['image']['tmp_name'];

$videos_date = $_POST['videos_date'];

$videos_content = $_POST['videos_content'];
	$videos_link = $_POST['videos_link'];
//	$post_comment_count = 4;
	
	
	move_uploaded_file($videos_temp, "../assets/img/gallery/videos/$videos_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO videos( videos_title, videos_image, videos_date, videos_content, videos_link ) ";
	
$query .= "VALUES('{$videos_title}','{$videos_image}','{$videos_date}','{$videos_content}', '{$videos_link}') ";
	
	
$create_videos_query = mysqli_query($connection, $query);	


	confirmQuery($create_videos_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<div class="form-group">
	<label for="videos_title">Video Title</label>
	<input type="text" class="form-control" name="videos_title">
</div>



<div class="form-group">
	<label for="videos_image">Video Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="videos_link">Video Link</label>
	<input type="text" class="form-control" name="videos_link">
</div>

<div class="form-group">
	<label for="videos_content">About Video</label>
	 <textarea  rows="8" cols="45" name="videos_content"></textarea>
	
</div>
<div class="form-group">
	<label for="videos_date">Upload Date</label>
	<input type="date" class="form-control" name="videos_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>