<?php require_once "includes/db.php";  ?>
<?php require_once "includes/header.php"; ?>
    <!-- /header -->

    <!-- navbar -->

        <!-- for big screen -->
  <?php require_once "includes/navigation.php"; ?>

    <!-- /navbar -->


    <!-- Contact -->

    <section id="contact">
        <div class="content-box-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Contact Left -->
                        <div id="contact-left">
                            <div>
                                <h2 class="dark_green">Get<br>In <strong>Touch</strong></h2>
                            </div>
                            <p>We would love to hear from you! Provide your business details and queries below. We will get
                                back to you in a jiffy!</p>
    
                            <div id="offices">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="office">
                                            <h4>Jalpaiguri, India</h4>
                                            <ul class="office-details">
                                                <li><i class="fa fa-mobile"></i><span><b>+(91) 8240491818</b> / <b>+(91)
                                                            8617063982</b></span></li><br>
                                                <li><i class="fa fa-envelope"></i><span>otdsofficial@gmail.com</span></li>
                                                <br>
                                                <li><i class="fa fa-map-marker"></i><span>Maskalaibari, Jalpaiguri, West Bengal, India</span></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <!-- <div class="col-md-6">
                                            <div class="office">
                                                <h4>Australia</h4>
                                                <ul class="office-details">
                                                    <li><i class="fa fa-mobile"></i><span>+(88) 457 87 74 87</span></li>
                                                    <li><i class="fa fa-envelope"></i><span>support@solo.com</span></li>
                                                    <li><i class="fa fa-map-marker"></i><span>NH34, Malda, West Bengal, India</span></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                </div>
                            </div>
    
<!--
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/OTDSofficial/" target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
-->
                        </div>
                    </div>
                    <div class="col-md-6">
    
                        <!-- Contact Right -->
                        <div id="contact-right">
                            <form>
                                <h4 class="dark_green my-2">Send Message</h4>
    
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Full Name<span>*</span></label>
                                            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email ID<span>*</span></label>
                                            <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Phone<span>*</span></label>
                                            <input type="text" class="form-control" id="phone" placeholder="Phone No. with country code" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" id="subject" placeholder="(e.g., Digital Marketing)">
                                        </div>
                                    </div>
    
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="Type your message here..."></textarea>
                                </div>
    
                                <div id="send-btn" class="text-center">
                                    <a class="btn btn-general btn-green" href="#" title="Send Your Message" role="button">Send</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /Contact -->

    <!-- footer  -->
    <?php require_once "includes/footer.php"; ?>
    