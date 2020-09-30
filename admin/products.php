<?php
	session_start();
	require_once 'inc/db.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Category Name</th>
						<th>Thumbnail</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM product";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['product_id']; ?></th>
						<td><?php echo $r['product_title']; ?></td>
						<td><?php echo $r['product_category_id']; ?></td>
						<td><?php if($r['product_img1']){ echo "Yes";}else{echo "No";} ?></td>
						<td><a href="editproduct.php?id=<?php echo $r['product_id']; ?>">Edit</a> | <a href="delproduct.php?product_id=<?php echo $r['product_id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
