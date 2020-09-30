<?php

if(isset($_POST['create_post']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$studentresult_name = $_POST['studentresult_name'];
$studentresult_class = $_POST['studentresult_class'];
$studentresult_roll = $_POST['studentresult_roll'];
$studentresult_section = $_POST['studentresult_section'];
$total_no = $_POST['total_no'];
$status = $_POST['status'];

	

	
//	$post_comment_count = 4;
	
	
	
	
	
$query = "INSERT INTO studentresult( studentresult_name, studentresult_class, studentresult_roll, studentresult_section, total_no, status, date) ";
	
$query .= "VALUES('{$studentresult_name}','{$studentresult_class}','{$studentresult_roll}','{$studentresult_section}','{$total_no}','{$status}', now()) ";
	
	
$create_result_query = mysqli_query($connection, $query);	


	confirmQuery($create_result_query);
	
}

?>

<form action="" method="post" enctype="multipart/form-data">
<?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
<div class="form-group">
	<label for="studentresult_name">Student Name</label>
	<input type="text" class="form-control" name="studentresult_name">
</div>
<div class="form-group">
<label for="studentresult_class">Class</label>
<select name="studentresult_class" >
<option value="">Select Option</option>
<option value="V">V</option>
<option value="VI">VI</option>
<option value="VII">VII
</option>
<option value="VIII">VIII</option>
<option value="IX">IX</option>
<option value="X">X</option>
<option value="XI">XI</option>
<option value="XII">XII</option>
	
</select>
	</div>

<div class="form-group">
<label for="studentresult_section">Section</label>
<select name="studentresult_section" >
<option value="">Select Option</option>
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C
</option>
<option value="D">D</option>
<option value="E">E</option>

	
</select>
	</div>





<div class="form-group">
	<label for="studentresult_roll">Roll No</label>
	<input type="number" class="form-control" name="studentresult_roll">
</div>


<div class="form-group">
	<label for="total_no">Total Marks</label>
	<input type="number" class="form-control" name="total_no">
</div>

<div class="form-group">
<label for="status">Status</label>
<select name="status" >
<option value="">Select Option</option>
<option value="Pass">Pass</option>
<option value="Fail">Fail</option>

	
</select>
	</div>



<div class="form-group">
	
	<input class="bt btn-primary" type="submit" name="create_post" value="publish post">
</div>
</form>