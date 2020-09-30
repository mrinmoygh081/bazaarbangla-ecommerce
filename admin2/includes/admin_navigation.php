<div class="container-fluid">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index.php">Sovanagar High School Admin</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav">

   <li><a href="">Users Online: <?php echo users_online(); ?></a></li>

<li><a href="../index.php">HOME SITE</a></li>




<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
<?php
	
if(isset($_SESSION['username'])) {
	
	echo $_SESSION['username'];
	
}
	
	
?>


<b class="caret"></b></a>
<ul class="dropdown-menu">
	<li>




		<a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
	</li>
</ul>
</li>
</ul>



<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li>
	<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>

 <li>
	<a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Students <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="posts_dropdown" class="collapse">
		<li>
			<a href="./student.php"> View All Student</a>
		</li>
		<li>
			<a href="student.php?source=add_student">Add Student</a>
		</li>
	</ul>
</li>

<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#osts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Result <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="osts_dropdown" class="collapse">
		<li>
			<a href="./result.php"> View All Result</a>
		</li>
		<li>
			<a href="result.php?source=add_result">Add Result</a>
		</li>
	</ul>
</li>

<!--
 <li>
	<a href="javascript:;" data-toggle="collapse" data-target="#dropdown"><i class="fa fa-fw fa-arrows-v"></i>teachers <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="dropdown" class="collapse">
		<li>
			<a href="./teacher.php"> View All Teacher</a>
		</li>
		<li>
			<a href="teacher.php?source=add_teacher">Add Teacher</a>
		</li>
	</ul>
</li>
-->
 <li>
	<a href="javascript:;" data-toggle="collapse" data-target="#down"><i class="fa fa-fw fa-arrows-v"></i>Gallery <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="down" class="collapse">
		<li>
			<a href="./gallery.php"> View All Images</a>
		</li>
		<li>
			<a href="gallery.php?source=add_image">Add Image</a>
		</li>
	</ul>
</li>
 <li>
	<a href="javascript:;" data-toggle="collapse" data-target="#dwn"><i class="fa fa-fw fa-arrows-v"></i>Videos <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="dwn" class="collapse">
		<li>
			<a href="./videos.php"> View All videos</a>
		</li>
		<li>
			<a href="videos.php?source=add_videos">Add Videos</a>
		</li>
	</ul>
</li>

<!--
 <li>
	<a href="javascript:;" data-toggle="collapse" data-target="#downtown"><i class="fa fa-fw fa-arrows-v"></i>Carousel <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="downtown" class="collapse">
		<li>
			<a href="./carousel.php"> View All Carousel Image</a>
		</li>
		<li>
			<a href="carosuel.php?source=add_carousel">Add Carousel Image</a>
		</li>
	</ul>
</li>
-->
<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#town"><i class="fa fa-fw fa-arrows-v"></i>Notice Board <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="town" class="collapse">
		<li>
			<a href="./notice.php"> View All Notice</a>
		</li>
		<li>
			<a href="notice.php?source=add_notice">Add Notice</a>
		</li>
	</ul>
</li>


<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#drop"><i class="fa fa-fw fa-arrows-v"></i>Blogs <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="drop" class="collapse">
		
		<li>
			<a href="./blogs.php"> View All Blogs</a>
		</li>
		
		<li>
			<a href="blogs.php?source=add_blog">Add blogs</a>
		</li>
		
	</ul>
</li>
<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#dem"><i class="fa fa-fw fa-arrows-v"></i> Social Activities <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="dem" class="collapse">
		<li>
			<a href="social_activities.php">View All Activities</a>
		</li>
		<li>
			<a href="social_activities.php?source=add_activities">Add Activities</a>
		</li>
	</ul>
</li>
<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#dm"><i class="fa fa-fw fa-arrows-v"></i> News & Event <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="dm" class="collapse">
		<li>
			<a href="news&event.php">View All Event</a>
		</li>
		<li>
			<a href="news&event.php?source=add_event">Add Event</a>
		</li>
	</ul>
</li>




<!--
<li>
	<a href="./email.php"><i class="glyphicon glyphicon-envelope"></i> Emails</a>
</li>
-->



<li>
	<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
	<ul id="demo" class="collapse">
		<li>
			<a href="users.php">View All Users</a>
		</li>
		<li>
			<a href="users.php?source=add_user">Add User</a>
		</li>
	</ul>
</li>









</ul>
</div>



<!-- /.navbar-collapse -->
</nav>
</div>