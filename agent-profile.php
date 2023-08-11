<?php
include('controller/session.php');
$page = 'agent-profile';

$reload = '';

// $reload = '';
$errorMessage = '';
if (isset($_POST['changepassword'])) {
    $table = 'real_users';
    $colume = 'user_password';
    $current_password = $dbusers->test_input($_POST['current_password']);
    $new_password = $dbusers->test_input($_POST['new_password']);
    $confirm_new_password = $dbusers->test_input($_POST['confirm_new_password']);
    if ($new_password === $confirm_new_password) {

        if (password_verify($user_password, $current_password)) {
            $hpass = password_hash($new_password, PASSWORD_DEFAULT);
            $updatePic = $dbusers->UpdateData($table, $colume, $hpass, $user_id);
            if ($updatePic) {

            }
        } else {
            $errorMessage = "<p class='text-danger'>Error: *Your Current Is Not Current </p>";
        }
    } else {
        $errorMessage = "<p class='text-danger'>Error: *Password Do Not Match </p>";
    }
}

if (isset($_FILES['profilepic'])) {
    $table = 'real_users';
    $colume = 'profilepic';
    $folder = 'img/';

    if (isset($_FILES['profilepic']) && ($_FILES['profilepic'] != '')) {
        $newimg = $folder . time() . '_' . $_FILES['profilepic']['name'];
        move_uploaded_file($_FILES['profilepic']['tmp_name'], $newimg);
    } else {
        // $newimg = $oldimg;
    }
    $updatePic = $dbusers->UpdateData($table, $colume, $newimg, $user_id);
    if ($updatePic) {

    }
}

if (isset($_POST['saveProfile'])) {

    $fullname = $dbusers->test_input($_POST['fullname']);
    $usertitle = $dbusers->test_input($_POST['usertitle']);
    $user_email = $dbusers->test_input($_POST['user_email']);
    $userphone = $dbusers->test_input($_POST['userphone']);
    $aboutuser = $dbusers->test_input($_POST['aboutuser']);

    $updateData = $dbusers->UpdateAgentProfile($fullname, $user_email, $usertitle, $userphone, $aboutuser, $user_id);
    if ($updateData) {

    }
}
$display = 'style="display: none;"';
$errorMessage = '';
$alertColor = 'danger';
$propertytitle = '';
$propertyprice = '';
$area_location = 'Country';
$address = '';
$city = 'LGA';
$state = 'State';
$longtitude = '';
$langtitude = '';
$detailedinfo = '';
$propertyCategory = '';
$bedrooms = '';
$bathroom = '';
$toilets = '';
$propsize = '';
$parkingspace = '';
$landsize = '';
$titleproperty = '';
$typeproperty = '';
$landcategory = '';
$youtubelink = '';
$marketstatus = '';
$distresscat = '';
$autocat = '';
$estatename = '';
$refno = '';

$id = '';
$formType = '';
if (isset($_GET['edit'])) {
    # code...
    $id = $_GET['edit'];
    $info = $dbusers->SelectAllApropertiesNoSessWhereNoCat($id);
    $propertytitle = $info['propertytitle'];
    $propertyprice = $info['propertyprice'];
    $area_location = $info['area_location'];
    $address = $info['address'];
    $city = $info['city'];
    $state = $info['state'];
    $longtitude = $info['longtitude'];
    $langtitude = $info['langtitude'];
    $detailedinfo = $info['detailedinfo'];
    $propertyCategory = $info['propertyCategory'];
    $bedrooms = $info['bedrooms'];
    $bathroom = $info['bathroom'];
    $toilets = $info['toilets'];
    $propsize = $info['propsize'];
    $parkingspace = $info['parkingspace'];
    $landsize = $info['landsize'];
    $titleproperty = $info['titleproperty'];
    $typeproperty = $info['typeproperty'];
    $landcategory = $info['landcategory'];
    $youtubelink = $info['youtubelink'];
    $marketstatus = $info['marketstatus'];
    $distresscat = $info['distresscat'];
    $autocat = $info['autocat'];
    $estatename = $info['estatename'];
    $refno = $info['refno'];
}

if (isset($_GET['del'])) {
    # code...
    $id = $_GET['del'];
    $result = $dbusers->DeleteProps($id);
    if ($result) {

        $display = ' ';
        $alertColor = 'success';
        $errorMessage = 'Deleted successfully';
        header("location: agent-profile");

    }

}

