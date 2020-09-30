<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bazaarbangla </title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="./css/fontawesome/css/font-awesome.min.css">

    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="./css/slick/slick.css">

    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .logo {
            padding: 0; 
            background-color: #1b860e;
        }
        .logo:hover {
            background-color: #177a0b;
        }
        .logo a {
            margin: 13px 0;
        }
        .logo_img {
            width: 170px;
        }
        @media(max-width:576px) {
            .logo a {
                margin: 18px 0;
            }
            .logo_img {
                width: 117px;
            }
            .logo_div {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <!-- header -->

    <header id="header" class="header d-flex fixed-top">
        <div class="col-md-4 col-5 p-0 d-flex logo_div" style="height: 100%">
            <div class="col-md-6 col-12 text-center logo">
                <a href="index.php"><img src="./assets/logo/logo.png" class="logo_img"></a>
            </div>
            <div class="col-md-6 location">
                <div class="location_details">
                    <i class="fa fa-map-marker"></i>
                    Your Location
                    <!-- <i class="fa fa-caret-down"></i> -->
                </div>
            </div>
        </div>
        <div class="col-md-5 search">
            <form action="search.php" method="post">
                <input type="text" name="search" placeholder="Search for products" required>
                <button type="submit" name="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-md-3 col-7 p-0 d-flex account">
            <a href="login.php" class="col-md-6 col-7 auth">
                <div style="margin: 1rem 0.5rem; font-size: 1rem;">
                   <?php
					if(!isset($_SESSION['customername'])){
						?>
	                <span> <?php echo "Login/Signup" ?></span>
						
                     <?php  }else{
						?>
                    <span><?php

                    if(strlen($_SESSION['customername']) <= 8) {
                        echo $_SESSION['customername'];
                    }else{
                        echo substr($_SESSION['customername'], 0, 8) . "..";
                    }

                    ?> </span>
					<?php
					}
					?>
                   
                   
                    <!-- <i class="fa fa-caret-down"></i> -->
                </div>
            </a>
            <a href="cart.php" class="col-md-6 col-5 p-0 cart">
                <div class="cart_details">
                    <i class="fa fa-shopping-cart"></i>Cart  
                    <?php
					if(!isset($_SESSION['cart'])){
	                $cart = "";
						echo $cart;
                       }else{
					$cart = $_SESSION['cart'];
					echo count($cart);
					}
					?>
                </div>
            </a>
        </div>
    </header>
    <div style="height: 60px"></div>
