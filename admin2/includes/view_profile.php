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
?>

<div class="">
 <li>name = <?php echo $student_name;?></li>
	
</div>