if (isset($_SESSION['galleryimageid'])) {
    $galleryimageid = $_SESSION['galleryimageid'];

} else {
    $galleryimageid = 'img' . rand(1000, 10000);
    $_SESSION['galleryimageid'] = $galleryimageid;

}
if (isset($_POST['propertytitle'])) {
    $propertyid = 'props' . rand(1000, 10000);
    // $user_id = 'user_id' . rand(1000, 10000);
    $propertytitle = $dbusers->test_input($_POST['propertytitle']);
    $symbol = $dbusers->test_input($_POST['symbol']);
    $propertyprice = $dbusers->test_input($_POST['propertyprice']);
    $area_location = $dbusers->test_input($_POST['area_location']);
    $address = $dbusers->test_input($_POST['address']);
    $city = $dbusers->test_input($_POST['city']);
    $state = $dbusers->test_input($_POST['state']);
    $longtitude = $dbusers->test_input($_POST['longtitude']);
    $langtitude = $dbusers->test_input($_POST['langtitude']);
    $detailedinfo = $dbusers->test_input($_POST['detailedinfo']);
    $propertyCategory = $dbusers->test_input($_POST['propertyCategory']);
    $formType = $dbusers->test_input($_POST['formType']);

    if (!empty($_POST['bedrooms'])) {
        $bedrooms = $dbusers->test_input($_POST['bedrooms']);
        $bathroom = $dbusers->test_input($_POST['bathroom']);
        $toilets = $dbusers->test_input($_POST['toilets']);
        $propsize = $dbusers->test_input($_POST['propsize']);
        $parkingspace = $dbusers->test_input($_POST['parkingspace']);
    }else{
        $bedrooms = $dbusers->test_input($_POST['bedrooms1']);
        $bathroom = $dbusers->test_input($_POST['bathroom1']);
        $toilets = $dbusers->test_input($_POST['toilets1']);
        $propsize = $dbusers->test_input($_POST['propsize1']);
        $parkingspace = $dbusers->test_input($_POST['parkingspace1']);

    }
    $landsize = $dbusers->test_input($_POST['landsize']);
    $titleproperty = '';
    // $titleproperty = $dbusers->test_input($_POST['titleproperty']);
    $youtubelink = $dbusers->test_input($_POST['youtubelink']);
    $marketstatus = $dbusers->test_input($_POST['marketstatus']);
    $estatename = $dbusers->test_input($_POST['estatename']);
    $refno = $dbusers->test_input($_POST['refno']);
    if (!empty($_POST['typeproperty'])) {
        $typeproperty = $dbusers->test_input($_POST['typeproperty']);
    } elseif (!empty($_POST['landcategory'])) {
        $typeproperty = $dbusers->test_input($_POST['landcategory']);
    } elseif (!empty($_POST['distresscat'])) {
        $typeproperty = $dbusers->test_input($_POST['distresscat']);
    } else {
        $typeproperty = $dbusers->test_input($_POST['autocat']);
    }
    // $featuredimage = '';
    $featuredimage = $_FILES['featuredimage']['name'];
    // $galleryimage = $_FILES['galleryimage']['name'];
    // echo $typeproperty; 

    $galleryimageid = $_SESSION['galleryimageid'];
    
    
    $status = 'pending';
    $id = $dbusers->test_input($_POST['id']);
    $agent_id = $_SESSION['agent_id'];
    
    
    if (empty($propertyid) && empty($propertytitle) && empty($propertyprice) && empty($area_location) && empty($address) && empty($state) && empty($detailedinfo) && empty($marketstatus) && empty($youtubelink)) {
        
        $display = ' ';

        $errorMessage = 'Form Not Completely Filled';
    } else {
        $lastupdate = date("d M Y");
        if ($formType == 'edit') {
            $sql = $dbusers->EditProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimageid, $propertyCategory, $id, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize, $titleproperty, $typeproperty, $landcategory, $youtubelink, $marketstatus, $symbol, $distresscat, $autocat, $estatename, $refno, $lastupdate);
        } else {
            $sql = $dbusers->UploadProps($user_id, $propertyid, $propertytitle, $propertyprice, $area_location, $address, $city, $state, $longtitude, $langtitude, $detailedinfo, $featuredimage, $galleryimageid, $status, $propertyCategory, $bedrooms, $bathroom, $toilets, $propsize, $parkingspace, $landsize, $titleproperty, $typeproperty, $landcategory, $youtubelink, $marketstatus, $symbol, $agent_id, $distresscat, $autocat, $estatename, $refno, $lastupdate);
        }

        if ($sql) {
            // $totalFiles = count($_FILES["galleryimage"]["name"]);
            // if ($totalFiles > 20) {
            //     $display = ' ';

            //     $errorMessage = "cannot upload more than 20 files.<br>";
            // } else {

                $targetDirectory = "featuredGallery/";
                $targetFile = $targetDirectory . basename($_FILES["featuredimage"]["name"]);
                if (move_uploaded_file($_FILES["featuredimage"]["tmp_name"], $targetFile)) {
                  $display = ' ';
                   $errorMessage = "File uploaded successfully.";
                 } else {
                  $display = ' ';
                  $errorMessage = "File upload failed.";
                 } 

            //     // $targetDirectory = 'galleryImage/';

            //     // // Iterate through the uploaded files
            //     // for ($i = 0; $i < count($_FILES['galleryimage']['name']); $i++) {
            //     //     $filename = $_FILES['galleryimage']['name'][$i];
            //     //     $tempFilePath = $_FILES['galleryimage']['tmp_name'][$i];
            //     //     $targetFilePath = $targetDirectory . $filename;

            //     //     // Move the temporary file to the target directory
            //     //     $sql = $dbusers->multiImage($galleryimageid, $filename);
            //     //     if (move_uploaded_file($tempFilePath, $targetFilePath) && $sql) {
            //     //         $display = ' ';
            //     //         $alertColor = 'success';
            //     //         if ($formType == 'edit') {
            //     //             $errorMessage = "Edited successfully.<br>";
            //     //             header("location: agent-profile");
            //     //         } else {
            //     //             $errorMessage = "Uploaded successfully.<br>";
            //     //         }
            //     //         // $errorMessage = "File $filename uploaded successfully.<br>";
            //     //     } else {
            //     //         $display = ' ';

            //     //         $errorMessage = "Error uploading file $filename.<br>";
            //     //     }
            //     // }
            // }
            // echo"<script>myDropzone.processQueue()</script>";
            unset($_SESSION['galleryimageid']);
            $display = ' ';
            $alertColor = 'success';
            if ($formType == 'edit') {
                $errorMessage = "Edited successfully.<br>";
                header("location: agent-profile");
            } else {
                $errorMessage = "Uploaded successfully.<br>";
            }

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

    <title>Distress Property Market - Agent Profiles</title>

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
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css.scss">
    <script src="assets/js/jquery.js"></script>
    <link rel="stylesheet" src="assets/dropify-master/dropify-master/dist/css/dropify.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/dropzone.min.js"></script>
    <style>
        .dropzone {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 20px;
            min-height: 150px;
        }

        .active {
            background-color: #2C7365 !important;
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 10px;
        }

        .image-container {
            display: block;
            flex-wrap: wrap;
            gap: 10px;
        }

        .image-container img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            margin-top: 20px;
            margin-bottom: 5px;

        }

        .dropzone .dz-preview .dz-progress {
            display: none !important;
            /* Hide the progress bar */
        }

        button {
            background-color: #D9A464;
            border: 2px solid #D9A464;
            color: #ffffff;
            box-shadow: 0 10px 30px 0px rgb(0 0 0 / 10%);
            position: relative;
            display: inline-block;
            overflow: hidden;
            vertical-align: middle;
            font-size: 17px;
            line-height: 25px;
            font-family: 'Rubik', sans-serif;
            font-weight: 500;
            text-align: center;
            padding: 15.5px 34px;
            text-transform: capitalize;
            border-radius: 5px;
            z-index: 1;
            transition: all 500ms ease;
        }

        /* .mbwhite {
            color: #D9A464 !important;
        } */
        @media only screen and (max-width: 1200px) {

            .mbwhite {
                color: black !important;
            }
        }
    </style>

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
        <section class="page-title centred" style="background-image: url(assets/images/slid8.jpeg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>My Account</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->



        <!-- agent-details -->
        <!-- <section class="agent-details">
            <div class="auto-container">
                <div class="agency-details-content">
                    <div class="agents-block-one">
                        <div class="inner-box mr-0">
                            <figure class="image-box"> <?php if (!$profilepic): ?>
                                    <img src="assets/images/resource/agency-details-1.jpg" alt="avatar" class="rounded">
                                <?php else: ?>
                                    <img src="<?= $profilepic ?>" alt="avatar" class="rounded">
                                <?php endif; ?>
                            </figure>
                            <div class="content-box">
                                <div class="upper clearfix">
                                    <div class="title-inner pull-left">
                                        <h4 class="text-white">Realhome Estate</h4>
                                        <span class="designation text-white">Modern House Real Estate Agent</span>
                                    </div>
                                    <ul class="social-list pull-right clearfix">
                                        <li><a href="agency-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="agency-details.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="agency-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <div class="text ">
                                    <p class=""> <?= $aboutuser ?> </p>
                                </div>
                                <ul class="info clearfix mr-0">
                                    <li><i class="fab fa fa-envelope "></i><a href="mailto:info@realhome.com" class="text-white"><?= $user_email ?></a></li>
                                    <li><i class="fab fa fa-phone"></i><a href="tel:03030571965" class="text-white"><?= $userphone ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- agent-details end -->

        <section class="mt-5">
            <div class="auto-container mb-5">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card p-5 shadow border-radius-4">
                            <div class="user-profile">
                                <div class="header clearflix">
                                    <div class="card text-white" style="width: 300px;">
                                        <?php if (!$profilepic): ?>
                                            <img src="assets/images/clients/clients-2.png" class="card-img-top  img-fluid"
                                                alt="...">
                                        <?php else: ?>
                                            <img src="<?= $profilepic ?>" class="card-img-top  img-fluid" alt="...">
                                        <?php endif; ?>

                                    </div>

                                </div>
                                <div class="detail clearfix mt-3">
                                    <div class="list-group">
                                        <a href="agent-profile" class="list-group-item list-group-item-action active">
                                            <i class="fa fa-person"></i>Profile
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action" id="show1">
                                            <i class="flaticon-house"></i>My Properties
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action" id="show2">
                                            <i class="flaticon-add"></i>Submit New Property
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#changeprofilepic"
                                            class="list-group-item list-group-item-action">
                                            <i class="flaticon-locked-padlock"></i>Change Profile Pic
                                        </a>
                                        <a href="change-password.html" data-toggle="modal" data-target="#changepassword"
                                            class="list-group-item list-group-item-action">
                                            <i class="flaticon-locked-padlock"></i>Change Password
                                        </a>
                                        <a href="logout" class="list-group-item list-group-item-action">
                                            <i class="flaticon-logout"></i>Log Out
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12  ">
                        <div>
                            <div class="card p-5 shadow radius-5" id="tab3">
                                <div class="deals-list-content list-item">
                                    <?php
                                    if (!isset($_SESSION['useremail'])) {

                                    } else {
                                        // Number of items per page
                                        $itemsPerPage = 6;

                                        // Current page number
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                        // Calculate the starting index of the items to display
                                        $startIndex = ($page - 1) * $itemsPerPage;

                                        // Query to fetch the items from the database
                                        // Replace this with your own query to fetch the items
                                        $fetch = $dbusers->SelectAllApropertiesNoCatNoLim($_SESSION['user_id'], $startIndex, $itemsPerPage);
                                        // $itemsQuery = "SELECT * FROM items LIMIT $startIndex, $itemsPerPage";
                                    
                                        // Execute the query and fetch the items
                                        // Replace this with your own code to execute the query and fetch the items
                                        // $items = []; // array to store the fetched items
                                    
                                        // Query to get the total number of items
                                        // Replace this with your own query to get the total number of items
                                        // $totalItemsQuery = "SELECT COUNT(*) as total FROM items";
                                        $totalItemsQuery = $dbusers->SelectAllApropertiesNoCatNoLimCount($user_id);
                                        $totalItemsResult = $totalItemsQuery; // result of executing the query
                                    
                                        // Get the total number of items
                                        $totalItems = $totalItemsResult;

                                        // Calculate the total number of pages
                                        $totalPages = ceil($totalItems / $itemsPerPage);
                                    }
                                    if ($fetch):
                                        foreach ($fetch as $info):
                                            ?>
                                            <div class="deals-block-one pb-2">
                                                <div class="inner-box">
                                                    <div class="image-box" style=" width: 100% !important;">
                                                        <?php
                                                        $galleryimage = $info['galleryimage'];
                                                        $fetchgallery = $dbusers->SelectFromImgLim($galleryimage);
                                                        foreach ($fetchgallery as $fetchgalleryInfo) {
                                                            ?>
                                                            <!-- <figure class="image"><img
                                                                    src="./galleryImage/<?= $fetchgalleryInfo['imagename'] ?>"
                                                                    alt=""
                                                                    style="object-fit: cover; background-position: center; width: 100% !important;  height: 400px;">
                                                            </figure> -->
                                                            <?php } ?>
                                                            <figure class="image"><img
                                                                    src="./featuredGallery/<?= $info['featuredimage'] ?>"
                                                                    alt=""
                                                                    style="object-fit: cover; background-position: center; width: 100% !important;  height: 400px;">
                                                            </figure>
                                                        <!-- <div class="batch"><i class="icon-11"></i></div>
                                                        <span class="category">Featured</span>
                                                        <div class="buy-btn"><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">For Buy</a></div> -->
                                                    </div>
                                                    <div class="lower-content">
                                                        <div class="title-text">
                                                            <h4><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                    class="text-white mbwhite">
                                                                    <?= $info['propertytitle'] ?>/
                                                                    <?= $info['marketstatus'] ?>
                                                                </a></h4>
                                                        </div>
                                                        <div class="price-box clearfix">
                                                            <div class="price-info pull-left">
                                                                <!-- <h6>Start From</h6> -->
                                                                <h4><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                        class="text-white mbwhite">
                                                                        <?= $info['symbol'] . $info['propertyprice'] ?>
                                                                    </a></h4>
                                                            </div>
                                                            <div class="author-box pull-right">
                                                                <figure class="author-thumb">
                                                                    <img src="assets/images/footer-logo.png"
                                                                        style="object-fit:cover; background-position: center; width: 60px; height: 40px; border-radius: 50%;"
                                                                        alt="">
                                                                    <span><a
                                                                            href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>">
                                                                            <?php if ($info['propertyCategory'] == 'Distress Properties'): ?>
                                                                                <?= $info['typeproperty'] ?>
                                                                            <?php elseif ($info['propertyCategory'] == 'Non Distress Properties'): ?>
                                                                                <?= $info['distresscat'] ?>
                                                                            <?php elseif ($info['propertyCategory'] == 'Autos/Machinery'): ?>
                                                                                <?= $info['typeproperty'] ?>
                                                                            <?php elseif ($info['propertyCategory'] == 'Land'): ?>
                                                                                                                                                                                                        <?= $info['landcategory'] ?> 
                                                                    <?php endif; ?>
                
                                                                   
                                                                        </a></span>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                        <div class="title-text">
                                                            <h6><a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                    class="text-white mbwhite">
                                                                    <?= $info['city'] ?>,
                                                                    <?= $info['state'] ?>
                                                                    <?= $info['area_location'] ?>
                                                                </a></h6>
                                                        </div>
                                                        <p class="text-white ">
                                                            <?= substr($info['detailedinfo'], 0, 77) . ' ...' ?>.
                                                        </p>
                                                        <ul class="more-details clearfix">
                                                            <?php if ($info['propertyCategory'] !== 'Land'): ?>
                                                                <?php if ($info['propertyCategory'] !== 'Autos/Machinery'): ?>

                                                                    <li><i class="icon-14"></i>
                                                                        <?= $info['bedrooms'] ?> Beds
                                                                    </li>
                                                                    <li><i class="icon-15"></i>
                                                                        <?= $info['bathroom'] ?> Baths
                                                                    </li>
                                                                    <li><i class="icon-15"></i>
                                                                        <?= $info['toilets'] ?> Toilets
                                                                    </li>

                                                                <?php else: ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <p class="text-white mbwhite"><i class="icon-16"></i>
                                                                    <?= $info['landsize'] ?> landsize(sqrt)
                                                                </p>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <div class="other-info-box clearfix">
                                                            <div class="btn-box  justify-content-center text-center ">
                                                                <a href="property-details?propertyCategory=<?= $info['propertyCategory'] ?>&id=<?= $info['id'] ?>"
                                                                    class="theme-btn btn-two ">See Details</a>

                                                                <a href="#modalId" class="theme-btn btn-two "
                                                                    data-toggle="modal"><span id='<?= $info[' longtitude'] ?>'
                                                                        class="span" title="
                                                                <?= $info['langtitude'] ?>">Map
                                                                    </span></a>

                                                                <a href="agent-profile?edit=<?= $info['id'] ?>"
                                                                    class="theme-btn btn-two ">Edit Post</a>

                                                                <a href="agent-profile?del=<?= $info['id'] ?>"
                                                                    class="theme-btn btn-two ">Delete</a>
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

                            </div>
                            <div class="card p-5 shadow radius-5" id="tab1">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-<?= $alertColor; ?>  " <?= $display; ?> role="alert">
                                                <?= $errorMessage ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Full name</label>
                                                <input type="text" name="fullname" value="<?= $fullname ?>"
                                                    class="form-control" placeholder="Fullname">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Your Title</label>
                                                <input type="text" name="usertitle" value="<?= $usertitle ?>"
                                                    class="form-control" placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input type="text" name="userphone" value="<?= $userphone ?>"
                                                    class="form-control" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Email </label>
                                                <input type="text" name="user_email" value="<?= $user_email ?>"
                                                    class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Your Bio</label>
                                                <textarea name="aboutuser" class="form-control" id="" cols="30"
                                                    rows="10"> <?= $aboutuser ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="theme-btn btn-one" name="saveProfile" type="submit">Save
                                                Change</button>
                                        </div>



                                    </div>
                                </form>
                            </div>
                            <div class="card p-5 shadow radius-5" id="tab2">

                                <form action="" method="POST" id="myForm" enctype="multipart/form-data">
                                    <div class="general-information">
                                        <h4><i class="icon-42"></i>General Information:</h4>
                                        <div class="inner-box default-form">
                                            <div class="row clearfix">
                                            <div class="col-lg-4 col-md-4 col-sm-12 column">
                                                    <label>Property Category</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="propertyCategory"
                                                            id="trigShow" required>
                                                            <option value="<?= $propertyCategory ?>">
                                                                <?= $propertyCategory ?>
                                                            </option>
                                                            <option value="Distress Properties" class="text-capitalize">Distress Property
                                                            </option>
                                                            <option value="Non Distress Properties" class="text-capitalize">Non-Distress
                                                                Property
                                                            </option>
                                                            <option value="Autos/Machinery"  class="text-capitalize">Autos & Machinery</option>
                                                            <option value="Land"  class="text-capitalize">Land</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 column">
                                                    <label>Market Status</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="marketstatus">
                                                            <option value="<?= $marketstatus ?>" required>
                                                                <?= $marketstatus ?>
                                                            </option>
                                                            <option value="For Sale">For Sale
                                                            </option>
                                                            <option value="Rented">Rented
                                                            </option>
                                                            <option value="Sold">Sold</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 column show">
                                                    <label>Property Type</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="typeproperty">
                                                            <option value="<?= $typeproperty ?>">
                                                                <?= $typeproperty ?>
                                                            </option>
                                                            <option value="bungalow"  class="text-capitalize">bungalow</option>
                                                            <option value="fully detached"  class="text-capitalize"> fully detached</option>
                                                            <option value="semi detached"  class="text-capitalize">semi detached</option>
                                                            <option value="terrace"  class="text-capitalize">terrace</option>
                                                            <option value="maisonette"  class="text-capitalize">maisonette
                                                            </option>
                                                            <option value="land"  class="text-capitalize">land
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 column show3">
                                                    <label>Property Type</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="distresscat">
                                                            <option value="<?= $typeproperty ?>">
                                                                <?= $typeproperty ?>
                                                            </option>
                                                            <option value="bungalow"  class="text-capitalize">bungalow</option>
                                                            <option value="fully detached"  class="text-capitalize"> fully detached</option>
                                                            <option value="semi detached"  class="text-capitalize">semi detached</option>
                                                            <option value="terrace"  class="text-capitalize">terrace</option>
                                                            <option value="maisonette"  class="text-capitalize">maisonette
                                                            </option>
                                                            <option value="land"  class="text-capitalize">land
                                                            </option>
                                                            <option value="apartment-block"  class="text-capitalize">apartment-block
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 column show2">
                                                    <label>Property Type</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="autocat">
                                                            <option value="<?= $typeproperty ?>">
                                                                <?= $typeproperty ?>
                                                            </option>
                                                            <option value="Vechicle"  class="text-capitalize">Vechicle</option>
                                                            <option value="motorbike"  class="text-capitalize"> motorbike</option>
                                                            <option value="aircraft"  class="text-capitalize">aircraft</option>
                                                            <option value="vessel/ships"  class="text-capitalize">vessel/ships</option>
                                                            <option value="cranes"  class="text-capitalize">cranes</option>
                                                            <option value="scaffold iron bars"  class="text-capitalize">scaffold iron bars
                                                            </option>
                                                            <option value="wires and conductors"  class="text-capitalize">wires and conductors</option>
                                                            <option value="heavy machineries"  class="text-capitalize">heavy machineries</option>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 column show1">
                                                    <label>Land Category</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="landcategory" id="">
                                                            <option value="<?= $typeproperty ?>">
                                                                <?= $typeproperty ?>
                                                            </option>
                                                             <option value="Residential"  class="text-capitalize">Residential</option>
                                                             <option value="Commercial"  class="text-capitalize">Commercial</option>
                                                             <option value="Mixed & used"  class="text-capitalize">Mixed & used</option>
                                                            <!-- <option value="Wetland"  class="text-capitalize">Wetland</option>
                                                            <option value="dry land"  class="text-capitalize"> dry land</option>
                                                            <option value="sandfilled"  class="text-capitalize">sandfilled</option>
                                                            <option value="bare-land"  class="text-capitalize">bare-land</option>
                                                            <option value="demolishable"  class="text-capitalize">demolishable</option>
                                                            <option value="Semi Detached Duplex"  class="text-capitalize">Semi Detached Duplex
                                                            </option>
                                                            <option value="Terrace Bungalow"  class="text-capitalize">Terrace Bungalow</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 column demoshow">
                                                    <label>Property Type</label>
                                                    <div class="field-input">
                                                        <select class="form-control" name="landcategory" id="">
                                                            
                                                            <option value=""  class="text-capitalize"></option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Property Name</label>
                                                        <?php if (isset($_GET['edit']) && !empty($_GET['edit'])) {
                                                            $formType = 'edit';
                                                            $id = $_GET['edit'];
                                                        } ?>
                                                        <input type="hidden" name="formType" value="<?= $formType ?>">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <input type="text" name="propertytitle"
                                                            value="<?= $propertytitle ?>" placeholder="Property Title"
                                                            required>
                                                    </div>
                                                </div>
                                               
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Ref No</label>
                                                        <input type="number"  name="refno"
                                                            value="<?= $refno ?>" placeholder="Ref No" required>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Estate Name</label>
                                                        <input type="text"  name="estatename"
                                                            value="<?= $estatename ?>" placeholder="Estate Name" required>

                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 column mt-3">
                                                    <label>Property Price</label>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="field-input">
                                                                <select class="form-control mt-2" name="symbol">
                                                                    <option value="₦">₦
                                                                    </option>
                                                                    <option value="$">$</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="field-input">
                                                                <input type="text" name="propertyprice"
                                                                    class="form-control" placeholder="Property Price"
                                                                    id="number-input" onkeyup="convertNumber()"
                                                                    value="<?= $propertyprice ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="result-output" class="field-input text-capitalize my-3">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Property Description</label>
                                                        <div class="field-input">
                                                            <textarea placeholder="Property Description"
                                                                name="detailedinfo"
                                                                required><?= $detailedinfo ?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Area/locality</label>
                                                        <input type="text" name="address" id="autocomplete"
                                                            placeholder="Area/locality" onFocus="geolocate()"
                                                            value="<?= $address ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Longitude</label>
                                                        <input type="text" name="longtitude" placeholder="-205.421560"
                                                            value="<?= $longtitude ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Latitude</label>
                                                        <input type="text" name="langtitude" placeholder="32.963381"
                                                            value="<?= $langtitude ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>State</label>

                                                        <label for="stateSelect">Select State:</label>
                                                        <select id="stateSelect" class="form-control"
                                                            onchange="populateCities()" name="state" required>
                                                            <option value="<?= $state ?>" selected>
                                                                <?= $state ?>
                                                            </option>
                                                            <option value="Abia">Abia</option>
                                                            <option value="Adamawa">Adamawa</option>
                                                            <option value="Akwa Ibom">Akwa Ibom</option>
                                                            <option value="Anambra">Anambra</option>
                                                            <option value="Bauchi">Bauchi</option>
                                                            <option value="Bayelsa">Bayelsa</option>
                                                            <option value="Benue">Benue</option>
                                                            <option value="Borno">Borno</option>
                                                            <option value="Cross River">Cross River</option>
                                                            <option value="Delta">Delta</option>
                                                            <option value="Ebonyi">Ebonyi</option>
                                                            <option value="Edo">Edo</option>
                                                            <option value="Ekiti">Ekiti</option>
                                                            <option value="Enugu">Enugu</option>
                                                            <option value="Federal Capital Territory">Federal Capital
                                                                Territory</option>
                                                            <option value="Gombe">Gombe</option>
                                                            <option value="Imo">Imo</option>
                                                            <option value="Jigawa">Jigawa</option>
                                                            <option value="Kaduna">Kaduna</option>
                                                            <option value="Kano">Kano</option>
                                                            <option value="Katsina">Katsina</option>
                                                            <option value="Kebbi">Kebbi</option>
                                                            <option value="Kogi">Kogi</option>
                                                            <option value="Kwara">Kwara</option>
                                                            <option value="Lagos">Lagos</option>
                                                            <option value="Nasarawa">Nasarawa</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Ogun">Ogun</option>
                                                            <option value="Ondo">Ondo</option>
                                                            <option value="Osun">Osun</option>
                                                            <option value="Oyo">Oyo</option>
                                                            <option value="Plateau">Plateau</option>
                                                            <option value="Rivers">Rivers</option>
                                                            <option value="Sokoto">Sokoto</option>
                                                            <option value="Taraba">Taraba</option>
                                                            <option value="Yobe">Yobe</option>
                                                            <option value="Zamfara">Zamfara</option>
                                                            <!-- Add other state options here -->
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>LGA</label>
                                                        <label for="citySelect">Select LGA:</label>
                                                        <select id="citySelect" class="form-control" name="city"
                                                            required>
                                                            <option value="<?= $city ?>" selected>
                                                                <?= $city ?>
                                                            </option>
                                                        </select>


                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="field-input">
                                                        <label>Country</label>
                                                        <div class="select-box">
                                                            <select class="form-control form-control"
                                                                name="area_location" required>
                                                                <option value="<?= $area_location ?>" selected>
                                                                    <?= $area_location ?>
                                                                </option>
                                                                <!-- <option data-display="Country">Country</option> -->
                                                                <!-- Country names and Country Name -->
                                                                <option value="Nigeria">Nigeria</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column show1">
                                                    <div class="field-input">
                                                        <label>Land Size</label>
                                                        <input type="number" name="landsize" placeholder="Land Size"
                                                            value="<?= $landsize ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 column show ">
                                                    <div class="field-input">
                                                        <label>Bedrooms</label>
                                                        <input type="number" name="bedrooms" placeholder="Bedrooms"
                                                            value="<?= $bedrooms ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                    <div class="field-input">
                                                        <label>Bathroom</label>
                                                        <input type="number" name="bathroom" placeholder="Bathroom"
                                                            value="<?= $bathroom ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                    <div class="field-input">
                                                        <label>Toilets</label>
                                                        <input type="number" name="toilets" placeholder="toilets"
                                                            value="<?= $toilets ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column show">
                                                    <div class="field-input">
                                                        <label>Property Size(Square Meter)</label>
                                                        <input type="number" name="propsize" placeholder="Property Size"
                                                            value="<?= $propsize ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column show">
                                                    <div class="field-input">
                                                        <label>Parking Space</label>
                                                        <input type="number" name="parkingspace"
                                                            placeholder="Parking Space" value="<?= $parkingspace ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column show3 ">
                                                    <div class="field-input">
                                                        <label>Bedrooms</label>
                                                        <input type="number" name="bedrooms1" placeholder="Bedrooms"
                                                            value="<?= $bedrooms ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column show3">
                                                    <div class="field-input">
                                                        <label>Bathroom</label>
                                                        <input type="number" name="bathroom1" placeholder="Bathroom"
                                                            value="<?= $bathroom ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12 column show3">
                                                    <div class="field-input">
                                                        <label>Toilets</label>
                                                        <input type="number" name="toilets1" placeholder="toilets"
                                                            value="<?= $toilets ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column show3">
                                                    <div class="field-input">
                                                        <label>Property Size(Square Meter)</label>
                                                        <input type="number" name="propsize1" placeholder="Property Size"
                                                            value="<?= $propsize ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column show3">
                                                    <div class="field-input">
                                                        <label>Parking Space</label>
                                                        <input type="number" name="parkingspace1"
                                                            placeholder="Parking Space" value="<?= $parkingspace ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 column ">
                                                    <div class="field-input">
                                                        <label>Youtube Link</label>
                                                        <input type="text" name="youtubelink" placeholder="Youtube Link"
                                                            value="<?= $youtubelink ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 column mt-3">
                                                    <div class="gallery-box">
                                                        <h4><i class="icon-16"></i>Featured Images:</h4>
                                                        <div class="upload-inner centred">
                                                            <input type="file"  class="dropify"  data-show-remove="false"  name="featuredimage" required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                </form>
                                <h4><i class="icon-16"></i>Gallery Image:</h4>
                                <form action="process.php" class="dropzone" id="myDropzone"></form>
                                <button class="theme-btn btn-one m-3" type="button" onclick="submitForm()"
                                    name="uploadProps">Upload</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>


    <!-- subscribe-section -->
    <!-- subscribe-section end -->


    <!-- main-footer -->
    <?php include('include/footer.php'); ?>
    <!-- main-footer end -->



    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-angle-up"></span>
    </button>

    <div class="modal property-modal fade p-5" id="changepassword" tabindex="-1" role="dialog"
        aria-labelledby="bioChangeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post">
                        <?= $errorMessage; ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>current password </label>
                                    <input type="password" class="form-control" name="current_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>New password </label>
                                    <input type="password" class="form-control" name="new_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Confirm password </label>
                                    <input type="password" class="form-control" name="confirm_new_password" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-5">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="changepassword" class="theme-btn btn-one">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal property-modal fade p-5" id="changeprofilepic" tabindex="-1" role="dialog"
        aria-labelledby="bioChangeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="profilepic" required="">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-5">
                                <div class="d-flex justify-content-center">
                                    <button name="changPic" class="theme-btn btn-one">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Map</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="google-map-area">
                        <!-- <iframe src="https://maps.google.com/maps?q=<?= $info['langtitude'] ?>, <?= $info['longtitude'] ?>&z=15&output=embed" width="100%" height="270" frameborder="0" style="border:0" id="ifr></iframe> -->
                        <iframe src="" width="100%" height="270" frameborder="0" style="border:0" id="iframe"></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <script src="assets/sweetalert/sweet.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/dropify.min.js"></script>
    <script src="./assets/dropify-master/dropify-master/dist/js/customDropify.js"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfCP4-o7KxqBfbWE5VX5Qw5a_M8P-mGUU&libraries=places&callback=initAutocomplete"
        defer></script>
    <script>
        function submitForm() {
            const form = document.getElementById('myForm');
            form.submit();
        }
        Dropzone.options.myDropzone = {
            paramName: 'file',
            maxFiles: 20, // Maximum number of files
            acceptedFiles: 'image/*', // Only accept image files
            dictDefaultMessage: 'Drop images here or click to upload', // Default message
            init: function () {
                this.on('success', function (file, response) {
                    console.log(response);
                });
                this.options.sortable = true; // Enable sorting

                this.on("queuecomplete", function() {
                    // Update the order of files after rearranging
                    var files = this.files;
                    console.log("Updated file order:", files);
                });
            },
            //   

            addRemoveLinks: true,
            autoProcessQueue: true,
            drop(e) {
    return this.element.classList.remove("dz-drag-hover");
  },
  dragstart(e) {},
  dragend(e) {
    return this.element.classList.remove("dz-drag-hover");
  },
  dragenter(e) {
    return this.element.classList.add("dz-drag-hover");
  },
  dragover(e) {
    return this.element.classList.add("dz-drag-hover");
  },
  dragleave(e) {
    return this.element.classList.remove("dz-drag-hover");
  },

  paste(e) {},

  // Called whenever there are no files left in the dropzone anymore, and the
  // dropzone should be displayed as if in the initial state.
  reset() {
    return this.element.classList.remove("dz-started");
  }

        };        // Initialize Dropzone.js


        // function handleFileSelect(event) {
        //     const files = event.target.files;
        //     const imageContainer = document.getElementById('imageContainer');
        //     const maxImages = 20 - imageContainer.childElementCount;

        //     if (files.length > maxImages) {
        //         alert('You can upload a maximum of 20 images.');
        //         return;
        //     }
        //     for (let i = 0; i < files.length; i++) {
        //         const file = files[i];
        //         const reader = new FileReader();

        //         reader.onload = function (event) {
        //             const imageUrl = event.target.result;
        //             const imageElement = document.createElement('img');
        //             imageElement.src = imageUrl;

        //             const deleteButton = document.createElement('button');
        //             deleteButton.innerText = 'Delete';
        //             deleteButton.addEventListener('click', function () {
        //                 imageElement.remove();
        //                 deleteButton.remove();
        //             });

        //             const imageWrapper = document.createElement('div');
        //             imageWrapper.appendChild(imageElement);
        //             imageWrapper.appendChild(deleteButton);

        //             imageContainer.appendChild(imageWrapper);
        //         }

        //         reader.readAsDataURL(file);
        //     }
        // }
        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                { types: ['geocode'] });

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
        // Load the Google Places Autocomplete API
        // google.maps.event.addDomListener(window, 'load', initialize);

        function numberToWords(number) {
            // Single-digit and teen numbers
            var units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];

            // Tens numbers
            var tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

            // Large number scales
            var scales = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion'];

            // Function to convert a number less than 1000 to words
            function convertToWordsBelowThousand(num) {
                var words = '';

                // Convert hundreds place
                if (num >= 100) {
                    words += units[Math.floor(num / 100)] + ' hundred ';
                    num %= 100;
                }

                // Convert tens and units place for numbers less than 100
                if (num >= 20) {
                    words += tens[Math.floor(num / 10)] + ' ';
                    num %= 10;
                }

                // Convert units place for numbers less than 20
                if (num > 0) {
                    words += units[num] + ' ';
                }

                return words.trim();
            }

            // Handle zero separately
            if (number === 0) {
                return 'zero';
            }

            var words = '';
            var scaleIndex = 0;

            // Split the number into groups of three digits and process each group
            while (number > 0) {
                var threeDigits = number % 1000;
                if (threeDigits !== 0) {
                    var groupWords = convertToWordsBelowThousand(threeDigits);
                    words = groupWords + ' ' + scales[scaleIndex] + ' ' + words;
                }

                number = Math.floor(number / 1000);
                scaleIndex++;
            }

            return words.trim();
        }
