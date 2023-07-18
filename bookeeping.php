<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$dbs = new Dbc();
$page = 'contact';
$user_role = '';
if (isset($_SESSION['useremail'])) {

    $user_email = $_SESSION['useremail'];
    $UsersData = $dbs->currentUser($user_email);
    foreach ($UsersData as $values) {
        $user_role = $values['user_role'];
        // $hashpass = $values['hashpass'];
    }
}
$display = 'style="display: none;"';
$errorMessage = '';
$alertColor = 'danger';

if (isset($_POST['bookinspection'])) {
    $fullname = $dbs->test_input($_POST['fullname']);
    $email = $dbs->test_input($_POST['email']);
    $phone = $dbs->test_input($_POST['phone']);
    $date = $dbs->test_input($_POST['date']);
    $message = $dbs->test_input($_POST['message']);


    if (empty($fullname) && empty($email) && empty($phone) && empty($date) && empty($message)) {

        $display = ' ';

        $errorMessage = 'Form Not Completely Filled';
    } else {
        $sql = $dbs->bookInspection($fullname, $email, $phone, $date, $message);
        if ($sql) {
            $display = ' ';
            $alertColor = 'success';
            $errorMessage = "Booked successfully.<br>";
        } else {
            $display = ' ';
            $errorMessage = "Error Submit Form.<br>";
        }

    }



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - Contact</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <!-- preloader end -->


        <!-- switcher menu -->

        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header2.php') ?>

        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>

        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/bgall.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Book Inspection Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Book Inspection Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- contact-info-section -->
        <!-- contact-info-section end -->


        <!-- contact-section -->
        <section class="contact-section bg-color-1">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title">
                                <h5>Book Inspection</h5>
                                <h2>Book Inspection Us</h2>
                            </div>
                            <div class="form-inner">
                                <form method="post" action="" id="contact-form">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="alert alert-<?= $alertColor; ?>  " <?= $display; ?> role="alert">
                                                <?= $errorMessage ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="fullname" placeholder="Your Name" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Email address" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="date" name="date" placeholder="Chose date" class="form-control"
                                                required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn btn-one" type="submit" name="bookinspection">Book
                                                Inspection</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                        <!-- <div class="google-map-area">
                            <div 
                                class="google-map" 
                                id="contact-google-map" 
                                data-map-lat="40.712776" 
                                data-map-lng="-74.005974" 
                                data-icon-path="assets/images/icons/map-marker.png"  
                                data-map-title="Brooklyn, New York, United Kingdom" 
                                data-map-zoom="12" 
                                data-markers='{
                                    "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
                                }'>

                            </div>
                        </div> -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.631149357805!2d3.475689!3d6.4413886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf44b82d6e989%3A0xa5c472a433262322!2s5b%20Chief%20Collins%20Uchidiuno%20St%2C%20Lekki%20Phase%201%20106104%2C%20Lagos%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1686910148317!5m2!1sen!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- main-footer -->
        <?php include('include/footer.php') ?>

        <!-- main-footer end -->

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/scrollbar.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>