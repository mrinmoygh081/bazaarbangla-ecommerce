<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$teacher_name = $_POST['teacher_name'];
$teacher_address = $_POST['teacher_address'];
$teacher_depertment = $_POST['teacher_depertment'];

$teacher_ph_no = $_POST['teacher_ph_no'];
$teacher_image = $_FILES['image']['name'];
$teacher_image_temp = $_FILES['image']['tmp_name'];
	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($teacher_image_temp, "../assets/img/teachers/$teacher_image");
	
	
$query = "INSERT INTO teacher( teacher_name, teacher_address, teacher_image, teacher_depertment, teacher_ph_no) ";
	
$query .= "VALUES('{$teacher_name}','{$teacher_address}','{$teacher_image}','{$teacher_depertment}','{$teacher_ph_no}') ";
	
	
$create_teacher_query = mysqli_query($connection, $query);	


	confirmQuery($create_teacher_query);
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
<div class="form-group">
	<label for="teacher_name">Teacher Name</label>
	<input type="text" class="form-control" name="teacher_name">
</div>


<div class="form-group">
	<label for="teacher_address">Teacher Post</label>
<select name="teacher_address" >
<option value="">Select Option</option>
<option value="Head Master">Head Master</option>
<option value="Asstt. Head Master">Asstt. Head Master</option>
<option value="Asstt. Teacher">Asstt. Teacher
</option>
<option value="Para-Teacher">Para Teacher</option>

	
</select>
</div>


<div class="form-group">
	<label for="teacher_image">Teacher Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<label for="teacher_depertment">Qualification</label>
	<input type="text" class="form-control" name="teacher_depertment">
</div>


<div class="form-group">
	<label for="teacher_ph_no">Teacher Contact No.</label>
	<input type="number" class="form-control" name="teacher_ph_no">
</div>





<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>