<?php


if(isset($_GET['p_id'])) {
	
$the_student_id = $_GET['p_id'] ;
	
	
}

$query = "SELECT * FROM student WHERE student_id = $the_student_id ";
        $select_student_by_id = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc( $select_student_by_id )) {
			
$student_id = $row['student_id'];
$student_name = $row['student_name'];
$student_address = $row['student_address'];
$student_class = $row['student_class'];
$student_section = $row['student_section'];
$student_image = $row['student_image'];
$student_admission_date = $row['student_admission_date'];
$student_left_date = $row['student_left_date'];
$student_passout_date = $row['student_passout_date'];
$student_left_class = $row['student_left_class'];
$student_ph_no = $row['student_ph_no'];

		}

if(isset($_POST['update_post'])) {
	
	
$student_name = $_POST['student_name'];
$student_address = $_POST['student_address'];
$student_class = $_POST['student_class'];
$student_section = $_POST['student_section'];

$student_admission_date = $_POST['student_admission_date'];
$student_left_date = $_POST['student_left_date'];
$student_passout_date = $_POST['student_passout_date'];
$student_left_class = $_POST['student_left_class'];
$student_ph_no = $_POST['student_ph_no'];
$student_image = $_FILES['image']['name'];
$student_image_temp = $_FILES['image']['tmp_name'];
	
//	$post_comment_count = 4;
	
	
	move_uploaded_file($student_image_temp, "../assets/img/student/$student_image");
	
	if(empty($student_image)) {
		
		$query = "SELECT * FROM student WHERE student_id = $the_student_id ";
		
		$select_image = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_array($select_image)) {
			
			$student_image = $row['student_image'];
		}
		
	}
	
	
	$query = "UPDATE student SET ";
	$query .= "student_name = '{$student_name}', ";
	$query .= "student_address = '{$student_address}', ";
	$query .= "student_class = '{$student_class}', ";
	$query .= "student_section = '{$student_section}', ";
	$query .= "student_admission_date = '{$student_admission_date}', ";
	$query .= "student_left_date = '{$student_left_date}', ";
	$query .= "student_passout_date = '{$student_left_date}', ";
	$query .= "student_image = '{$student_image}', ";
	$query .= "student_left_class = '{$student_left_class}', ";
	$query .= "student_ph_no = '{$student_ph_no}' ";
	$query .= "WHERE student_id = '{$the_student_id}' ";
	
	$update_student = mysqli_query($connection, $query);
	
	
	confirmQuery($update_student);
	
	
	echo "<p class='bg-success'>Post Updated.</p>";
	
	
}

?>





<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="student_name">Student Name</label>
	<input value="<?php echo $student_name; ?>" type="text" class="form-control" name="student_name">
</div>

<div class="form-group">
	<label for="student_address">Addressr</label>
	<input value="<?php echo $student_address; ?>" type="text" class="form-control" name="student_address">
</div>


<div class="form-group">
	<label for="student_class">Class</label>
	<input value="<?php echo $student_class; ?>" type="text" class="form-control" name="student_class">
</div>

<div class="form-group">
	<label for="student_section">Section</label>
	<input value="<?php echo $student_section; ?>" type="text" class="form-control" name="student_section">
</div>
<div class="form-group">
	<!-- <img width="100" src="../assets/img/student/<?php echo $student_image ?>" alt=""> -->
	<input type="file" name="image" value="<?php echo $student_image; ?>"  /><img src="../assets/img/student/<?php echo $student_image; ?> ?>" width="150">
<!--	<input value="<?php echo $student_image_temp; ?>" type="file" name="image">-->
</div>



<div class="form-group">
	<label for="student_admission_date">Admission Date</label>
	<input value="<?php echo $student_admission_date; ?>" type="date" class="form-control" name="student_admission_date">
</div>

<div class="form-group">
	<label for="$student_left_date">student_left_date</label>
	<input value="<?php echo $student_left_date; ?>" type="date" class="form-control" name="student_left_date">
</div>

<div class="form-group">
	<label for="$student_left_class">$student_left_class</label>
	<input value="<?php echo $student_left_class; ?>" type="text" class="form-control" name="student_left_class">
</div>


<div class="form-group">
	<label for="student_passout_date">Passout Date</label>
	<input value="<?php echo $student_passout_date; ?>" type="date" class="form-control" name="student_passout_date">
</div>
<div class="form-group">
	<label for="student_ph_no">Student Contact No.</label>
	<input value="<?php echo $student_ph_no; ?>" type="number" class="form-control" name="student_ph_no">
</div>


<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="update_post" value="Update post">
</div>
</form>