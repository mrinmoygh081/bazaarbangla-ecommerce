  <nav class="navbar">
        <span class="open-slide">
            <a href="#" onclick="openSlideMenu()">
                <svg width="30" height="30">
                    <path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
                    <path d="M0, 14 30,14" stroke="#fff" stroke-width="5" />
                    <path d="M0,23,30,23" stroke="#fff" stroke-width="5" />
                </svg>
            </a>
        </span>
        
        <ul class="navbar-nav">
            <li><a href="index.php">Home</a></li>
            <?php 
					
					$query = "SELECT * FROM category LIMIT 5";
					$select_all_category = mysqli_query($connection, $query); 
					while ($r = mysqli_fetch_assoc($select_all_category)) {
				?>
            <li><a href="index.php?category_id=<?php echo $r['category_id'];?>"> <?php echo $r['category_title']; ?> </a></li>
 <?php } ?>
            
            
             <li><a href="account.php"> My Account </a></li>
            <li><a href="updateAddress.php"> My Address </a></li>
            <li><a href="about.php"> About </a></li>
            <li><a href="contact.php"> Contact </a></li>

        </ul>
        <div class="col-md-5 miniSearch">
            <form action="search.php" method="post">
                <input type="text" name="search" placeholder="Search for products" required>
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </nav>
    
        <!-- for small screen -->
    <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="index.php">Home</a>
        <?php 
					
					$query = "SELECT * FROM category LIMIT 5";
					$select_all_category = mysqli_query($connection, $query); 
					while ($r = mysqli_fetch_assoc($select_all_category)) {
				?>
            <li><a href="index.php?category_id=<?php echo $r['category_id'];?>"> <?php echo $r['category_title']; ?> </a></li>
 <?php } ?>
        <a href="seeAll.php">See All Products</a>
        <hr class="side-nav-hr">
        <a href="account.php"> My Account </a>
        <a href="updateAddress.php"> My Address </a>
        <a href="about.php"> About </a>
        <a href="contact.php"> Contact </a>
    </div>
   