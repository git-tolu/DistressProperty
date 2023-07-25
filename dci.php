<?php
session_start();
// include('controller/session.php');
include('controller/dbc.php');
$dbs = new Dbc();
$page = 'DCi';
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

    <title>Distress Property Market - DCI</title>

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




        <!-- end switcher menu -->


        <!-- main header -->
        <?php include('include/header2.php') ?>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <?php include('include/mobilemenu.php') ?>
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="banner-style-two centred">
            <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/dcibannerpage.jpeg);"></div>
                    <div class="auto-container">
                        <div class="content-box">
                        <p> Make tomorrow's profit today <p>
                        <h2>Distress Capital Investment (DCI)</h2>
                        </div> 
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/dcibannerpage.jpeg);"></div>
                    <div class="auto-container">
                        <div class="content-box">
                        <p> Make tomorrow's profit today <p>
                        <h2>Distress Capital Investment (DCI)</h2>
                        </div>   
                    </div>
                </div>
                <div class="slide-item">
                    <div class="image-layer" style="background-image:url(assets/images/dcibannerpage.jpeg);"></div>
                    <div class="auto-container">
                        <div class="content-box">
                        <p> Make tomorrow's profit today <p>
                        <h2>Distress Capital Investment (DCI)</h2>
                        </div>  
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="page-title centred" style="background-image: url(assets/images/bgall.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1>Distress Capital Investment</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php">Home</a></li>
                        <li>Distress Capital Investment</li>
                    </ul>
                </div>
            </div>
        </section> -->
        <!-- <section class=" "
            style="background-image: url(assets/images/invest1.jpeg); padding: 0px;    height: 100%; background-repeat: no-repeat; ">
            <img src="assets/images/invest1.jpeg" style="padding: 0px;    height: 100%; background-repeat: no-repeat; "
                alt="">
        </section> -->
        <!--End Page Title-->


        <!-- about-section -->
        <section class="about-section about-page pb-5 m-2 pt-5" style="padding: 25px; padding-bottom: 50px;">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row  clearfix">
                        <!-- <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image_block_2">
                                <div class="image-box">
                                    <figure class="image"><img src="assets/images/DCI Page Banner.jpeg" alt=""></figure>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                            <div class="content_block_3">
                                <div class="content-box">

                                    <div class="text">
                                        <p>At Distress Capital Investments, we specialize in providing unparalleled
                                            opportunities for
                                            investors seeking to capitalize on distressed asset opportunities and
                                            maximize returns on
                                            their investment. With our in-depth expertise, extensive network, and
                                            unwavering
                                            commitment to success, we provide a comprehensive platform for those seeking
                                            to
                                            maximize their returns and build a profitable real estate portfolio.
                                        </p>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
        <section class="chooseus-section ">
            <div class="auto-container">
                <div class="inner-container bg-color-2" style="background-color: #D9A464;">
                    <div class="upper-box clearfix">
                        <div class="sec-title light">
                            <h5 style="color: white;" class="text-center">Why choose distress capital investment?</h5>
                        </div>
                    </div>
                    <div class="lower-box">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-19"></i></div>
                                        <h4>Untapped Potential</h4>
                                        <p> Distressed properties offer a hidden treasure trove of
                                            potential
                                            value; largely untapped in the Investment and wealth management industry.
                                            These assets
                                            often come with significantly reduced prices due to various circumstances,
                                            such as
                                            foreclosure, financial distress, or neglect. Our goal is to identify these
                                            diamonds in the
                                            rough, and transform them into lucrative investment opportunities.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-26"></i></div>
                                        <h4>100% Control of Investment</h4>
                                        <p>Via our DCI model, we are able to take into
                                            consideration
                                            the risk appetite of investors and offer a 100% control feature for
                                            prospectives with a low
                                            risk appetite via an SPV and the opportunity to select deals they would want
                                            their invested
                                            capital to fund.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-21"></i></div>
                                        <h4>Multiple Profit Strategies</h4>
                                        <p>Distressed real estate investing allows for
                                            various profit
                                            strategies, including resale, conditional sales, buy and hold for long-term
                                            appreciation and
                                            lots more. We provide the knowledge and resources to help you navigate these
                                            strategies
                                            and make informed decisions that align with your investment goals.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-25"></i></div>
                                        <h4>Market Timing Advantage</h4>
                                        <p>Economic cycles and market fluctuations create
                                            prime
                                            opportunities in distressed real estate investing. By capitalizing on
                                            downturns, we acquire
                                            properties at discounted prices for you, positioning you for significant
                                            appreciation when
                                            the market rebounds. Our experienced team keeps a pulse on market trends,
                                            ensuring you
                                            make informed investment choices.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-26"></i></div>
                                        <h4>Expert Guidance</h4>
                                        <p>Our team consists of seasoned professionals who possess
                                            extensive
                                            experience in distressed real estate investment. We have a keen eye and the
                                            right
                                            network/resources for identifying distressed properties, conducting thorough
                                            due diligence,
                                            and formulating winning investment strategies. Trust us to guide you through
                                            every step of
                                            the investment process.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-27"></i></div>
                                        <h4>Vast Network</h4>
                                        <p> Over the years, we have cultivated a vast network of industry
                                            professionals, including real estate agents, brokers, contractors, and
                                            property managers.
                                            Leveraging these connections, we provide you with exclusive access to a wide
                                            range of
                                            distressed properties that fit your investment criteria.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-33"></i></div>
                                        <h4>Comprehensive Support</h4>
                                        <p> From initial consultation to property acquisition to
                                            investment
                                            management and beyond, we offer comprehensive support tailored to meet your
                                            needs as
                                            an investor with us. Our services encompass property analysis, financial
                                            modelling, due
                                            diligence, project/investment management, and ongoing portfolio
                                            optimization. We are
                                            committed to your success every step of the way.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-36"></i></div>
                                        <h4>Unparalleled Opportunities</h4>
                                        <p> Our Distress Property Market platform provides
                                            access to a
                                            diverse array of distressed real estate assets across various markets; which
                                            is ready food for
                                            the distress capital Investment product. Making it nearly impossible to be
                                            short on
                                            opportunities for distress investment.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block pt-3">
                                <div class="chooseus-block-one m-3">
                                    <div class="inner-box">
                                        <div class="icon-box"><i class="text-white icon-24"></i></div>
                                        <h4>Ethical and Transparent Practices</h4>
                                        <p> At Distress Capital Investment, we
                                            prioritize ethical and
                                            transparent practices. We operate with integrity, ensuring that every
                                            investment
                                            opportunity is thoroughly vetted and presented with complete transparency.
                                            Your trust is of
                                            utmost importance to us, and we strive to maintain open and honest
                                            communication
                                            throughout our partnership.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
        <section class="contact-section bg-color-1">
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box">
                            <div class="sec-title light">
                                <h5>How it works:</h5>
                                <p>There are two ways a prospective can Invest in the DCI instrument:</p>
        
                            </div>
                            <ul class="accordion-box">
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Transitional Investment Route</h5>
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content-box">
                                            <p>This investment route is designed for aggressive investors, who have high
                                                risk appetite, are
                                                willing to take their chances on volatile investment options and are willing
                                                to subscribe to
                                                either the distress-invest advanced partnership or the distress invest
                                                standard partnership;
                                                therefore, investing a minimum of fifty million naira for one investment
                                                circle.</p>
                                            <p>The Investor will be asked to deposit their invested capital into the
                                                official distress property
                                                market ltd account at the beginning of the investment cycle; and at the end
                                                of the said
                                                investment cycle, the investor will be entitled to a 20% annual return on
                                                investment.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="fas fa-angle-down"></i></div>
                                        <h5>Conservative Investment Route</h5>
                                    </div>
                                    <div class="acc-content">
                                        <div class="content-box">
                                            <p>This investment route is designed for conservative investors, who have low
                                                risk appetite,
                                                and are only willing to take their chances on in-volatile investment options
                                                and are willing to
                                                subscribe to either the distress-invest standard partnership or the
                                                distress-invest starter
                                                partnership; therefore, investing a minimum of twenty million naira for one
                                                investment
                                                circle
                                            </p>
                                            <p>A Special Purpose Vehicle (SPV) account will then be created between DCI and
                                                the said
                                                investor, with the Investor’s preferred commercial banking service provider.
                                                The Investor
                                                will then be required to deposit their invested capital into the SPV and
                                                this becomes the
                                                beginning of the investment circle
                                            </p>
                                            <p>Unlike the Transitional investment route, the conservative route does not
                                                guarantee the
                                                investor’s a 20% annual ROI. Rather, it allows the investor the opportunity
                                                to have 100%
                                                control of their funds, by giving them the opportunity to partake in the
                                                investment process.
                                                They get to select deals they’d want their funds to finance and they earn
                                                returns per
                                                permitted deals financed by their invested capital.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box wow fadeInRight animated" data-wow-delay="00ms" data-wow-duration="3000ms">
                            <figure class="image"><img src="assets/images/dciright.jpeg" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
        <!-- contact-section -->
        <!-- feature-style-three -->
        <section class="pricing-section sec-pad centred">
            <div class="auto-container">
                <div class="tabs-box">
                    <h2 class="p-3 text-capitalize">Investment Categories and Implications</h2>
                    <!-- <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Monthly</li>
                        <li class="tab-btn" data-tab="#tab-2">Yearly</li>
                    </ul> -->
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <div class="pricing-table">
                                            <div class="table-header">
                                                <div class="shape-1"
                                                    style="background-image: url(assets/images/shape/shape-4.png);">
                                                </div>
                                                <div class="shape-2"
                                                    style="background-image: url(assets/images/shape/shape-5.png);">
                                                </div>
                                                <h4>Invested Capital: Distress-invest Starter Partnership </h4>
                                                <h2>20 - 49 <span>Million Naira</span></h2>
                                            </div>
                                            <div class="table-content">
                                                <ul class="feature-list clearfix">
                                                    <li>Sign-up Fee: 1 Million</li>
                                                    <li>Sharing Ratio: 70% : 30%</li>
                                                </ul>
                                            </div>
                                            <div class="table-footer">
                                                <a href="contact" class="link-btn">Get
                                                    Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <div class="pricing-table">
                                            <div class="table-header">
                                                <div class="shape-1"
                                                    style="background-image: url(assets/images/shape/shape-4.png);">
                                                </div>
                                                <div class="shape-2"
                                                    style="background-image: url(assets/images/shape/shape-5.png);">
                                                </div>
                                                <h4>Invested Capital: Distress-invest Standard Partnership </h4>
                                                <h2>50 - 99 <span>Million Naira</span></h2>
                                            </div>
                                            <div class="table-content">
                                                <ul class="feature-list clearfix">
                                                    <li>Sign-up Fee: 1 Million</li>
                                                    <li>Sharing Ratio: 75% : 25%</li>
                                                </ul>
                                            </div>
                                            <div class="table-footer">
                                                <a href="contact" class="link-btn">Get
                                                    Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                                    <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                        data-wow-duration="1500ms">
                                        <div class="pricing-table">
                                            <div class="table-header">
                                                <div class="shape-1"
                                                    style="background-image: url(assets/images/shape/shape-4.png);">
                                                </div>
                                                <div class="shape-2"
                                                    style="background-image: url(assets/images/shape/shape-5.png);">
                                                </div>
                                                <h4>Invested Capital: Distress-invest Premium Partnership </h4>
                                                <h2>100 <span>Million and above</span></h2>
                                            </div>
                                            <div class="table-content">
                                                <ul class="feature-list clearfix">
                                                    <li>Sign-up Fee: 1 Million</li>
                                                    <li>Sharing Ratio: 80% : 20%
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="table-footer">
                                                <a href="contact" class="link-btn">Get
                                                    Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="contact-section centred" style="padding: 10px;">
            <div class="auto-container">
                <h1 class="text-capitalize" style="color: #D9A464 ;">Investment Categories</h1>
                <img src="assets/images/investcat.jpeg" alt="">

                <img src="assets/images/investnew.jpg" class="py-2" alt="">
            </div>
        </section> -->
        <!-- <section class="contact-section bg-color-2">
            <div class="auto-container">


            </div>
        </section> -->

        <!-- contact-section -->
        <!-- <section class="contact-section">
            <div class="auto-container">

                <img src="assets/images/investnew2.jpg" class="py-2"  alt="">
                <img src="assets/images/invest3.jpeg"  class="py-2" alt="">
                <img src="assets/images/invest2.jpeg" class="py-2"  alt="">

            </div>
        </section> -->


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

</body><!-- End of .page_wrapper -->

</html>