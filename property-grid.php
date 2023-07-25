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
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU&callback=initMap&sensor=false"></script>
    <script src="assets/js/jquery.js"></script>
    <style>
        @media only screen and (max-width: 767px){

            /* .theme-btn {
                width: 100px !important;
                height: 50px;
            } */
        }
    </style>


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
        <!-- banner-section -->
        <section class="banner-style-two centred">
            <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/bannerhome.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>
                                <?= $propertyCategory ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/bannerhome2.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>
                                <?= $propertyCategory ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/bannerhome3.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>
                                <?= $propertyCategory ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- <section class="location-section">
            <div class="map-column">
          
            
                                 <div id="googleMap" style="width: 100%; height: 600px;"></div>

    <script type="text/javascript">
    var locationArray = [
    <?php
    include("include/opendb.php");
    if (isset($_POST['searchBtn'])) {

        $state = $_POST['state'];
        $column_num = 1;
        $sql2 = "SELECT * FROM properties WHERE state='$state'";
    } else {

        $column_num = 1;
        $sql2 = "SELECT * FROM properties WHERE state='Lagos'";
    }
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        while ($info2 = mysqli_fetch_array($result2)) {
            $latitude = $info2['langtitude'];
            $longitude = $info2['longtitude'];
            $city = $info2['city'];

            // echo"[$city, $latitude, $longitude, $column_num],";
    
            echo "['$city', $latitude, $longitude, $column_num],";
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
        </section>
         -->
        <!-- search-field-section -->
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                <div class="search-field">
                        <div class="tabs-box">
                           
                            <!-- <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1"> -->
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="" method="post" class="search-form d-flex justify-content-center align-items-center text-center">
                                                <div class="row clearfix w-100" >
                                                    <div class="col-lg-5 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <div class="field-input">
                                                                <select class="form-control" name="propertyCategory"
                                                                    required>
                                                                    <option data-display="Property Type">Property Type
                                                                    </option>
                                                                    <?php
                                                                    if ($propertyCategory == 'Land'):
                                                                        ?>
                                                                    <option value="Residential"  class="text-capitalize">Residential</option>
                                                                    <option value="commercial"  class="text-capitalize">commercial</option>
                                                                    <option value="Mixed Area"  class="text-capitalize"> Mixed Area</option>
                                                                    <?php else: ?>
                                                                    <option value="Detached Duplex"  class="text-capitalize">Detached Duplex
                                                                    </option>
                                                                    <option value="Terrace Duplex"  class="text-capitalize"> Terrace Duplex
                                                                    </option>
                                                                    <option value="Flat/Apartment"  class="text-capitalize">Flat/Apartment
                                                                    </option>
                                                                    <option value="Detached Bungalow"  class="text-capitalize">Detached Bungalow
                                                                    </option>
                                                                    <option value="Semi Detached Bungalow"  class="text-capitalize">Semi Detached
                                                                        Bungalow</option>
                                                                    <option value="Semi Detached Duplex"  class="text-capitalize">Semi Detached
                                                                        Duplex</option>
                                                                    <option value="Terrace Bungalow"  class="text-capitalize">Terrace Bungalow
                                                                    </option>
                                                                    <?php endif; ?>
                                                                    <!-- <option value="Distress Properties">Distress Property</option>
                                                                    <option value="Non Distress
                                                                        Properties">Non-Distress Property
                                                                    </option>
                                                                    <option value="Autos/Machinery">Autos & Machinery</option>
                                                                    <option value="Land">Land</option> -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-6 col-sm-12 column">
                                                        <div class="form-group">
                                                            <div class="select-box">
                                                                <select class="form-control" name="state" required>
                                                                    <option data-display="Select State">Select State
                                                                    </option>
                                                                    <option>ABUJA FCT</option>
                                                                    <option>ABIA</option>
                                                                    <option>ADAMAWA</option>
                                                                    <option>AKWA IBOM</option>
                                                                    <option>ANAMBRA</option>
                                                                    <option>BAUCHI</option>
                                                                    <option>BAYELSA</option>
                                                                    <option>BENUE</option>
                                                                    <option>BORNO</option>
                                                                    <option>CROSS RIVER</option>
                                                                    <option>DELTA</option>
                                                                    <option>EBONYI</option>
                                                                    <option>EDO</option>
                                                                    <option>EKITI</option>
                                                                    <option>ENUGU</option>
                                                                    <option>GOMBE</option>
                                                                    <option>IMO</option>
                                                                    <option>JIGAWA</option>
                                                                    <option>KADUNA</option>
                                                                    <option>KANO</option>
                                                                    <option>KATSINA</option>
                                                                    <option>KEBBI</option>
                                                                    <option>KOGI</option>
                                                                    <option>KWARA</option>
                                                                    <option>LAGOS</option>
                                                                    <option>NASSARAWA</option>
                                                                    <option>NIGER</option>
                                                                    <option>OGUN</option>
                                                                    <option>ONDO</option>
                                                                    <option>OSUN</option>
                                                                    <option>OYO</option>
                                                                    <option>PLATEAU</option>
                                                                    <option>RIVERS</option>
                                                                    <option>SOKOTO</option>
                                                                    <option>TARABA</option>
                                                                    <option>YOBE</option>
                                                                    <option>ZAMFARA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-md-6 col-sm-12 column">
                                                        <input type="hidden" value="Nigeria" name="area_location">
                                                        <div class="form-group">
                                                            <input type="submit" value="Search" name="searchBtn" class="btn theme-btn btn-one form-control" style="padding: 0px;">
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <!-- </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

      
        <!-- search-field-section end -->




        <!-- property-page-section -->
        <section class="property-page-section property-grid">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5>Property</h5>
                                </div>
                                <div class="panel-body">
                                    <!-- <form action="" method="post" class="form-light d-none">
                                        <input type="hidden" name="_token"
                                            value="LLm2UyrhInZ03U48KYRn8EQrgg71P31vvSNEuWq3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="easy-autocomplete">
                                                        <textarea data-prefix="" name="Location"
                                                            placeholder="Enter a state, locality or area"
                                                            data-results="all" style="height:36px;" type="text"
                                                            class="form-control side-panel-search propertyLocation"
                                                            autocomplete="off" id="eac-118" required></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Property Category</label>
                                            <select name="category" id="trigShow" required class="form-control">
                                                <option value=""> Property Category
                                                <option value="Distress Properties">Distress Property
                                                </option>
                                                <option value="Non Distress Properties">Non-Distress
                                                    Property
                                                </option>
                                                <option value="Autos/Machinery">Autos & Machinery</option>
                                                <option value="Land">Land</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 column show1">
                                                <label>Land Category</label>
                                                <div class="field-input">
                                                    <select class="form-control" name="landcategory" id="">
                                                        <option value="">
                                                            Land Category
                                                        </option>
                                                        <option value="Residential">Residential</option>
                                                        <option value="commercial">commercial</option>
                                                        <option value="Mixed Area"> Mixed Area</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 show">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="0" selected="selected">Select Types</option>
                                                        <option value="Detached Duplex">Detached Duplex</option>
                                                        <option value="Terrace Duplex"> Terrace Duplex</option>
                                                        <option value="Flat/Apartment">Flat/Apartment</option>
                                                        <option value="Detached Bungalow">Detached Bungalow</option>
                                                        <option value="Semi Detached Bungalow">Semi Detached
                                                            Bungalow</option>
                                                        <option value="Semi Detached Duplex">Semi Detached Duplex
                                                        </option>
                                                        <option value="Terrace Bungalow">Terrace Bungalow</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 show">
                                                <div class="form-group">
                                                    <label>Bedrooms</label>
                                                    <select name="bedrooms" id="bedrooms" class="form-control">
                                                        <option value="0" selected="selected">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 show">
                                                <div class="form-group">
                                                    <label>Toilets</label>
                                                    <select name="toilets" id="toilets" class="form-control">
                                                        <option value="0" selected="selected">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group show">
                                                    <label>Bathroooms</label>
                                                    <select name="bathroooms" id="bathroooms" class="form-control">
                                                        <option value="0" selected="selected">Any</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6+</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Min price</label>
                                                    <select name="minprice" required id="minprice" class="form-control">
                                                        <option value="0" selected="selected">No Min</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max price</label>
                                                    <select name="maxprice" required id="maxprice" class="form-control">
                                                        <option value="0" selected="selected">No Max</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Property Ref.</label>
                                                    <input name="ref" id="ref" class="form-control"
                                                        placeholder="e.g. 83256" type="number" min="0" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input name="keywords" id="keywords" required class="form-control"
                                                        placeholder="e.g. 'pool' or 'jacuzzi'" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="advquery" class="theme-btn btn-one ">
                                                    <span>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form> -->
                                    <?php if($_GET['propertyCategory'] == 'Distress Properties'):  ?>
                                    <form action="" method="post" class="form-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="easy-autocomplete">
                                                        <textarea data-prefix="" name="Location"
                                                            placeholder="Enter a state, locality or area"
                                                            data-results="all" style="height:36px;" type="text"
                                                            class="form-control side-panel-search propertyLocation"
                                                            autocomplete="off" id="eac-118" required></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="" selected="selected">Select Types</option>
                                                        <option  class="text-capitalize"  value="bungalow">bungalow</option>
                                                        <option  class="text-capitalize"  value="fully detached"> fully detached</option>
                                                        <option  class="text-capitalize"  value="semi detached">semi detached</option>
                                                        <option  class="text-capitalize"  value="terrace">terrace</option>
                                                        <option  class="text-capitalize"  value="maisonette">maisonette
                                                        </option>
                                                        <option  class="text-capitalize"  value="land">land
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Min price</label>
                                                    <select name="minprice" required id="minprice" class="form-control">
                                                        <option value="0" selected="selected">No Min</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max price</label>
                                                    <select name="maxprice" required id="maxprice" class="form-control">
                                                        <option value="0" selected="selected">No Max</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input name="keywords" id="keywords" required class="form-control"
                                                        placeholder="e.g. 'pool' or 'jacuzzi'" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="advquery" class="theme-btn btn-one ">
                                                    <span>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php elseif($_GET['propertyCategory'] == 'Non Distress Properties'):  ?>
                                    <form action="" method="post" class="form-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="easy-autocomplete">
                                                        <textarea data-prefix="" name="Location"
                                                            placeholder="Enter a state, locality or area"
                                                            data-results="all" style="height:36px;" type="text"
                                                            class="form-control side-panel-search propertyLocation"
                                                            autocomplete="off" id="eac-118" required></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option  class="text-capitalize" value="" selected="selected">Select Types</option>
                                                        <option  class="text-capitalize" value="bungalow">bungalow</option>
                                                        <option  class="text-capitalize" value="fully detached"> fully detached</option>
                                                        <option  class="text-capitalize" value="semi detached">semi detached</option>
                                                        <option  class="text-capitalize" value="terrace">terrace</option>
                                                        <option  class="text-capitalize" value="maisonette">maisonette
                                                        </option>
                                                        <option  class="text-capitalize" value="land">land
                                                        </option>
                                                        <option  class="text-capitalize" value="apartment-block">apartment-block
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Min price</label>
                                                    <select name="minprice" required id="minprice" class="form-control">
                                                        <option value="0" selected="selected">No Min</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max price</label>
                                                    <select name="maxprice" required id="maxprice" class="form-control">
                                                        <option value="0" selected="selected">No Max</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input name="keywords" id="keywords" required class="form-control"
                                                        placeholder="e.g. 'pool' or 'jacuzzi'" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="advquery" class="theme-btn btn-one ">
                                                    <span>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php elseif($_GET['propertyCategory'] == 'Autos/Machinery'):  ?>
                                    <form action="" method="post" class="form-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="easy-autocomplete">
                                                        <textarea data-prefix="" name="Location"
                                                            placeholder="Enter a state, locality or area"
                                                            data-results="all" style="height:36px;" type="text"
                                                            class="form-control side-panel-search propertyLocation"
                                                            autocomplete="off" id="eac-118" required></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option  class="text-capitalize" value="0" selected="selected">Select Types</option>
                                                        <option  class="text-capitalize" value="Vechicle">Vechicle</option>
                                                        <option  class="text-capitalize" value="motorbike"> motorbike</option>
                                                        <option  class="text-capitalize" value="aircraft">aircraft</option>
                                                        <option  class="text-capitalize" value="vessel/ships">vessel/ships</option>
                                                        <option  class="text-capitalize" value="cranes">cranes</option>
                                                        <option  class="text-capitalize" value="scaffold iron bars">scaffold iron bars
                                                        </option>
                                                        <option  class="text-capitalize" value="wires and conductors">wires and conductors
                                                        </option>
                                                        <option  class="text-capitalize" value="heavy machineries">heavy machineries</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Min price</label>
                                                    <select name="minprice" required id="minprice" class="form-control">
                                                        <option value="0" selected="selected">No Min</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max price</label>
                                                    <select name="maxprice" required id="maxprice" class="form-control">
                                                        <option value="0" selected="selected">No Max</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input name="keywords" id="keywords" required class="form-control"
                                                        placeholder="e.g. 'pool' or 'jacuzzi'" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="advquery" class="theme-btn btn-one ">
                                                    <span>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php elseif($_GET['propertyCategory'] == 'Land'):  ?>
                                    <form action="" method="post" class="form-light">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="easy-autocomplete">
                                                        <textarea data-prefix="" name="Location"
                                                            placeholder="Enter a state, locality or area"
                                                            data-results="all" style="height:36px;" type="text"
                                                            class="form-control side-panel-search propertyLocation"
                                                            autocomplete="off" id="eac-118" required></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option  class="text-capitalize" value="0" selected="selected">Select Types</option>
                                                        <option  class="text-capitalize" value="Wetland">Wetland</option>
                                                        <option  class="text-capitalize" value="dry land"> dry land</option>
                                                        <option  class="text-capitalize" value="sandfilled">sandfilled</option>
                                                        <option  class="text-capitalize" value="bare-land">bare-land</option>
                                                        <option  class="text-capitalize" value="demolishable">demolishable</option>
                                                        <option  class="text-capitalize" value="Semi Detached Duplex">Semi Detached Duplex
                                                        </option>
                                                        <option  class="text-capitalize" value="Terrace Bungalow">Terrace Bungalow</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Min price</label>
                                                    <select name="minprice" required id="minprice" class="form-control">
                                                        <option value="0" selected="selected">No Min</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Max price</label>
                                                    <select name="maxprice" required id="maxprice" class="form-control">
                                                        <option value="0" selected="selected">No Max</option>
                                                        <option value="250000"> 250,000</option>
                                                        <option value="500000"> 500,000</option>
                                                        <option value="750000"> 750,000</option>
                                                        <option value="1000000"> 1 Million</option>
                                                        <option value="2000000"> 2 Million</option>
                                                        <option value="5000000"> 5 Million</option>
                                                        <option value="10000000"> 10 Million</option>
                                                        <option value="20000000"> 20 Million</option>
                                                        <option value="30000000"> 30 Million</option>
                                                        <option value="40000000"> 40 Million</option>
                                                        <option value="60000000"> 60 Million</option>
                                                        <option value="80000000"> 80 Million</option>
                                                        <option value="100000000"> 100 Million</option>
                                                        <option value="150000000"> 150 Million</option>
                                                        <option value="200000000"> 200 Million</option>
                                                        <option value="250000000"> 250 Million</option>
                                                        <option value="300000000"> 300 Million</option>
                                                        <option value="400000000"> 400 Million</option>
                                                        <option value="500000000"> 500 Million</option>
                                                        <option value="600000000"> 600 Million</option>
                                                        <option value="700000000"> 700 Million</option>
                                                        <option value="800000000"> 800 Million</option>
                                                        <option value="900000000"> 900 Million</option>
                                                        <option value="1000000000"> 1 Billion</option>
                                                        <option value="2000000000"> 2 Billion</option>
                                                        <option value="5000000000"> 5 Billion</option>
                                                        <option value="10000000000"> 10 Billion</option>
                                                        <option value="20000000000"> 20 Billion</option>
                                                        <option value="30000000000"> 30 Billion</option>
                                                        <option value="40000000000"> 40 Billion</option>
                                                        <option value="50000000000"> 50 Billion</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input name="keywords" id="keywords" required class="form-control"
                                                        placeholder="e.g. 'pool' or 'jacuzzi'" value=""
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Square Meters</label>
                                                    <input name="sqrt" id="sqrt" required class="form-control"
                                                        placeholder="500">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="submit" name="advquery" class="theme-btn btn-one ">
                                                    <span>Search</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php endif;  ?>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="item-shorting clearfix">
                                <div class="left-column pull-left">
                                    <?php
                                    $count = $dbs->SelectAllApropertiesNoSessNoLimitCount($propertyCategory);
                                    // Number of items per page
                                    $itemsPerPage = 9;

                                    // Current page number
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                    // Calculate the starting index of the items to display
                                    $startIndex = ($page - 1) * $itemsPerPage;

                                    // Query to fetch the items from the database
                                    // Replace this with your own query to fetch the items
                                    $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                    $fetchCount = count($fetch);
                                    ?>
                                    <h5>Search Reasults: <span>Showing
                                            <?= $fetchCount ?> of
                                            <?= $count ?> Listings
                                        </span></h5>
                                </div>
                                <div class="right-column pull-right clearfix">
                                    <div class="short-box clearfix">
                                        <!-- <div class="select-box">
                                            <select class="wide">
                                               <option data-display="Sort by: Newest">Sort by: Newest</option>
                                               <option value="1">New Arrival</option>
                                               <option value="2">Top Rated</option>
                                               <option value="3">Offer Place</option>
                                               <option value="4">Most Place</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="short-menu clearfix">
                                        <!-- <button class="list-view "><i class="icon-35"></i></button>
                                        <button class="grid-view on"><i class="icon-36"></i></button> -->
                                    </div>
                                </div>
                            </div>


                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                    <?php
                                    if (isset($_POST['advquery'])) {
                                        // Number of items per page
                                        $itemsPerPage = 9;

                                        // Current page number
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                        // Calculate the starting index of the items to display
                                        $startIndex = ($page - 1) * $itemsPerPage;

                                        // Query to fetch the items from the database
                                        // Replace this with your own query to fetch the items
                                        $Location = $_POST['Location'];
                                        $typeproperty = $_POST['type'];
                                        $minprice = $_POST['minprice'];
                                        $maxprice = $_POST['maxprice'];
                                        $keywords = $_POST['keywords'];
                                         if($_GET['propertyCategory'] == 'Distress Properties'):  
                                            $fetch = $dbs->AdvanceSearchqueryDis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                         elseif($_GET['propertyCategory'] == 'Non Distress Properties'):
                                            $fetch = $dbs->AdvanceSearchqueryDis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                         elseif($_GET['propertyCategory'] == 'Autos/Machinery'):
                                            $fetch = $dbs->AdvanceSearchqueryDis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                        elseif($_GET['propertyCategory'] == 'Land'): 
                                            $sqrt = $_POST['sqrt'];
                                            $fetch = $dbs->AdvanceSearchqueryLand($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex, $sqrt);
                                         endif;
                                        // $fetch = $dbs->AdvanceSearchquery($Location, $propertyCategory, $landcategory, $typeproperty, $bedrooms, $bathroom, $toilets, $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex, $ref);

                                        // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                
                                        // Execute the query and fetch the items
                                        // Replace this with your own code to execute the query and fetch the items
                                        // $items = []; // array to store the fetched items
                                
                                        // Query to get the total number of items
                                        // Replace this with your own query to get the total number of items
                                        // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                        if($_GET['propertyCategory'] == 'Distress Properties'):  
                                        $totalItemsQuery = $dbs->AdvanceSearchqueryNODis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                        elseif($_GET['propertyCategory'] == 'Non Distress Properties'):
                                        $totalItemsQuery = $dbs->AdvanceSearchqueryNODis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                        elseif($_GET['propertyCategory'] == 'Autos/Machinery'):
                                        $totalItemsQuery = $dbs->AdvanceSearchqueryNODis($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex);
                                        elseif($_GET['propertyCategory'] == 'Land'): 
                                        $totalItemsQuery = $dbs->AdvanceSearchqueryNOLand($Location, $typeproperty,  $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex, $sqrt);
                                        $sqrt = $_POST['sqrt'];
                                        endif;
                                        // $totalItemsQuery = $dbs->AdvanceSearchqueryNO($Location, $propertyCategory, $landcategory, $typeproperty, $bedrooms, $bathroom, $toilets, $minprice, $maxprice, $keywords, $itemsPerPage, $startIndex, $ref); 
                                        $totalItemsResult = $totalItemsQuery; // result of executing the query
                                
                                        // Get the total number of items
                                        $totalItems = $totalItemsResult;

                                        // Calculate the total number of pages
                                        $totalPages = ceil($totalItems / $itemsPerPage);
                                    } else {
                                        if (isset($_POST['searchBtn'])) {
                                            $propertyCategory = $_POST['propertyCategory'];
                                            $state = $_POST['state'];
                                            // echo $state;
                                            // $area_location = $_POST['area_location'];
                                            // $city = $_POST['city'];
                                            // $fetch = $dbs->SelectAllApropertiesWhere($user_id, $propertyCategory, $area_location, $city, $state);
                                            $fetch = $dbs->SelectAllApropertiesWhereNoSess($propertyCategory, $state);
                                            // Number of items per page
                                            $itemsPerPage = 9;

                                            // Current page number
                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                            // Calculate the starting index of the items to display
                                            $startIndex = ($page - 1) * $itemsPerPage;

                                            // Query to fetch the items from the database
                                            // Replace this with your own query to fetch the items
                                            //    $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                            // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                
                                            // Execute the query and fetch the items
                                            // Replace this with your own code to execute the query and fetch the items
                                            // $items = []; // array to store the fetched items
                                
                                            // Query to get the total number of items
                                            // Replace this with your own query to get the total number of items
                                            // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                            $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory);
                                            $totalItemsResult = $totalItemsQuery; // result of executing the query
                                
                                            // Get the total number of items
                                            $totalItems = $totalItemsResult['id'];

                                            // Calculate the total number of pages
                                            $totalPages = ceil($totalItems / $itemsPerPage);
                                        } else {
                                            // Number of items per page
                                            $itemsPerPage = 9;

                                            // Current page number
                                            $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                            // Calculate the starting index of the items to display
                                            $startIndex = ($page - 1) * $itemsPerPage;

                                            // Query to fetch the items from the database
                                            // Replace this with your own query to fetch the items
                                            $fetch = $dbs->SelectAllApropertiesNoSessNoLimitPag($propertyCategory, $itemsPerPage, $startIndex);
                                            // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                
                                            // Execute the query and fetch the items
                                            // Replace this with your own code to execute the query and fetch the items
                                            // $items = []; // array to store the fetched items
                                
                                            // Query to get the total number of items
                                            // Replace this with your own query to get the total number of items
                                            // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                            $totalItemsQuery = $dbs->SelectAllApropertiesNoSessNoLimitPagCount($propertyCategory);
                                            $totalItemsResult = $totalItemsQuery; // result of executing the query
                                
                                            // Get the total number of items
                                            $totalItems = $totalItemsResult['id'];

                                            // Calculate the total number of pages
                                            $totalPages = ceil($totalItems / $itemsPerPage);

                                        }
                                    }

                                    if ($fetch):
                                        foreach ($fetch as $info):
                                            ?>
                                    <div class="deals-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <?php
                                                        $galleryimage = $info['galleryimage'];
                                                        $fetchgallery = $dbs->SelectFromImgLim($galleryimage);
                                                        foreach ($fetchgallery as $fetchgalleryInfo) {
                                                            ?>
                                                <figure class="image"><img
                                                        src="./galleryImage/<?= $fetchgalleryInfo['imagename'] ?>"
                                                        alt=""
                                                        style="object-fit: cover; background-position: center; height: 400px; ">
                                                </figure>
                                                <?php } ?>
                                            </div>
                                            <div class="lower-content">
                                                <div class="title-text">
                                                    <h4><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                            class="text-dark" style="color:#2F7366 !important;">
                                                            <?= $info['propertytitle'] ?>/
                                                            <?= $info['marketstatus'] ?>
                                                        </a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <!-- <h6>Start From</h6> -->
                                                        <h4><a
                                                                href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                <?= $info['symbol'] . number_format($info['propertyprice'], 2) ?>
                                                            </a></h4>
                                                    </div>
                                                     <!--<div class="author-box pull-right">
                                                        <figure class="author-tumb">
                                                            <img src="assets/images/footer-logo.png"
                                                                style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                                alt=""> 
                                                            <span> <a style=" width: 150px; padding: 0px;" href="bookeeping"
                                                                    class="m-1 theme-btn btn-one text-center">
                                                                    <span class="span" style="font-size: 15px; ">Book
                                                                        Inspection</span>
                                                                </a></span>
                                                        </figure>
                                                    </div>-->
                                                </div>
                                                <div class="title-text">
                                                    <h6><a
                                                            href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                            <?= $info['city'] ?>,
                                                            <?= $info['state'] ?>
                                                            <?= $info['area_location'] ?>
                                                        </a></h6>
                                                </div>
                                                <p>
                                                    <?= substr($info['detailedinfo'], 0, 77) . ' ...' ?>.
                                                </p>
                                                <!-- <ul class="more-details clearfix">
                                                    
                                                    <?php if($_GET['propertyCategory'] == 'Distress Properties'):   ?>
                                                    <li><i class="icon-14"></i>
                                                        <?= $info['bedrooms'] ?> Beds
                                                    </li>
                                                    <li><i class="icon-15"></i>
                                                        <?= $info['bathroom'] ?> Baths
                                                    </li>
                                                    <li><i class="icon-15"></i>
                                                        <?= $info['toilets'] ?> Toilets
                                                    </li>
                                                    <?php elseif($_GET['propertyCategory'] == 'Non Distress Properties'): ?>
                                                    <li><i class="icon-14"></i>
                                                        <?= $info['bedrooms'] ?> Beds
                                                    </li>
                                                    <li><i class="icon-15"></i>
                                                        <?= $info['bathroom'] ?> Baths
                                                    </li>
                                                    <li><i class="icon-15"></i>
                                                        <?= $info['toilets'] ?> Toilets
                                                    </li>
                                                    <?php elseif($_GET['propertyCategory'] == 'Autos/Machinery'): ?>
                                                    
                                                    <?php elseif($_GET['propertyCategory'] == 'Land'): ?>
                                                    
                                                    <p><i class="icon-16"></i>
                                                        <?= $info['landsize'] ?> landsize(sqrt)
                                                    </p>
                                                    <?php endif; ?>
                                                </ul> -->
                                                <div class="other-info-box clearfix">
                                                            <div class="btn-box btn-group  d-flex " style="width: 100%;">
                                                                <a style=" width: 30%; "
                                                                    href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                    class="m-1 theme-btn btn-one text-center">
                                                                    <span style="font-size: 15px; ">Details</span>
                                                                </a>
                                                                <a style=" width: 20%; " href="#modalId"
                                                                class="m-1 theme-btn btn-one text-center "
                                                                    data-toggle="modal">
                                                                    <span id='<?= $info[' longtitude'] ?>' class="span" title="
                                                                <?= $info['langtitude'] ?>" style="font-size: 15px;
                                                                ">Map</span>
                                                                </a>
                                                                <a style=" width: 50%; "
                                                                    href="bookeeping"
                                                                    class="m-1 theme-btn btn-one text-center">
                                                                    <span style="font-size: 15px; ">Book
                                                                        Inspection</span>
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

                                <div class="pagination-wrapper">
                                    <ul class="pagination clearfix">

                                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li><a href="?propertyCategory=<?= $propertyCategory ?>&page=<?php echo $i; ?>"
                                                <?php if ($i==$page) echo 'class="current"' ; ?>>
                                                <?php echo $i; ?>
                                            </a></li>
                                        <?php endfor; ?>

                                        <?php if ($i <= $totalPages): ?>
                                        <!-- <li><a href="?propertyCategory=<?= $propertyCategory ?>&page=<?php echo $i; ?>"><i class="fas fa-angle-right"></i></a></li> -->
                                        <?php endif; ?>
                                        <!-- <li><a href="property-grid.html">2</a></li>
                                    <li><a href="property-grid.html">3</a></li>
                                    <li><a href="property-grid.html"><i class="fas fa-angle-right"></i></a></li> -->
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

        <!-- Modal trigger button -->
        <!-- <button type="button" class="btn btn-primary btn-lg" >
  Launch
</button> -->

        <script>
            $(".span").click(function (e) {
                e.preventDefault();
                long = $(this).attr('id');
                lat = $(this).attr('title');
                src = 'https://maps.google.com/maps?q=' + lat + ', ' + long + '&z=15&output=embed'
                $("#iframe").attr('src', 'https://maps.google.com/maps?q=' + lat + ', ' + long + '&z=15&output=embed');
            });
        </script>

        <!-- Modal Body -->
        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Map</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="google-map-area">
                            <!-- <iframe src="https://maps.google.com/maps?q=<?= $info['langtitude'] ?>, <?= $info['longtitude'] ?>&z=15&output=embed" width="100%" height="270" frameborder="0" style="border:0" id="ifr></iframe> -->
                            <iframe src="" width="100%" height="270" frameborder="0" style="border:0"
                                id="iframe"></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>
    <!-- jequery plugins -->
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
    <script src="assets/js/jquery.paroller.min.js"></script>
    <script src="assets/js/nav-tool.js"></script>
    <script src="assets/js/product-filter.js"></script>


    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script>
        $(".show").hide()
        $(".show1").hide()

        $('#trigShow').change(function (e) {
            e.preventDefault();
            trigVal = $(this).val()
            if (trigVal == 'Land') {
                $(".show1").show()
                $(".show").hide()
            } else if (trigVal == 'Autos/Machinery') {
                $(".show").hide()
                $(".show1").hide()

            } else {
                $(".show1").hide()
                $(".show").show()
            }
        });
    </script>

</body><!-- End of .page_wrapper -->

</html>