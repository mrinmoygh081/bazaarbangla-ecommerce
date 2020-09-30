<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$event_heading = $_POST['event_heading'];


$event_image = $_FILES['image']['name'];
$image_temp = $_FILES['image']['tmp_name'];

$event_date = $_POST['event_date'];

$event_content = $_POST['event_content'];	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($image_temp, "../assets/img/event/$event_image");
//	move_uploaded_file($image_temp, "../assets/img/gallery/big/$image");
//	
	
$query = "INSERT INTO event( event_heading, event_image, event_date, event_content ) ";
	
$query .= "VALUES('{$event_heading}','{$event_image}','{$event_date}','{$event_content}') ";
	
	
$create_event_query = mysqli_query($connection, $query);	


	confirmQuery($create_event_query);
	
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />

<div class="form-group">
	<label for="event_heading">Event Heading</label>
	<input type="text" class="form-control" name="event_heading">
</div>

<div class="form-group">
	<label for="event_image">Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="event_content">Event Content</label>
	 <textarea  rows="8" cols="45" name="event_content"></textarea>
</div>


<div class="form-group">
	<label for="event_date">Event Date</label>
	<input type="date" class="form-control" name="event_date">
</div>

<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>