//         function formatNumber(e){
//             var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
//       val = this.value.replace(/^0+|\.|,/g, ""),
//       res;
      
//   if (val.length) {
//     res = Array.prototype.reduce.call(val, (p, c) => c + p)            // reverse the pure numbers string
//                .match(rex)                                            // get groups in array
//                .reduce((p, c, i) => i - 1 ? p + "," + c : p + "." + c); // insert (.) and (,) accordingly
//     res += /\.|,/.test(res) ? "" : ".0";                              // test if res has (.) or (,) in it
//     this.value = Array.prototype.reduce.call(res, (p, c) => c + p);    // reverse the string and display
//   }
// }

// var ni = document.getElementById("number-input");



        function convertNumber() {
            var numberInput = document.getElementById('number-input');
var resultOutput = document.getElementById('result-output');

var number = parseInt(numberInput.value.replace(/,/g, ''), 10);

if (isNaN(number)) {
  resultOutput.innerText = 'Invalid number';
} else {
  var formattedNumber = number.toLocaleString();
  var words = numberToWords(number);
  resultOutput.innerText = words;
  numberInput.value = formattedNumber;
}
            
        }
        // var formnum = number.toLocaleString('en-US');
        // document.getElementById("number-input").value = formnum+".00"; 


        const cityData = {
            Abia: [
                'Aba North',
                'Aba South',
                'Arochukwu',
                'Bende',
                'Ikwuano',
                'Isiala Ngwa North',
                'Isiala Ngwa South',
                'Isuikwuato',
                'Obi Ngwa',
                'Ohafia',
                'Osisioma Ngwa',
                'Ugwunagbo',
                'Ukwa East',
                'Ukwa West',
                'Umuahia North',
                'Umuahia South',
                'Umu Nneochi'
            ],
            Adamawa: [
                'Demsa',
                'Fufore',
                'Ganye',
                'Girei',
                'Gombi',
                'Guyuk',
                'Hong',
                'Jada',
                'Lamurde',
                'Madagali',
                'Maiha',
                'Mayo-Belwa',
                'Michika',
                'Mubi North',
                'Mubi South',
                'Numan',
                'Shelleng',
                'Song',
                'Toungo',
                'Yola North',
                'Yola South'
            ],
            AkwaIbom: [
                'Abak',
                'Eastern Obolo',
                'Eket',
                'Esit Eket',
                'Essien Udim',
                'Etim Ekpo',
                'Etinan',
                'Ibeno',
                'Ibesikpo Asutan',
                'Ibiono Ibom',
                'Ika',
                'Ikono',
                'Ikot Abasi',
                'Ikot Ekpene',
                'Ini',
                'Itu',
                'Mbo',
                'Mkpat Enin',
                'Nsit Atai',
                'Nsit Ibom',
                'Nsit Ubium',
                'Obot Akara',
                'Okobo',
                'Onna',
                'Oron',
                'Oruk Anam',
                'Udung Uko',
                'Ukanafun',
                'Uruan',
                'Urue-Offong/Oruko',
                'Uyo'
            ],
            Anambra: [
                'Aguata',
                'Anambra East',
                'Anambra West',
                'Anaocha',
                'Awka North',
                'Awka South',
                'Ayamelum',
                'Dunukofia',
                'Ekwusigo',
                'Idemili North',
                'Idemili South',
                'Ihiala',
                'Njikoka',
                'Nnewi North',
                'Nnewi South',
                'Ogbaru',
                'Onitsha North',
                'Onitsha South',
                'Orumba North',
                'Orumba South',
                'Oyi'
            ],
            Bauchi: [
                'Alkaleri',
                'Bauchi',
                'Bogoro',
                'Damban',
                'Darazo',
                'Dass',
                'Ganjuwa',
                'Giade',
                'Itas/Gadau',
                'Jama\'are',
                'Katagum',
                'Kirfi',
                'Misau',
                'Ningi',
                'Shira',
                'Tafawa Balewa',
                'Toro',
                'Warji',
                'Zaki'
            ],
            Bayelsa: [
                'Brass',
                'Ekeremor',
                'Kolokuma/Opokuma',
                'Nembe',
                'Ogbia',
                'Sagbama',
                'Southern Ijaw',
                'Yenagoa'
            ],
            Benue: [
                'Ado',
                'Agatu',
                'Apa',
                'Buruku',
                'Gboko',
                'Guma',
                'Gwer East',
                'Gwer West',
                'Katsina-Ala',
                'Konshisha',
                'Kwande',
                'Logo',
                'Makurdi',
                'Obi',
                'Ogbadibo',
                'Ohimini',
                'Oju',
                'Okpokwu',
                'Oturkpo',
                'Tarka',
                'Ukum',
                'Ushongo',
                'Vandeikya'
            ],
            Borno: [
                'Abadam',
                'Askira/Uba',
                'Bama',
                'Bayo',
                'Biase',
                'Biu',
                'Chibok',
                'Damboa',
                'Dikwa',
                'Gubio',
                'Guzamala',
                'Gwoza',
                'Hawul',
                'Jere',
                'Kaga',
                'Kala/Balge',
                'Konduga',
                'Kukawa',
                'Kwaya Kusar',
                'Mafa',
                'Magumeri',
                'Maiduguri',
                'Marte',
                'Mobbar',
                'Monguno',
                'Ngala',
                'Nganzai',
                'Shani'
            ],
            CrossRiver: [
                'Abi',
                'Akamkpa',
                'Akpabuyo',
                'Bakassi',
                'Bekwarra',
                'Biase',
                'Boki',
                'Calabar Municipal',
                'Calabar South',
                'Etung',
                'Ikom',
                'Obanliku',
                'Obubra',
                'Obudu',
                'Odukpani',
                'Ogoja',
                'Yakuur',
                'Yala'
            ],
            Delta: [
                'Aniocha North',
                'Aniocha South',
                'Bomadi',
                'Burutu',
                'Ethiope East',
                'Ethiope West',
                'Ika North East',
                'Ika South',
                'Isoko North',
                'Isoko South',
                'Ndokwa East',
                'Ndokwa West',
                'Okpe',
                'Oshimili North',
                'Oshimili South',
                'Patani',
                'Sapele',
                'Udu',
                'Ughelli North',
                'Ughelli South',
                'Ukwuani',
                'Uvwie',
                'Warri North',
                'Warri South',
                'Warri South West'
            ],
            Ebonyi: [
                'Abakaliki',
                'Afikpo North',
                'Afikpo South',
                'Ebonyi',
                'Ezza North',
                'Ezza South',
                'Ikwo',
                'Ishielu',
                'Ivo',
                'Izzi',
                'Ohaozara',
                'Ohaukwu',
                'Onicha'
            ],
            Edo: [
                'Akoko-Edo',
                'Egor',
                'Esan Central',
                'Esan North-East',
                'Esan South-East',
                'Esan West',
                'Etsako Central',
                'Etsako East',
                'Etsako West',
                'Igueben',
                'Ikpoba-Okha',
                'Orhionmwon',
                'Oredo',
                'Ovia North-East',
                'Ovia South-West',
                'Owan East',
                'Owan West',
                'Uhunmwonde'
            ],
            Ekiti: [
                'Ado Ekiti',
                'Efon',
                'Ekiti East',
                'Ekiti South-West',
                'Ekiti West',
                'Emure',
                'Gbonyin',
                'Ido Osi',
                'Ijero',
                'Ikere',
                'Ikole',
                'Ilejemeje',
                'Irepodun/Ifelodun',
                'Ise/Orun',
                'Moba',
                'Oye'
            ],
            Enugu: [
                'Aninri',
                'Awgu',
                'Enugu East',
                'Enugu North',
                'Enugu South',
                'Ezeagu',
                'Igbo Etiti',
                'Igbo Eze North',
                'Igbo Eze South',
                'Isi Uzo',
                'Nkanu East',
                'Nkanu West',
                'Nsukka',
                'Oji River',
                'Udenu',
                'Udi',
                'Uzo-Uwani'
            ],
            Gombe: [
                'Akko',
                'Balanga',
                'Billiri',
                'Dukku',
                'Funakaye',
                'Gombe',
                'Kaltungo',
                'Kwami',
                'Nafada',
                'Shongom',
                'Yamaltu/Deba'
            ],
            Imo: [
                'Aboh Mbaise',
                'Ahiazu Mbaise',
                'Ehime Mbano',
                'Ezinihitte',
                'Ideato North',
                'Ideato South',
                'Ihitte/Uboma',
                'Ikeduru',
                'Isiala Mbano',
                'Isu',
                'Mbaitoli',
                'Ngor Okpala',
                'Njaba',
                'Nkwerre',
                'Nwangele',
                'Obowo',
                'Oguta',
                'Ohaji/Egbema',
                'Okigwe',
                'Orlu',
                'Orsu',
                'Oru East',
                'Oru West',
                'Owerri Municipal',
                'Owerri North',
                'Owerri West',
                'Unuimo'
            ],
            Jigawa: [
                'Auyo',
                'Babura',
                'Biriniwa',
                'Birnin Kudu',
                'Buji',
                'Dutse',
                'Gagarawa',
                'Garki',
                'Gumel',
                'Guri',
                'Gwaram',
                'Gwiwa',
                'Hadejia',
                'Jahun',
                'Kafin Hausa',
                'Kazaure',
                'Kiri Kasama',
                'Kiyawa',
                'Maigatari',
                'Malam Madori',
                'Miga',
                'Ringim',
                'Roni',
                'Sule Tankarkar',
                'Taura',
                'Yankwashi'
            ],
            Kaduna: [
                'Birnin Gwari',
                'Chikun',
                'Giwa',
                'Igabi',
                'Ikara',
                'Jaba',
                'Jema\'a',
                'Kachia',
                'Kaduna North',
                'Kaduna South',
                'Kagarko',
                'Kajuru',
                'Kaura',
                'Kauru',
                'Kubau',
                'Kudan',
                'Lere',
                'Makarfi',
                'Sabon Gari',
                'Sanga',
                'Soba',
                'Zangon Kataf',
                'Zaria'
            ],
            Kano: [
                'Ajingi',
                'Albasu',
                'Bagwai',
                'Bebeji',
                'Bichi',
                'Bunkure',
                'Dala',
                'Dambatta',
                'Dawakin Kudu',
                'Dawakin Tofa',
                'Doguwa',
                'Fagge',
                'Gabasawa',
                'Garko',
                'Garun Mallam',
                'Gaya',
                'Gezawa',
                'Gwale',
                'Gwarzo',
                'Kabo',
                'Kano Municipal',
                'Karaye',
                'Kibiya',
                'Kiru',
                'Kumbotso',
                'Kunchi',
                'Kura',
                'Madobi',
                'Makoda',
                'Minjibir',
                'Nasarawa',
                'Rano',
                'Rimin Gado',
                'Rogo',
                'Shanono',
                'Sumaila',
                'Takai',
                'Tarauni',
                'Tofa',
                'Tsanyawa',
                'Tudun Wada',
                'Ungogo',
                'Warawa',
                'Wudil'
            ],
            Katsina: [
                'Bakori',
                'Batagarawa',
                'Batsari',
                'Baure',
                'Bindawa',
                'Charanchi',
                'Dan Musa',
                'Dandume',
                'Danja',
                'Daura',
                'Dutsi',
                'Dutsin Ma',
                'Faskari',
                'Funtua',
                'Ingawa',
                'Jibia',
                'Kafur',
                'Kaita',
                'Kankara',
                'Kankia',
                'Katsina',
                'Kurfi',
                'Kusada',
                'Mai\'Adua',
                'Malumfashi',
                'Mani',
                'Mashi',
                'Matazu',
                'Musawa',
                'Rimi',
                'Sabuwa',
                'Safana',
                'Sandamu',
                'Zango'
            ],
            Kebbi: [
                'Aleiro',
                'Arewa Dandi',
                'Argungu',
                'Augie',
                'Bagudo',
                'Birnin Kebbi',
                'Bunza',
                'Dandi',
                'Fakai',
                'Gwandu',
                'Jega',
                'Kalgo',
                'Koko/Besse',
                'Maiyama',
                'Ngaski',
                'Sakaba',
                'Shanga',
                'Suru',
                'Wasagu/Danko',
                'Yauri',
                'Zuru'
            ],
            Kogi: [
                'Adavi',
                'Ajaokuta',
                'Ankpa',
                'Bassa',
                'Dekina',
                'Ibaji',
                'Idah',
                'Igalamela Odolu',
                'Ijumu',
                'Kabba/Bunu',
                'Kogi',
                'Lokoja',
                'Mopa Muro',
                'Ofu',
                'Ogori/Magongo',
                'Okehi',
                'Okene',
                'Olamaboro',
                'Omala',
                'Yagba East',
                'Yagba West'
            ],
            Kwara: [
                'Asa',
                'Baruten',
                'Edu',
                'Ekiti',
                'Ifelodun',
                'Ilorin East',
                'Ilorin South',
                'Ilorin West',
                'Irepodun',
                'Isin',
                'Kaiama',
                'Moro',
                'Offa',
                'Oke Ero',
                'Oyun',
                'Pategi'
            ],
            Lagos: [
                'Agege',
                'Ajeromi-Ifelodun',
                'Alimosho',
                'Amuwo-Odofin',
                'Apapa',
                'Badagry',
                'Epe',
                'Eti-Osa',
                'Ibeju-Lekki',
                'Ifako-Ijaiye',
                'Ikeja',
                'Ikorodu',
                'Kosofe',
                'Lagos Island',
                'Lagos Mainland',
                'Mushin',
                'Ojo',
                'Oshodi-Isolo',
                'Shomolu',
                'Surulere'
            ],
            Nasarawa: [
                'Akwanga',
                'Awe',
                'Doma',
                'Karu',
                'Keana',
                'Keffi',
                'Kokona',
                'Lafia',
                'Nasarawa',
                'Nasarawa Egon',
                'Obi',
                'Toto',
                'Wamba'
            ],
            Niger: [
                'Agaie',
                'Agwara',
                'Bida',
                'Borgu',
                'Bosso',
                'Chanchaga',
                'Edati',
                'Gbako',
                'Gurara',
                'Katcha',
                'Kontagora',
                'Lapai',
                'Lavun',
                'Magama',
                'Mariga',
                'Mashegu',
                'Mokwa',
                'Moya',
                'Paikoro',
                'Rafi',
                'Rijau',
                'Shiroro',
                'Suleja',
                'Tafa',
                'Wushishi'
            ],
            Ogun: [
                'Abeokuta North',
                'Abeokuta South',
                'Ado-Odo/Ota',
                'Egbado North',
                'Egbado South',
                'Ewekoro',
                'Ifo',
                'Ijebu East',
                'Ijebu North',
                'Ijebu North East',
                'Ijebu Ode',
                'Ikenne',
                'Imeko Afon',
                'Ipokia',
                'Obafemi Owode',
                'Odeda',
                'Odogbolu',
                'Ogun Waterside',
                'Remo North',
                'Shagamu'
            ],
            Ondo: [
                'Akoko North-East',
                'Akoko North-West',
                'Akoko South-West',
                'Akoko South-East',
                'Akure North',
                'Akure South',
                'Ese Odo',
                'Idanre',
                'Ifedore',
                'Ilaje',
                'Ile Oluji/Okeigbo',
                'Irele',
                'Odigbo',
                'Okitipupa',
                'Ondo East',
                'Ondo West',
                'Ose',
                'Owo'
            ],
            Osun: [
                'Atakunmosa East',
                'Atakunmosa West',
                'Aiyedaade',
                'Aiyedire',
                'Boluwaduro',
                'Boripe',
                'Ede North',
                'Ede South',
                'Ife Central',
                'Ife East',
                'Ife North',
                'Ife South',
                'Egbedore',
                'Ejigbo',
                'Ifedayo',
                'Ifelodun',
                'Ila',
                'Ilesa East',
                'Ilesa West',
                'Irepodun',
                'Irewole',
                'Isokan',
                'Iwo',
                'Obokun',
                'Odo Otin',
                'Ola Oluwa',
                'Olorunda',
                'Oriade',
                'Orolu',
                'Osogbo'
            ],
            Oyo: [
                'Afijio',
                'Akinyele',
                'Atiba',
                'Atisbo',
                'Egbeda',
                'Ibadan North',
                'Ibadan North-East',
                'Ibadan North-West',
                'Ibadan South-East',
                'Ibadan South-West',
                'Ibarapa Central',
                'Ibarapa East',
                'Ibarapa North',
                'Ido',
                'Irepo',
                'Iseyin',
                'Itesiwaju',
                'Iwajowa',
                'Kajola',
                'Lagelu',
                'Ogbomosho North',
                'Ogbomosho South',
                'Ogo Oluwa',
                'Olorunsogo',
                'Oluyole',
                'Ona Ara',
                'Orelope',
                'Ori Ire',
                'Oyo',
                'Oyo East',
                'Saki East',
                'Saki West',
                'Surulere'
            ],
            Plateau: [
                'Barikin Ladi',
                'Bassa',
                'Bokkos',
                'Jos East',
                'Jos North',
                'Jos South',
                'Kanam',
                'Kanke',
                'Langtang North',
                'Langtang South',
                'Mangu',
                'Mikang',
                'Pankshin',
                'Qua\'an Pan',
                'Riyom',
                'Shendam',
                'Wase'
            ],
            Rivers: [
                'Abua/Odual',
                'Ahoada East',
                'Ahoada West',
                'Akuku-Toru',
                'Andoni',
                'Asari-Toru',
                'Bonny',
                'Degema',
                'Eleme',
                'Emuoha',
                'Etche',
                'Gokana',
                'Ikwerre',
                'Khana',
                'Obio/Akpor',
                'Ogba/Egbema/Ndoni',
                'Ogu/Bolo',
                'Okrika',
                'Omuma',
                'Opobo/Nkoro',
                'Oyigbo',
                'Port Harcourt',
                'Tai'
            ],
            Sokoto: [
                'Binji',
                'Bodinga',
                'Dange Shuni',
                'Gada',
                'Goronyo',
                'Gudu',
                'Gwadabawa',
                'Illela',
                'Isa',
                'Kebbe',
                'Kware',
                'Rabah',
                'Sabon Birni',
                'Shagari',
                'Silame',
                'Sokoto North',
                'Sokoto South',
                'Tambuwal',
                'Tangaza',
                'Tureta',
                'Wamako',
                'Wurno',
                'Yabo'
            ],
            Taraba: [
                'Ardo Kola',
                'Bali',
                'Donga',
                'Gashaka',
                'Gassol',
                'Ibi',
                'Jalingo',
                'Karim Lamido',
                'Kumi',
                'Lau',
                'Sardauna',
                'Takum',
                'Ussa',
                'Wukari',
                'Yorro',
                'Zing'
            ],
            Yobe: [
                'Bade',
                'Bursari',
                'Damaturu',
                'Fika',
                'Fune',
                'Geidam',
                'Gujba',
                'Gulani',
                'Jakusko',
                'Karasuwa',
                'Machina',
                'Nangere',
                'Nguru',
                'Potiskum',
                'Tarmuwa',
                'Yunusari',
                'Yusufari'
            ],
            Zamfara: [
                'Anka',
                'Bakura',
                'Birnin Magaji/Kiyaw',
                'Bukkuyum',
                'Bungudu',
                'Gummi',
                'Gusau',
                'Kaura Namoda',
                'Maradun',
                'Maru',
                'Shinkafi',
                'Talata Mafara',
                'Zurmi'
            ],
            "Federal Capital Territory": [
                "Abaji",
                "Bwari",
                "Gwagwalada",
                "Kuje",
                "Kwali",
                "Municipal Area Council"
            ]
        };



        // Function to populate the city select box based on the selected state
        function populateCities() {
            const stateSelect = document.getElementById('stateSelect');
            const citySelect = document.getElementById('citySelect');
            const selectedState = stateSelect.value;

            // Clear city select box
            citySelect.innerHTML = '<option value="">Select a LGA</option>';

            if (selectedState && cityData[selectedState]) {
                const cities = cityData[selectedState];

                // Add cities to the city select box
                for (let i = 0; i < cities.length; i++) {
                    const city = cities[i];
                    const option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                }
            }
        }

        $("#tab2").hide()
        $("#tab3").hide()
        $("#show1").click(function (e) {
            e.preventDefault();
            $("#tab3").show()
            $("#tab1").hide()
            $("#tab2").hide()
        });
        $("#show2").click(function (e) {
            e.preventDefault();
            $("#tab2").show()
            $("#tab1").hide()
            $("#tab3").hide()

        });

        $(".show").hide()
        $(".show1").hide()
        $(".show2").hide()
        $(".show3").hide()


        $('#trigShow').change(function (e) {
            e.preventDefault();
            trigVal = $(this).val()
            if (trigVal == 'Land') {
                $(".show1").show()
                $(".show").hide()
                $(".show2").hide()
                $(".show3").hide()
                $(".demoshow").hide()


            } else if (trigVal == 'Autos/Machinery') {
                $(".show").hide()
                $(".show1").hide()
                $(".show2").show()
                $(".show3").hide()
                $(".demoshow").hide()


            }  else if (trigVal == 'Non Distress Properties') {
                $(".show3").show()
                $(".show").hide()
                $(".show1").hide()
                $(".show2").hide()
                $(".demoshow").hide()


            } else {
                $(".show").show()
                $(".show1").hide()
                $(".show2").hide()
                $(".show3").hide()
                $(".demoshow").hide()



            }
        });
        <?php
        if (isset($_GET['edit']) && !empty($_GET['edit'])):
            ?>
                $("#tab2").show()
                $("#tab1").hide()
        $("#tab3").hide()
        <?php
        endif;
        ?>



    </script>
    <?= $reload ?>
</body>
</html>