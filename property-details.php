<?php
session_start();
include('controller/dbc.php');
$dbs = new Dbc();
$user_role = '';

// include('controller/session.php');
$page = '';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $propertyCategory = $_GET['propertyCategory'];
    $info = $dbs->SelectAllApropertiesNoSessWhere($propertyCategory, $id);
    $agentDetails = $dbs->SelectFrom($info['user_id']);
} else {
    header("location: index.php");
}
if (isset($_SESSION['useremail'])) {
  
    $user_email = $_SESSION['useremail'];
    $UsersData = $dbs->currentUser($user_email);
    foreach ($UsersData as $values) {
      $user_role = $values['user_role'];
      // $hashpass = $values['hashpass'];
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - Property Details</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

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
    <!-- <link href="assets/css/nice-select.css" rel="stylesheet"> -->
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/timePicker.css" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <!-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="far fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                                l
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="h" class="letters-loading">
                                h
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="d" class="letters-loading">
                                d
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div> -->
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
        <section class="page-title centred" style="background-image: url(assets/images/slid7.jpeg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Property Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Properties</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- property-details -->
        <section class="property-details property-details-one">
            <div class="auto-container">
                <div class="top-details clearfix">
                    <div class="left-column pull-left clearfix">
                        <h4 class="text-uppercase">
                            <?= $info['propertytitle'] ?>
                        </h4>
                        
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="price-inner clearfix">
                            
                            <div class="price-box pull-right">
                                <h3>
                                    <?= $info['symbol'] . $info['propertyprice'] ?>
                                </h3>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-details-content">
						
				
                            <div class="carousel-inner">
                                <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                                    <?php 
                                     $galleryimage = $info['galleryimage'];
                                     $fetchgallery =  $dbs->SelectFromImg($galleryimage);
                                     foreach ($fetchgallery as $fetchgalleryInfo ){
                                    ?>
                                    <figure class="image-box"  style="width: 100% !important; height: 600px !important; background-size: cover;"><img src="./galleryImage/<?= $fetchgalleryInfo['imagename']  ?>"
                                            alt="" class="img-fluid" style="width: 100% !important; height: 100% !important; background-size: cover;"></figure>
                                    
                                    <?php }  ?>
                                </div>
                            </div>
							
							
                            <div class="details-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details/<?= $info['propertyCategory'] ?></h4>
                                </div>
                                <div class="text">
                                    <p>
                                        <?= $info['detailedinfo'] ?>
                                    </p>
                                    <ul class="list clearfix">
                                        <?php if($info['propertyCategory'] !== 'Land'):  ?>
                                            <?php if($info['propertyCategory'] !== 'Autos/Machinery'):  ?>
    
                                                <li>Bedrooms: <span><?= $info['bedrooms']  ?></span></li>
                                                <li>Bathrooms: <span><?= $info['bathroom']  ?></span></li>
                                                <li>Property Size: <span><?= $info['propsize']  ?> Sq Ft</span></li>
                                                <li>Toilets: <span><?= $info['toilets']  ?></span></li>
                                                <li>Parking Spaces: <span><?= $info['parkingspace']  ?></span></li>
                                            <?php else:  ?> 
                                            <?php endif;  ?> 
                                        <?php else:  ?> 
                                            <li><?= $info['landsize']  ?> landsize</li>
                                        <?php endif;  ?> 
                                       
                                    </ul>
                                </div>
                            </div>	
                            <!-- <div class="discription-box content-widget">
                                <div class="title-box">
                                    <h4>
                                        <?= $info['propertyCategory'] ?>
                                    </h4>
                                </div>
                                <div class="text">
                                    <p>
                                        <?= $info['detailedinfo'] ?>
                                    </p>
                                </div>
                            </div>
                          -->
                           
                            <div class="location-box content-widget">
                                <div class="title-box">
                                    <h4>Map</h4>
                                </div>
                                <ul class="info clearfix">
                                    <li><span>Address:</span>  <?= $info['address'] ?></li>
                                    <li><span>Country:</span>   <?= $info['area_location'] ?></li>
                                    <li><span>State/county:</span> <?= $info['state'] ?></li>
                                    <!-- <li><span>Neighborhood:</span> Andersonville</li>
                                    <li><span>Zip/Postal Code:</span> 2403</li> -->
                                    <li><span>City:</span>  <?= $info['city'] ?></li>
                                </ul>
                                <div class="google-map-area">
                                   <iframe src="https://maps.google.com/maps?q=<?= $info['langtitude'] ?>, <?= $info['longtitude'] ?>&z=15&output=embed" width="100%" height="270" frameborder="0" style="border:0"></iframe>
                                </div>
                            </div>
                            <div class="discription-box content-widget">
                                <div class="title-box">
                                    <h4 class="text-capitalize mb-2">Disclaimer</h4>
                                </div>
                                <div class="text">
                                
                                    <p>
Please note that the property aforementioned does not belong to Distress Property Market Ltd; therefore, we make no guarantees on the information displayed pertaining to the said property, until due diligence is fulfilled by an interested buyer.
                                    </p>
                                </div>
                            </div>
							
                            <div class="discription-box content-widget">
                                <div class="title-box bg-light d-flex justify-content-between p-3">
                                    <h4 class="text-capitalize"><i class="fas fa-paper-plane pr-3" style="font-size: 30px;"></i> Share this property</h4>
                                    <ul class="social-links clearfix text-white d-flex justify-content-between" style="width: 300px;">
                                    <?php 
                                       $pageURL = 'http';
                                       if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") {
                                           $pageURL .= "s";
                                       }
                                       $pageURL .= "://";
                                       if ($_SERVER["SERVER_PORT"] != "80") {
                                           $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
                                       } else {
                                           $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
                                       }
                                       
                                        // echo $currentURL;
                                    ?>
                                        <li><a  href="https://www.facebook.com/sharer/sharer.php?u=<?= $pageURL ?>" target="_blank" rel="noopener noreferrer" class="text-dark"><i class="fab fa-facebook-f" style="font-size: 30px;"  ></i></a></li>
                                        <li><a href="https://twitter.com/intent/tweet?url=<?= $pageURL ?>" target="_blank" rel="noopener noreferrer" class="text-dark"><i class="fab fa-twitter" style="font-size: 30px;"></i></a></li>
                                        <li><a href="https://api.whatsapp.com/send?text=<?= $pageURL ?>" target="_blank" rel="noopener noreferrer" class="text-dark"><i class="fab fa-whatsapp" style="font-size: 30px;"></i></a></li>
                                        <li><a href="<?= $info['youtubelink'] ?>" target="_blank" rel="noopener noreferrer" class="text-dark"><i class="fab fa-youtube" style="font-size: 30px;"></i></a></li>
                                    </ul>
                                </div>
                                <div class="title-box bg-light  p-3">
                                    <h4 class="text-capitalize"><i class="fas fa-link pr-3" style="font-size: 30px;"></i> Youtube Video For Property</h4>
                                    <iframe width="560" height="315" src="<?= $info['youtubelink'] ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen style="width: 100%; height: 100%;" class="m-2"> </iframe>
                                    <!-- <h4 class="text-capitalize"><i class="fas fa-link pr-3" style="font-size: 30px;"></i> Youtube Link For Property</h4> -->
                                    <!-- <ul class="social-links clearfix text-white d-flex justify-content-between" style="width: 300px;">
                                        <li><a href="<?= $info['youtubelink'] ?>" target="_blank" rel="noopener noreferrer" class="text-dark"><i class="fab fa-youtube" style="font-size: 30px;"></i></a></li>
                                    </ul> -->
                                </div>
                                <!-- <div class="text">
                                    <ul class="social-links clearfix text-white d-flex justify-content-between" style="width: 300px;">
                                        <li><a href="javascript:void()" class="text-dark"><i class="fab fa-facebook-f" style="font-size: 30px;"  ></i></a></li>
                                        <li><a href="javascript:void()" class="text-dark"><i class="fab fa-twitter" style="font-size: 30px;"></i></a></li>
                                        <li><a href="javascript:void()" class="text-dark"><i class="fab fa-whatsapp" style="font-size: 30px;"></i></a></li>
                                    </ul>
                                </div> -->
                            </div>
							
							
                            <!-- <div class="details-box content-widget">
                                <div class="title-box">
                                    <h4>Property Details</h4>
                                </div>
                                <ul class="list clearfix">
                                    <li>Property ID: <span>ZOP251C</span></li>
                                    <li>Rooms: <span>06</span></li>
                                    <li>Garage Size: <span>200 Sq Ft</span></li>
                                    <li>Property Price: <span>$30,000</span></li>
                                    <li>Bedrooms: <span>04</span></li>
                                    <li>Year Built: <span>01 April, 2019</span></li>
                                    <li>Property Type: <span>Apertment</span></li>
                                    <li>Bathrooms: <span>03</span></li>
                                    <li>Property Status: <span>For Sale</span></li>
                                    <li>Property Size: <span>2024 Sq Ft</span></li>
                                    <li>Garage: <span>01</span></li>
                                </ul>
                            </div>
                            <div class="amenities-box content-widget">
                                <div class="title-box">
                                    <h4>Amenities</h4>
                                </div>
                                <ul class="list clearfix">
                                    <li>Air Conditioning</li>
                                    <li>Cleaning Service</li>
                                    <li>Dishwasher</li>
                                    <li>Hardwood Flows</li>
                                    <li>Swimming Pool</li>
                                    <li>Outdoor Shower</li>
                                    <li>Microwave</li>
                                    <li>Pet Friendly</li>
                                    <li>Basketball Court</li>
                                    <li>Refrigerator</li>
                                    <li>Gym</li>
                                </ul>
                            </div> -->
                            
                            <!-- <div class="schedule-box content-widget">
                                <div class="title-box">
                                    <h4>Schedule A Tour</h4>
                                </div>
                                <div class="form-inner">
                                    <form action="property-details.html" method="post">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <input type="text" name="date" placeholder="Tour Date" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <i class="far fa-clock"></i>
                                                    <input type="text" name="time" placeholder="Any Time">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Your Name" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <input type="email" name="email" placeholder="Your Email" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <input type="tel" name="phone" placeholder="Your Phone" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Your message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                <div class="form-group message-btn">
                                                    <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="property-sidebar default-sidebar">
                            <div class="author-widget sidebar-widget">
                                <div class="author-box">
                                    <figure class="author-thumb">
                                    <?php if (!$agentDetails['profilepic']): ?>
                                        <img src="assets/images/clients/clients-2.png" class="card-img-top" alt="..." style="width: 100%; height: 100%; border-radius: 50%;">
                                        <?php else: ?>
                                            <img src="<?= $agentDetails['profilepic'] ?>" alt=""   style="width: 100%; height: 100%; border-radius: 50%;">
                                        <?php endif; ?>
                                    </figure>
                                    <div class="inner">
                                        <h4 class="text-uppercase">
                                            <?= $agentDetails['fullname'] ?>
                                        </h4>
                                        <p>  <?= $agentDetails['aboutuser'] ?></p>
                                        <div class="btn-box"><a href="javascript:void()">View Listing</a></div>
                                    </div>
                                </div>
                                <div class="form-inner">
                                    <h3 class="text-capitalize mb-2">Important Information</h3>
                                    <!-- <p>
                                        Be wary of any agent asking you to pay a viewing fee of more than #5,000. They may not be genuine and need to be reported to us. Be particularly wary of any agent claiming to work under the name Winners Property and asking you to pay a refundable inspection and consultancy fee.
                                        <br>
                                        Call Agent
                                    </p> -->
                                    <div class="btn-box btn-group">
                                    <a href="javascript:void()" class="border-white theme-btn btn-one" id='show' style="font-size: 15px;
                                                                ">Call</a>
                                    <a href="bookeeping" class="border-white theme-btn btn-one "
                                                            ><span  class="span" style="font-size: 15px;
                                                                ">Book Inspection
                                                             </span></a>
                                        <!-- <a href="https://api.whatsapp.com/send?phone=<?= $agentDetails['whatsappNumber'] ?>" target="_blank" class="theme-btn btn-one">Whatsapp</a> -->
                                    </div>
                                    <div class="bg-light p-3"> <p id="noshow">Phoneno: <?= $agentDetails['callNumber'] ?></p></div>
                               

                                    <!-- <form action="property-details.html" method="post" class="default-form">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your name" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Send Message</button>
                                        </div>
                                    </form> -->
                                </div>
                            </div>
                            <!-- <div class="calculator-widget sidebar-widget">
                                <div class="calculate-inner">
                                    <div class="widget-title">
                                        <h4>Mortgage Calculator</h4>
                                    </div>
                                    <form method="post" action="mortgage-calculator.html" class="default-form">
                                        <div class="form-group">
                                            <i class="fas fa-dollar-sign"></i>
                                            <input type="number" name="total_amount" placeholder="Total Amount">
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-dollar-sign"></i>
                                            <input type="number" name="down_payment" placeholder="Down Payment">
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-percent"></i>
                                            <input type="number" name="interest_rate" placeholder="Interest Rate">
                                        </div>
                                        <div class="form-group">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                        </div>
                                        <div class="form-group">
                                            <div class="select-box">
                                                <select class="form-control">
                                                   <option data-display="Monthly">Monthly</option>
                                                   <option value="1">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group message-btn">
                                            <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="similar-content">
                    <div class="title">
                        <h4>Similar Properties</h4>
                    </div>
                    <div class="row clearfix">
                    <?php
                    // $propertyCategory = 'Distress Properties';
                    $fetch = $dbs->SelectAllApropertiesNoSess();
                    if ($fetch):
                        foreach ($fetch as $info):
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                    data-wow-duration="1500ms">
                                    <div class="inner-box">
                                        <div class="image-box">
                                        <?php 
                                                        $galleryimage = $info['galleryimage'];
                                                        $fetchgallery =  $dbs->SelectFromImgLim($galleryimage);
                                                        foreach ($fetchgallery as $fetchgalleryInfo ){
                                                    ?>
                                                        <!-- <figure class="image-box"><img src="./galleryImage/<?= $fetchgalleryInfo['imagename']  ?>"
                                                                alt="" style="width: 100% !important; height: 400px !important; background-size: cover;"></figure> -->
                                                    <?php }  ?>
                                            <figure class="image-box"><img src="featuredGallery/<?= $info['featuredimage'] ?>"
                                                    alt="">
                                            </figure>
                                            <div class="batch"><i class="icon-11"></i></div>
                                            <span class="category">
                                                Featured
                                                <?php $info['propertyCategory'] ?>
                                            </span>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-info clearfix">
                                                <div class="author pull-left">
                                                    <figure class="author-thumb"><img src="assets/images/footer-logo.png"
                                                            style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                            alt="">
                                                    </figure>
                                                    <h6 class="text-uppercase">
                                                        <?= $info['propertytitle'] ?>
                                                    </h6>
                                                </div>
                                                <div class="buy-btn pull-right"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                        <?= $info['symbol'] . $info['propertyprice'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                             <!-- <div class="title-text">
                                                                    <h6><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                    <?= $info['propertytitle'] ?>
                                                                        </a></h6>
                                                                </div> -->
                                                                <div class="title-text">
                                                                    <h6><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                              <?= $info['city'] ?>,   <?= $info['state'] ?> <?= $info['area_location'] ?>
                                                                        </a></h6>
                                                                </div>
                                                                <div class="price-box clearfix">
                                                                    <div class="price-info pull-left">
                                                                        <!-- <h6>
                                                                            Longtitude:
                                                                            <?= $info['longtitude'] ?>
                                                                        </h6>
                                                                        <h6>
                                                                            Langtitude:
                                                                            <?= $info['langtitude'] ?>
                                                                        </h6> -->
                                                                    </div>
                                                                    <!-- <ul class="other-option pull-right clearfix">
                                                                        <li><a href="property-details?id=<?= $info['id'] ?>"><i
                                                                                    class="icon-12"></i></a></li>
                                                                        <li><a href="property-details?id=<?= $info['id'] ?>"><i
                                                                                    class="icon-13"></i></a></li>
                                                                    </ul> -->
                                                                </div>
                                                                <p>
                                                                    <?= substr($info['detailedinfo'], 0, 77) . ' ...' ?>
                                                                <p>
                                                                <!-- <ul class="more-details clearfix">
                                                                    <li>
                                                                        City:
                                                                        <?= $info['city'] ?>
                                                                    </li>
                                                                    <li>
                                                                        State:
                                                                        <?= $info['state'] ?>
                                                                    </li>
                                                                    <li>
                                                                        Country:
                                                                        <?= $info['area_location'] ?>
                                                                    </li>
                                                                </ul> -->
                                            <div class="btn-box d-flex justify-content-center align-items-center text-center">
                                                <a style="padding: 10px;" href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>" class="theme-btn btn-one">
                                                <span  class="span" style="font-size: 15px; ">See Details</span></a>
                                                <a style="padding: 10px;" href="contact" class="theme-btn btn-one ">
                                                            <span  class="span" style="font-size: 15px; ">Book Inspection</span>
                                                        </a>
                                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    else:
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block d-flex justify-content-center align-items-center text-center">
                            <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="lower-content d-flex justify-content-center align-items-center ">
                                        <div class="btn-box mt-5"><a href="javascript:void()" class="theme-btn btn-two">No
                                                Property Found</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-details end -->


        <!-- subscribe-section -->
    
        <!-- subscribe-section end -->


        <!-- main-footer -->
        <?php include './include/footer.php'  ?>
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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>
    <script src="assets/js/timePicker.js"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU"></script>
    <script src="assets/js/gmaps.js"></script>
    <script src="assets/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script>
        $('#noshow').hide();
        $('#show').click(function (e) { 
            e.preventDefault();
            $('#noshow').show();
            
        });
    </script>


</body><!-- End of .page_wrapper -->

</html>