<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$user_role = '';

$dbs = new Dbc();
$page = 'property-grid';
if (!$_GET['propertyCategory']) {
    header("location: index");
}
$propertyCategory = $_GET['propertyCategory'];
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

    <title>Distress Property Market - Properties</title>

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
    <!-- <link href="assets/css/nice-select.css" rel="stylesheet"> -->
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU&callback=initMap&sensor=false"></script>
 
</head>


<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">


       


        <!-- switcher menu -->
        
        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>

        <!-- End Mobile Menu -->



 <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/bgall.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1><?= $propertyCategory  ?></h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Property</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
		
       


        <!-- property-page-section -->
        <section class="property-page-section property-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <h5>Search Reasults: <span>Showing 1-5 of 20 Listings</span></h5>
                                </div>
                                
                            </div>
							<div class="item-shorting clearfix">
                                 <div id="googleMap" style="width: 100%; height: 400px;"></div>

    <script type="text/javascript">
    var locationArray = [
	<?php
	include("include/opendb.php");
		$column_num = 1;
		$sql2 = "SELECT * FROM properties WHERE state='Lagos'";
		$result2 = mysqli_query($conn, $sql2);
		if (mysqli_num_rows($result2) > 0) {	
		while($info2 = mysqli_fetch_array($result2)) {
		$latitude = $info2['langtitude'];
		$longitude = $info2['longtitude'];
		$city = $info2['city'];

      // echo"[$city, $latitude, $longitude, $column_num],";
	
       echo"['$city', $latitude, $longitude, $column_num],";
	   $column_num = $column_num + 1;
		}
		}
        ?>		
		
      
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 8,
      center: new google.maps.LatLng(6.524379, 3.379206),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locationArray.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locationArray[i][1], locationArray[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locationArray[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    </script>
                                
                            </div>
                            <div class="wrapper grid">
                                <div class="deals-grid-content grid-item">
                                    <div class="row clearfix">
                                        <?php
                                       
                                        if (!isset($_SESSION['useremail'])) {
                                            $fetch = $dbs->SelectAllApropertiesNoSessNoLimit($propertyCategory);
                                            
                                        } else {
                                            if (isset($_POST['searchBtn'])) {
                                                $propertyCategory = $_POST['propertyCategory'];
                                                $area_location = $_POST['area_location'];
                                                $city = $_POST['city'];
                                                $state = $_POST['state'];
                                                // $fetch = $dbs->SelectAllApropertiesWhere($user_id, $propertyCategory, $area_location, $city, $state);
                                                $fetch = $dbs->SelectAllApropertiesWhereNoSess($propertyCategory, $area_location, $city, $state);
                                            } else {
                                                // if (isset($user_id)) {
                                                //     # code...
                                                //     $fetch = $dbs->SelectAllAproperties($user_id, $propertyCategory);
                                                // } else {
                                                //     # code...
                                                // }
                                                $fetch = $dbs->SelectAllApropertiesNoSessNoLimit($propertyCategory);
                                                // echo $user_id;
                                                
                                            }
                                        }


                                        if ($fetch):
                                            foreach ($fetch as $info):
                                                ?>
                                                <div class="col-lg-4 col-md-4 col-sm-12 feature-block">
                                                    <div class="feature-block-one">
                                                        <div class="inner-box">
                                                            <div class="image-box">
                                                                <figure class="image"><img
                                                                        src="featuredGallery/<?= $info['featuredimage'] ?>"
                                                                        alt="">
                                                                </figure>
                                                                <!-- <div class="batch"><i class="icon-11"></i></div>
                                                                <span class="category">
                                                                    <?= $info['propertyCategory'] ?>
                                                                </span> -->
                                                            </div>
                                                            <div class="lower-content">
                                                                <div class="author-info clearfix">
                                                                    <div class="author pull-left">
                                                                        <figure class="author-thumb"><img
                                                                                src="assets/images/footer-logo.png"
                                                                                style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                                                alt="">
                                                                        </figure>
                                                                        <h6 class="text-uppercase">
                                                                            <?= $info['propertytitle'] ?>
                                                                        </h6>
                                                                    </div>
                                                                    <div class="buy-btn pull-right"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                            <?= '₦' . number_format($info['propertyprice'], 2) ?>
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
                                                                <div class="btn-box d-flex justify-content-center align-items-center text-center"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                        class="theme-btn btn-two ">See Details</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div
                                                            class="lower-content d-flex justify-content-center align-items-center ">
                                                            <div class="btn-box mt-5"><a href="javascript:void()"
                                                                    class="theme-btn btn-two">No Property Found</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper">
                                <ul class="pagination clearfix">
                                    <li><a href="property-grid.html" class="current">1</a></li>
                                    <li><a href="property-grid.html">2</a></li>
                                    <li><a href="property-grid.html">3</a></li>
                                    <li><a href="property-grid.html"><i class="fas fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- property-page-section end -->


        <!-- subscribe-section -->
        <!-- subscribe-section end -->


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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->

</html>