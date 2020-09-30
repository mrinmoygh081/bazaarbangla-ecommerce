<?php require_once "includes/db.php";  ?>
<?php require_once "includes/header.php"; ?>
<style>
.about_banner {
  position: relative;
}

.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    font-size: 18px;
    text-align: center;
}

.center h4, .center p {
    text-shadow: 2px 2px 4px #000000;
}

.about_img { 
  width: 100%;
  height: 400px;
}
</style>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->

    <!-- About -->
        <div style="background-color: #f4f4f4;">
            <div>
                <div class="about_banner">
                    <img src="./assets/bg/bgAbout.jpg" alt="Cinque Terre" class="about_img">
                    <div class="center">
                        <h4 class="text-white" style="font-size: 3rem; font-weight: bold;">About us</h4>
                        <p class="text-white" style="font-size: 1.4rem;">Lorem ipsum dolor sit amet ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="container my-4 d-flex">
                <div class= "col-12 text-center" style="padding-bottom: 15px;">
                    <img src="./assets/logo/logo.png" alt="logo" style="background-color: #1b860e; width: 250px; border-radius: 9px; padding: 5px;">
                    <hr>
                </div>
                <div class="col-sm-6 col-12 p-0">
                    <img src="./assets/bg/retail.jpg" alt="about img" width="100%">
                </div>
                <div class="col-sm-6 col-12 p-0">
                    <div class="mx-3">
                        <p class="text-justify" style="font-size: 1rem;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis sapien nunc. Sed rhoncus ultrices consectetur. 
                        Mauris eu feugiat ipsum, in varius massa. Mauris non orci sollicitudin, pharetra justo eget, malesuada velit. Nulla eu 
                        massa non mi venenatis accumsan. Mauris ullamcorper purus felis. Vestibulum maximus, enim non venenatis aliquam, tortor 
                        erat mattis lorem, aliquet iaculis orci ex sed mauris. Maecenas quis aliquam metus. Pellentesque pharetra aliquam tellus 
                        in dapibus. Aliquam cursus nunc massa, eu porta nisi rutrum eget. Nam eu porta urna. </p>
                    </div>
                </div>
            </div>
        </div>
    <!-- /About -->

    <!-- footer  -->
    <?php require_once "includes/footer.php"; ?>