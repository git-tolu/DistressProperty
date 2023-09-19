<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$dbs = new Dbc();
$page = 'about';
$user_role = '';

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

    <title>Distress Property Market - About</title>

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
    <style>
        .category-block-one .inner-box .more-btn .theme-btn.btn-one:hover {
  background-color: white !important;
  border: 2px solid white !important;
  color: #D9A464 !important;
  box-shadow: 0 10px 30px 0px rgb(0 0 0 / 10%);

}
    </style>

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
        <?php include('include/mobilemenu.php') ?>
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url(assets/images/about.jpeg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>About Us</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- about-section -->
        <section class="about-section about-page pb-0">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/DCI Page Banner.jpeg" alt=""></figure>
                                    <!-- <div class="text wow fadeInLeft animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <h2 style="color:white !important; ">7</h2>
                                        <h4>Years of <br />Experience</h4>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">

                                    <div class="text">
                                        <p>We are Africa’s Biggest Distress Property Market Place. Our
                                            pool of seasoned consultants and business executives in both
                                            the Financial and Real Estate sector is globally recognized for
                                            exceptional leadership, qualitative business analysis, excellent
                                            service delivery and proffering innovative solutions.
                                            Little wonder why innovative approaches are our number one
                                            strategy.</p>
                                        <p>Our unique business model is literally a tripod stand
                                            of value at every corner; offering financial services via a
                                            financial relief strategy through the liquidation of Distress
                                            properties and putting same up for sale at prices below
                                            market value for the real estate enthusiast hoping to acquire
                                            new property.</p>
                                        <p>
                                            Because our business model is a capital intensive one, usually
                                            requiring millions of dollars to give financial relief and acquire
                                            Distress Property; Our pool of investors are the ones
                                            constantly on the receiving end of the exponential rate at
                                            which property appreciates all over Africa</p>
                                    </div>
                                    <!-- <ul class="list clearfix">
                                        <li>consectetur elit sed do eius</li>
                                        <li>consectetur elit sed</li>
                                    </ul>
                                    <div class="btn-box">
                                        <a href="contact.html" class="theme-btn btn-one">Contact With Me</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- feature-style-three -->
        <section class="feature-style-three centred ">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Services</h5>
                    <h2>Our Service Categories:</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <div class="feature-block-two" >
                        <div class="inner-box " style="height: 495.08px !important;">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h4>Distress Buying</h4>
                            <p>We aid our clientele acquire Distress Property for below market value</p>
                            <div class="more-btn m-2"><a href="property-gridAll.php" class="theme-btn btn-one">Get
                                    Started</a></div>
                        </div>
                    </div>
                    <div class="feature-block-two">
                        <div class="inner-box " style="height: 495.08px !important;">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Distress Selling</h4>
                            <p>We aid our clientele in fiancial distress liquidate their assets in record time.</p>
                            <div class="more-btn m-2"><a href="property-gridAll.php" class="theme-btn btn-one">Get
                                    Started</a></div>
                        </div>
                    </div>
                    <div class="feature-block-two" >
                        <div class="inner-box " style="height: 495.08px !important;" >
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Investment</h4>
                            <p>We provide a viable Distress Real Estate Investment Trust Platform for willing and
                                ready investors to come on board with stable and high yielding return on investment.</p>
                            <div class="more-btn m-2"><a href="dci.php" class="theme-btn btn-one">Get Started</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- feature-style-three end -->

        <section class="category-section centred" style="padding: 5px;">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="sec-title">
                        <!-- <h5>Our Team</h5> -->
                        <h2>Our Team</h2>
                    </div>
                    <div class="row clearfix m-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><img src="./assets/images/team/1.png" alt="img-rounded"></div>
                                    <h5>Alhaji Bello Ahmed PSC+ (Rtd)</h5>
                                    <h5>Chairman</h5>
                                    <!-- <p class="text-center">
                                        Whenever I hear the Distress Property Market is unveiling a
                                        new product offering, I get excited. That’s particularly because
                                        in 2021 they sold my Lekki home via their distress express
                                        service. I am thrilled to be part of this exciting new
                                        opportunity to make more money as an investor with low to
                                        zero risk involved and guaranteed high returns on investment.
                                        I will recommend you join the train while offer lasts.
                                    </p> -->

                                    <div class="more-btn"><a href="#one" class="theme-btn hov btn-one"
                                            data-toggle="modal">View Profile</a></div>
                                            <div class="more-btn">

<ul class=" d-flex justify-content-center text-center mt-4" style="width: 100%;">
    <li style="   color: black !important;"><a href="" target="_blank"
            rel="noopener noreferrer" class="text-dark"
            style="   color: black !important;"><i class="fab fa-facebook-f p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href="" target="_blank"
            style="   color: black !important;" rel="noopener noreferrer"
            class="text-dark"><i class="fab fa-twitter p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-linkedin p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-instagram p-2"
                style="   color: black !important;"></i></a></li>
</ul>
</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><img src="./assets/images/team/2.png" alt="img-rounded"></div>
                                    <h5>Alex C. Udeze</h5>
                                    <h5>Managing Director/CEO</h5>

                                    <!-- <p class="text-center">An established Distress trader, a proficient technology
                                        enthusiast, a
                                        seasoned sales man and business executive; these words and more best
                                        describe Alex Udeze.
                                        His extensive expertise in Business Development Management, Revenue
                                        generation, Aggressive Market penetration and Public Relations;
                                        spanning over 10 years gives him the right standing to out do himself as
                                        the Chief Executive Officer of Distress Property Market Ltd.
                                        It is worthy to note that Alex Udeze also sits on the board of two equally
                                        thriving affiliate companies. He is a devote father and husband, a
                                        philanthropist and humanitarian </p> -->
                                    <div class="more-btn"><a href="#two" class="theme-btn hov btn-one"
                                            data-toggle="modal">View Profile</a></div>
                                            <div class="more-btn">

<ul class=" d-flex justify-content-center text-center mt-4" style="width: 100%;">
    <li style="   color: black !important;"><a href="" target="_blank"
            rel="noopener noreferrer" class="text-dark"
            style="   color: black !important;"><i class="fab fa-facebook-f p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href="" target="_blank"
            style="   color: black !important;" rel="noopener noreferrer"
            class="text-dark"><i class="fab fa-twitter p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-linkedin p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-instagram p-2"
                style="   color: black !important;"></i></a></li>
</ul>
</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><img src="./assets/images/team/3.png" alt="img-rounded"></div>
                                    <h5>LYRIS O</h5>
                                    <h5>ED; Corporate Comm., Brand and Marketing</h5>
                                    <!-- <p class="text-center">round breaking internationally trained Brand and Marketing
                                        Communications Expert, with an exemplary career in promotional
                                        strategy spanning a little over seven years; working with multinationals,
                                        financial institutions and real estate giants to actualize their marketing
                                        strategies through effective brand storytelling.
                                        Doubling as an excellent communicator; Lyris is curious and passionate
                                        about the customer experience, big picture thinker with an eye for detail.
                                        She is known for her exceptional ability to execute mind-breaking
                                        marketing initiatives and has a track record of excellent delivery within
                                        and outside Nigeria.</p> -->
                                    <div class="more-btn"><a href="#three" class="theme-btn hov btn-one"
                                            data-toggle="modal">View Profile</a></div>
                                            <div class="more-btn">

<ul class=" d-flex justify-content-center text-center mt-4" style="width: 100%;">
    <li style="   color: black !important;"><a href="" target="_blank"
            rel="noopener noreferrer" class="text-dark"
            style="   color: black !important;"><i class="fab fa-facebook-f p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href="" target="_blank"
            style="   color: black !important;" rel="noopener noreferrer"
            class="text-dark"><i class="fab fa-twitter p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-linkedin p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-instagram p-2"
                style="   color: black !important;"></i></a></li>
</ul>
</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix m-3">
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><img src="./assets/images/team/4.png" alt="img-rounded"></div>
                                    <h5>Samuel Okolie </h5>
                                    <h5>Chief Operating Officer (COO)</h5>
                                    <!-- <p class="text-center">
                                        With a background in operation strategy in the oil and gas sector working off
                                        shore and a bachelors degree in surveying and Geo-informatics , Samuel stands
                                        out as a valuable resource in the real estate and property brokerage industry,
                                        with a decade experience as a land surveyor,
                                        <br>
                                        His vast experience in operational stratey and project coordination sets apart
                                        as an exception leader and business executive
                                    </p> -->
                                    <div class="more-btn"><a href="#four" class="theme-btn hov btn-one"
                                            data-toggle="modal">View Profile</a></div>
                                            <div class="more-btn">

<ul class=" d-flex justify-content-center text-center mt-4" style="width: 100%;">
    <li style="   color: black !important;"><a href="" target="_blank"
            rel="noopener noreferrer" class="text-dark"
            style="   color: black !important;"><i class="fab fa-facebook-f p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href="" target="_blank"
            style="   color: black !important;" rel="noopener noreferrer"
            class="text-dark"><i class="fab fa-twitter p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-linkedin p-2"
                style="   color: black !important;"></i></a></li>
    <li style="   color: black !important;"><a href=""
            style="   color: black !important;" target="_blank"
            rel="noopener noreferrer" class="text-dark"><i
                class="fab fa-instagram p-2"
                style="   color: black !important;"></i></a></li>
</ul>
</div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="category-block-one">
                                <div class="inner-box  ">

                                    <div class="icon-box"><img src="./assets/images/team/6.png" alt="img-rounded">
                                    </div>
                                    <h5>Collins Chionuma</h5>
                                    <h5>Director</h5>
                                    <!-- <p class="text-center">A versatile business man, hotelier, real estate
                                        enthusiasts
                                        and
                                        politician; Collins Chionuma is known all around the world for
                                        his many years of managerial experience in the oil and gas,
                                        security, stock brokerage and real estate industries.
                                        Collins Chionuma is a renowned politician and indeed an
                                        amiable patron of transformative leadership.</p> -->
                                    <div class="more-btn"><a href="#six" class="theme-btn hov btn-one"
                                            data-toggle="modal">View Profile</a></div>
                                            <div class="more-btn">

                                                <ul class=" d-flex justify-content-center text-center mt-4" style="width: 100%;">
                                                    <li style="   color: black !important;"><a href="" target="_blank"
                                                            rel="noopener noreferrer" class="text-dark"
                                                            style="   color: black !important;"><i class="fab fa-facebook-f p-2"
                                                                style="   color: black !important;"></i></a></li>
                                                    <li style="   color: black !important;"><a href="" target="_blank"
                                                            style="   color: black !important;" rel="noopener noreferrer"
                                                            class="text-dark"><i class="fab fa-twitter p-2"
                                                                style="   color: black !important;"></i></a></li>
                                                    <li style="   color: black !important;"><a href=""
                                                            style="   color: black !important;" target="_blank"
                                                            rel="noopener noreferrer" class="text-dark"><i
                                                                class="fab fa-linkedin p-2"
                                                                style="   color: black !important;"></i></a></li>
                                                    <li style="   color: black !important;"><a href=""
                                                            style="   color: black !important;" target="_blank"
                                                            rel="noopener noreferrer" class="text-dark"><i
                                                                class="fab fa-instagram p-2"
                                                                style="   color: black !important;"></i></a></li>
                                                </ul>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div> -->
                </div>
            </div>
        </section>


        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="six" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Collins Chionuma</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">

                            <div class="icon-box"><img src="./assets/images/team/6.png" alt="img-rounded">
                            </div>
                            <h5>Collins Chionuma</h5>
                            <h3>Director</h3>
                            <p class="text-center text-dark">A versatile business man, hotelier, real estate
                                enthusiasts
                                and
                                politician; Collins Chionuma is known all around the world for
                                his many years of managerial experience in the oil and gas,
                                security, stock brokerage and real estate industries.
                                Collins Chionuma is a renowned politician and indeed an
                                amiable patron of transformative leadership.</p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="one" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Alhaji Bello Ahmed PSC+ (Rtd)</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">

                            <div class="icon-box"><img src="./assets/images/team/1.png" alt="img-rounded"></div>
                            <h3>Alhaji Bello Ahmed PSC+ (Rtd)</h3>
                            <h5>Chairman</h5>
                            <p class="text-center text-dark">
                                Alhaji Bello Ahmed is a visionary entrepreneur and philantropist;
                                born, raised and educated in Africa. Alhaji Bello is a large scale
                                agriculturist and also a retired police officer, who served in various
                                capacities and in different states across the country and retired as a
                                commissioner of police.
                                Alhaji has extensive administrative experience spanning over forty
                                (40) years both in the Nigerian police force and in Business
                                Administration; in Nigeria and abroad alike. But perhaps, his new
                                found interest in real estate and distress relief is the icing on the
                                cake; making him an exceptional Chairman of the board at Distress
                                Property Market Ltd.
                            </p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="two" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Alex C. Udeze</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">

                            <div class="icon-box"><img src="./assets/images/team/2.png" alt="img-rounded"></div>
                            <h5>Alex C. Udeze</h5>
                            <h5>Managing Director/CEO</h5>

                            <p class="text-center text-dark">An established Distress trader, a proficient technology
                                enthusiast, a
                                seasoned sales man and business executive; these words and more best
                                describe Alex Udeze.
                                His extensive expertise in Business Development Management, Revenue
                                generation, Aggressive Market penetration and Public Relations;
                                spanning over 10 years gives him the right standing to out do himself as
                                the Chief Executive Officer of Distress Property Market Ltd.
                                It is worthy to note that Alex Udeze also sits on the board of two equally
                                thriving affiliate companies. He is a devote father and husband, a
                                philanthropist and humanitarian </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="three" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">LYRIS O</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">
                            <div class="icon-box"><img src="./assets/images/team/3.png" alt="img-rounded"></div>
                            <h5>LYRIS O</h5>
                            <h3>ED; Corporate Comm., Brand and Marketing</h3>
                            <p class="text-center text-dark">round breaking internationally trained Brand and Marketing
                                Communications Expert, with an exemplary career in promotional
                                strategy spanning a little over seven years; working with multinationals,
                                financial institutions and real estate giants to actualize their marketing
                                strategies through effective brand storytelling.
                                Doubling as an excellent communicator; Lyris is curious and passionate
                                about the customer experience, big picture thinker with an eye for detail.
                                She is known for her exceptional ability to execute mind-breaking
                                marketing initiatives and has a track record of excellent delivery within
                                and outside Nigeria.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="four" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Samuel Okolie M.NIS</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">
                            <div class="icon-box"><img src="./assets/images/team/4.png" alt="img-rounded"></div>
                            <h3>Samuel Okolie </h3>
                            <h5>Chief Operating Officer (COO)</h5>
                            <p class="text-center text-dark">
                                With a background in operation strategy in the oil and gas sector working off
                                shore and a bachelors degree in surveying and Geo-informatics , Samuel stands
                                out as a valuable resource in the real estate and property brokerage industry,
                                with a decade experience as a land surveyor,
                                <br>
                                His vast experience in operational stratey and project coordination sets apart
                                as an exception leader and business executive
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="five" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Collen Sample</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="inner-box justify-content-center align-items-center text-center ">
                            <div class="icon-box"><img src="./assets/images/team/5.png" alt="img-rounded"></div>
                            <h3>Collen Sample</h3>
                            <h5>Head, International Business Relationship Manager</h5>

                            <p class="text-center text-dark">A reputation for results, experience and over 30 years of
                                real estate
                                service will help in your decision making process whether you are
                                buying, selling or investing.
                                Collen has this and many more; she doubles as a Certified Distress
                                Property Expert, Graduate of the Realtor Institute, a Real Estate Hall
                                of Fame recipient with RE/MAX of Stuart in Florida and an
                                International Distress Real Estate Expert. </p>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>



        <!-- cta-section -->
        <!-- <section class="cta-section alternate-2 pb-240 centred"
            style="background-image: url(assets/images/background/cta-1.jpg);">
            <div class="auto-container">
                <div class="inner-box clearfix">
                    <div class="text">
                        <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                    </div>
                    <div class="btn-box">
                        <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                        <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- cta-section end -->


        <!-- funfact-section -->
        <!-- <section class="funfact-section centred">
            <div class="auto-container">
                <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="1270">0</span>
                                    </div>
                                    <p>Total Professionals</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2350">0</span>
                                    </div>
                                    <p>Total Property Sell</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2540">0</span>
                                    </div>
                                    <p>Total Property Rent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                            <div class="funfact-block-one">
                                <div class="inner-box">
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="8270">0</span>
                                    </div>
                                    <p>Total Customers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- funfact-section end -->


        <!-- testimonial-style-four -->
        <!-- <section class="testimonial-style-four sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Testimonials</h5>
                    <h2>What They Say About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                        dolore magna aliqua enim.</p>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Rebeka Dawson</h5>
                            <span class="designation">Instructor</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Marc Kenneth</h5>
                            <span class="designation">Founder CEO</span>
                        </div>
                    </div>
                    <div class="testimonial-block-three">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-18"></i></div>
                            <h4>“Our goal each day is to ensure that our residents’ needs are not only met but
                                exceeded.”</h4>
                            <h5>Owen Lester</h5>
                            <span class="designation">Manager</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- testimonial-style-four end -->


        <!-- clients-section -->
        <!-- <section class="clients-section bg-color-1">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 title-column">
                        <div class="sec-title">
                            <h5>Our Pertners</h5>
                            <h2>We’re going to Became Partners for the Long Run.</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                        <div class="clients-logo">
                            <ul class="logo-list clearfix">
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img
                                                src="assets/images/clients/clients-1.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img
                                                src="assets/images/clients/clients-2.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img
                                                src="assets/images/clients/clients-3.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img
                                                src="assets/images/clients/clients-4.png" alt=""></a></figure>
                                </li>
                                <li>
                                    <figure class="logo"><a href="index-2.html"><img
                                                src="assets/images/clients/clients-5.png" alt=""></a></figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- clients-section end -->


        <!-- team-section -->
        <!-- <section class="team-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title">
                    <h5>Our Agents</h5>
                    <h2>Meet Our Excellent Agents</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/team/team-6.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="agents-details.html">Jennifer Lawrence</a></h4>
                                        <span class="designation">Senior Agent</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/team/team-7.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="agents-details.html">Benedict Cumberbatch</a></h4>
                                        <span class="designation">Senior Agent</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 team-block">
                        <div class="team-block-one wow fadeInUp animated" data-wow-delay="600ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/team/team-8.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="inner">
                                        <h4><a href="agents-details.html">Elizabeth Winstead</a></h4>
                                        <span class="designation">Senior Agent</span>
                                        <ul class="social-links clearfix">
                                            <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- team-section end -->


        <!-- download-section -->
        <!-- download-section end -->


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

    <!-- main-js -->
    <script src="assets/js/script.js"></script>
    <!-- <script>
        $('#one').click(function (e) {
            e.preventDefault();
            info = $(this).attr('id');

            $("'." + info + "'").html();
            console.log(info)
        });
    </script> -->

    <!-- Optional: Place to the bottom of scripts -->

</body><!-- End of .page_wrapper -->

</html>