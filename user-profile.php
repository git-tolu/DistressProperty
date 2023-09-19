<?php
include('controller/session.php');
$page = 'user-profile';

$reload = '';
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
        $reload = "<script >
        Swal.fire({
              icon:'success',
              text:'You have successfully updated your Profile Pic',
              title:'Profile pic Updated'
            },
            function(){
                location.reload();
            }
            );
      </script>";
    }
}

if (isset($_POST['saveProfile'])) {

    $fullname = $dbusers->test_input($_POST['fullname']);
    $usertitle = $dbusers->test_input($_POST['usertitle']);
    $user_email = $dbusers->test_input($_POST['user_email']);
    $userphone = $dbusers->test_input($_POST['userphone']);
    $aboutuser = $dbusers->test_input($_POST['aboutuser']);

    $updateData =  $dbusers->UpdateAgentProfile($fullname, $user_email, $usertitle, $userphone, $aboutuser, $user_id);
    if ($updateData) {
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Distress Property Market - User Profile</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
        <!-- <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close"><i class="far fa-times"></i></div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                        <span data-text-preloader="D" class="letters-loading">
                                D
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader=" " class="letters-loading">
                                &nbsp;&nbsp;&nbsp;
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                P
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="0" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="p" class="letters-loading">
                                p
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="r" class="letters-loading">
                                r
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="y" class="letters-loading">
                                y
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
        <?= include('include/mobilemenu.php') ?>
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/background/page-title.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Subcriber Profile</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Subcriber Profile</li>
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
                            <figure class="image-box">
                                <?php if (!$profilepic) : ?>
                                    <img src="assets/images/resource/agency-details-1.jpg" alt="avatar" class="rounded">
                                <?php else : ?>
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
                                <div class="text">
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse.when things don’t go their way! Pretty sad situation, to say the least. Have some fun and hypnotize yourself to be your very own Ghost of Christmas future”</p>
                                </div>
                                <ul class="info clearfix mr-0">
                                    <li><i class="fab fa fa-envelope"></i><a href="mailto:info@realhome.com" class="text-white">info@realhome.com</a></li>
                                    <li><i class="fab fa fa-phone"></i><a href="tel:03030571965" class="text-white">030 3057 1965</a></li>
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
                                        <?php if (!$profilepic) : ?>
                                            <img src="assets/images/clients/clients-2.png" class="card-img-top" alt="...">
                                        <?php else : ?>
                                            <img src="<?= $profilepic ?>" class="card-img-top" alt="...">
                                        <?php endif; ?>
                                        <div class="card-img-overlay">
                                            <h5 class="card-title text-white"><?= $user_role ?></h5>
                                            <h5 class="card-title text-white"><?= $fullname ?></h5>

                                        </div>
                                    </div>

                                </div>
                                <div class="detail clearfix mt-3">
                                    <div class="list-group">
                                        <a href="user-profile.php" class="list-group-item list-group-item-action active">
                                            <i class="fa fa-person"></i>Profile
                                        </a>
                                        <a href="property-list" class="list-group-item list-group-item-action">
                                            <i class="flaticon-heart-shape-outline"></i>Favorited Properties
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#changeprofilepic" class="list-group-item list-group-item-action">
                                            <i class="flaticon-locked-padlock"></i>Change Profile Pic
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#changepassword" class="list-group-item list-group-item-action">
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
                    <div class="col-lg-8 col-md-12 col-sm-12 ">
                        <div class="card p-5 shadow radius-5">

                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Full name</label>
                                            <input type="text" name="fullname" value="<?= $fullname ?>" class="form-control" placeholder="Fullname">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Your Title</label>
                                            <input type="text" name="usertitle" value="<?= $usertitle ?>" class="form-control" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" name="userphone" value="<?= $userphone ?>" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email </label>
                                            <input type="text" name="user_email" value="<?= $user_email ?>" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Your Bio</label>
                                            <textarea name="aboutuser" class="form-control" id="" cols="30" rows="10"> <?= $aboutuser ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="theme-btn btn-one" name="saveProfile" type="submit">Save Change</button>
                                    </div>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- subscribe-section -->
        <?php //include('include/subcribe.php'); ?>
        <!-- subscribe-section end -->


        <!-- main-footer -->
        <?php include('include/footer.php'); ?>
        <!-- main-footer end -->


        <div class="modal property-modal fade p-5" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="bioChangeLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <form action="" method="post">
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
                                        <input type="password" class="form-control" name="New_Password" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Confirm password </label>
                                        <input type="password" class="form-control" name="Confirm_password" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="changepassword" class="theme-btn btn-one">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal property-modal fade p-5" id="changeprofilepic" tabindex="-1" role="dialog" aria-labelledby="bioChangeLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="profilepic" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-5">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="changeprofile" class="theme-btn btn-one">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script src="assets/sweetalert/sweet.js"></script>
    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <?= $reload ?>
</body><!-- End of .page_wrapper -->

</html>