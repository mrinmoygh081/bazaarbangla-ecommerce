<?php

if(isset($_POST['submit']) && $_POST['randcheck']==$_SESSION['rand']) {
	

$student_name = $_POST['student_name'];

$parents_name = $_POST['parents_name'];
$student_address = $_POST['student_address'];

$parents_ph_no = $_POST['parents_ph_no'];
$date_of_birth = $_POST['date_of_birth'];


$student_ph_no = $_POST['student_ph_no'];


$student_email = $_POST['student_email'];


//$email = $_POST['email'];

//$email_date = "". date() ."";


	
//	$post_comment_count = 4;
	
	
	
	
$query = "INSERT INTO student( student_name, parents_name, student_address,  parents_ph_no, date_of_birth, student_ph_no, student_email ) ";
	
$query .= "VALUES('{$student_name}','{$parents_name}', '{$student_address}','{$parents_ph_no}', '{$date_of_birth}', '{$student_ph_no}', '{$student_email}') ";
	
	
$create_email_query = mysqli_query($connection, $query);	


}

?>          
   
 <form class="contactform" action="" method="post">
                   <?php
   $rand=rand();
   $_SESSION['rand']=$rand;
  ?>
   <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />                  
                    <p class="comment-form-author">
                      <label for="student_name">Student Name <span class="required">*</span></label>
                      <input type="text" required="required" size="30" value="" name="student_name">
                    </p>
                    <p class="comment-form-email">
                      <label for="parents_name">Parents Name <span class="required">*</span></label>
                      <input type="text" required="required" aria-required="true" value="" name="parents_name">
                    </p>
                     <p class="comment-form-comment">
                      <label for="student_address">Address <span class="required">*</span></label>
                     <textarea required="required" aria-required="true" rows="8" cols="45" name="student_address"></textarea>
                    </p> 
<!--                     <div class="col-md-4">-->
                     <p class="comment-form-email">
                      <label for="date_of_birth">Student Date of Birth <span class="required">*</span></label>
                      <input type="date" required="required" aria-required="true" value="" name="date_of_birth">
                    </p>
                   
                     <p class="comment-form-email">
                      <label for="parents_ph_no">Parents Ph No. <span class="required">*</span></label>
                      <input type="number" required="required" aria-required="true" value="" name="parents_ph_no">
                    </p> 
                   
                    <p class="comment-form-url">
                      <label for="student_ph_no">Student Ph No.</label>
                      <input type="number" name="student_ph_no">  
                    </p>
                                 <p class="comment-form-url">
                      <label for="student_email">Student Email address</label>
                      <input type="email" name="student_email">  
                    </p>
                                 
                    <p class="form-submit">
                      <input type="submit" value="Submit" class="" name="submit">
                    </p>        
                  </form>