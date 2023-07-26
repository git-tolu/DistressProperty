<header class="main-header header-style-two">
    <!-- header-top -->
    <!-- <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-clock"></i>Mon - Sat 9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+251-235-3256</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix text-white">
                    <li><a href="index"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index"><i class="fab fa-instagram"></i></a></li>
                </ul>
                <div class="sign-box text-white">
                


                </div>
            </div>
        </div>
    </div> -->
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box " style="visibility: hidden; width: 0px;">
                <?php if($page == 'DCi'):  ?>
                        <figure class="logo "><a href="index"><img src="assets/images/dcilogo.png"
                                style="width: 150px; height: 50px; " alt=""></a></figure>
                    <?php else: ?>
                            <figure class="logo "><a href="index"><img src="assets/images/logo.png"
                                style="width: 150px; height: 50px; " alt=""></a></figure>
                    <?php endif;?>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light ">
                        <div class="collapse navbar-collapse show clearfix " id="navbarSupportedContent">

                            <ul class="navigation clearfix">
                                <li class="  <?php if ($page == 'index') {
                                    echo 'current';
                                } ?>"><a href="index" class="">Home</a>
                                </li>
                                <li class="dropdown    <?php if ($page == 'property-grid') {
                                    echo 'current';
                                } ?>"><a href="property-gridAll" class=" "><span>Properties</span></a>
                                    <ul>
                                        <!-- <li><a href="property-gridAll"
                                                class="text-capitalize ">All Properties</a></li> -->
                                        <!-- <li><a href="property-grid?propertyCategory=Distress Properties"
                                                class="text-capitalize ">Distress</a></li>
                                        <li><a href="property-grid?propertyCategory=Land"
                                                class="text-capitalize">Land</a></li> -->
                                        <li><a href="property-grid?propertyCategory=Distress Properties"
                                                class="text-capitalize ">Distress Property</a></li>
                                        <li><a href="property-grid?propertyCategory=Non Distress Properties"
                                                class="text-capitalize ">Non-Distress Property</a></li>
                                                <li><a href="property-grid?propertyCategory=Land"
                                                class="text-capitalize ">Land</a></li>
                                                <li><a href="property-grid?propertyCategory=Autos/Machinery"
                                                        class="text-capitalize ">Autos & Machinery</a></li>
                                    </ul>
                                </li>
                                <li class="    <?php if ($page == 'DCi') {
                                    echo 'current';
                                } ?>"><a href="dci" class=" ">Invest</a></li>
                                <?php if($page == 'DCi'):  ?>
                                    <li class="reslogo mx-3  ">
                                        <figure class="logo reslogo"><a href="index"><img src="assets/images/dcilogo.png"
                                                    style="width: 150px; height: 50px; " alt=""></a>
                                        </figure>
                                    </li>
                                <?php else: ?>
                                        <li class="reslogo mx-3  ">
                                            <figure class="logo reslogo"><a href="index"><img src="assets/images/logo.png"
                                                        style="width: 150px; height: 50px; " alt=""></a>
                                            </figure>
                                        </li>

                                <?php endif;?>
                                <li class="    <?php if ($page == 'about') {
                                    echo 'current';
                                } ?>"><a href="about" class=" ">About
                                        Us</a></li>
                                <li class="    <?php if ($page == 'contact') {
                                    echo 'current';
                                } ?>"><a href="contact" class=" "><span>Contact </span></a></li>

                                <?php
                                if (isset($_SESSION['useremail'])):
                                    ?>

                                    <?php
                                    $cls = '';
                                    $user_role = 'Agent';
                                    if ($user_role == 'Agent') {
                                        if ($page == 'agent-profile') {
                                            $cls = 'current';
                                        }
                                        echo '<li class="    ' . $cls . '"><a href="agent-profile" class=" "><i class="fas fa-user"></i> My Account</a></li>';
                                    } else {
                                        if ($page == 'user-profile') {
                                            $cls = 'current';
                                        }
                                        echo '<li class="    ' . $cls . '"><a href="user-profile" class=" "><i class="fas fa-user"></i> My Account</a></li>';
                                    }
                                    ?>
                                    <?php
                                endif;
                                ?>
                                <li class=" ">
                                    <?php
                                    if (isset($_SESSION['useremail'])) {
                                        //echo '<a href="logout" class=" "><i class="fas fa-user"></i> &nbsp;Log Out</a>';
                                    } else {
                                        echo '<a href="signin" class=" "><i class="fas fa-user"></i> &nbsp;Sign In</a>';

                                    }
                                    ?>
                                </li>

                                <!-- <li class="dropdown"><a href="index"><span>Property</span></a>
                                    <ul>
                                        <li><a href="property-grid">Distress Property</a></li>
                                        <li><a href="property-list">Property List</a></li>
                                        <li><a href="property-grid">Property grid</a></li>

                                        <li><a href="property-list-2">Property List Full View</a></li>
                                        <li><a href="property-grid-2">Property Grid Full View</a></li>
                                        <li><a href="property-list-3">Property List Half View</a></li>
                                        <li><a href="property-grid-3">Property Grid Half View</a></li>
                                        <li><a href="property-details">Property Details 01</a></li>
                                        <li><a href="property-details-2">Property Details 02</a></li>
                                        <li><a href="property-details-3">Property Details 03</a></li>
                                        <li><a href="property-details-4">Property Details 04</a></li>
                                    </ul>
                                </li> -->
                                <!--<li class="current dropdown"><a href="index"><span>Home</span></a>
                                     <ul>
                                                <li><a href="index">Main Home</a></li>
                                                <li><a href="index-2">Home Modern</a></li>
                                                <li><a href="index-3">Home Map</a></li>
                                                <li><a href="index-4">Home Half Map</a></li>
                                                <li><a href="index-5">Home Agent</a></li>
                                                <li><a href="index-onepage">OnePage Home</a></li>
                                                <li><a href="index-rtl">RTL Home</a></li>
                                                <li class="dropdown"><a href="index">Header Style</a>
                                                    <ul>
                                                        <li><a href="index">Header Style 01</a></li>
                                                        <li><a href="index-2">Header Style 02</a></li>
                                                        <li><a href="index-3">Header Style 03</a></li>
                                                    </ul>
                                                </li>
                                            </ul> 
                                </li>-->
                                <!-- <li class="dropdown"><a href="index"><span>Listing</span></a>
                                            <ul>
                                                <li><a href="agents-list">Agents List</a></li>
                                                <li><a href="agents-grid">Agents Grid</a></li>
                                                <li><a href="agents-details">Agent Details</a></li>
                                            </ul>
                                        </li>  -->

                                <!-- <li class="dropdown"><a href="index"><span>Pages</span></a>
                                            <div class="megamenu">
                                                <div class="row clearfix">
                                                    <div class="col-xl-4 column">
                                                        <ul>
                                                            <li><h4>Pages</h4></li>
                                                            <li><a href="about">About Us</a></li>
                                                            <li><a href="services">Our Services</a></li>
                                                            <li><a href="faq">Faq's Page</a></li>
                                                            <li><a href="pricing">Pricing Table</a></li>
                                                            <li><a href="compare-roperties">Compare Properties</a></li>
                                                            <li><a href="categories">Categories Page</a></li>
                                                            <li><a href="career">Career Opportunity</a></li>
                                                            <li><a href="testimonials">Testimonials</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xl-4 column">
                                                        <ul>
                                                            <li><h4>Pages</h4></li>
                                                            <li><a href="gallery">Our Gallery</a></li>
                                                            <li><a href="uploadprops">Upload Property</a></li>
                                                            <?php
                                                            if ($user_role == 'Agent') {
                                                                echo '<li><a href="agent-profile">profile</a></li>';
                                                            } else {
                                                                echo '<li><a href="user-profile">profile</a></li>';
                                                            }
                                                            ?>
                                                            <li><a href="signin">Sign In</a></li>
                                                            <li><a href="signup">Sign Up</a></li>
                                                            <li><a href="error">404</a></li>
                                                            <li><a href="agents-list">Agents List</a></li>
                                                            <li><a href="agents-grid">Agents Grid</a></li>
                                                            <li><a href="agents-details">Agent Details</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xl-4 column">
                                                        <ul>
                                                            <li><h4>Pages</h4></li>
                                                            <li><a href="blog-1">Blog 01</a></li>
                                                            <li><a href="blog-2">Blog 02</a></li>
                                                            <li><a href="blog-3">Blog 03</a></li>
                                                            <li><a href="blog-details">Blog Details</a></li>
                                                            <li><a href="agency-list">Agency List</a></li>
                                                            <li><a href="agency-grid">Agency Grid</a></li>
                                                            <li><a href="agency-details">Agency Details</a></li>
                                                            <li><a href="contact">Contact Us</a></li>
                                                        </ul>
                                                    </div>                                   
                                                </div>                                        
                                            </div>
                                        </li>  -->
                                <!-- <li class="dropdown"><a href="index"><span>Agency</span></a>
                                            <ul>
                                                <li><a href="agency-list">Agency List</a></li>
                                                <li><a href="agency-grid">Agency Grid</a></li>
                                                <li><a href="agency-details">Agency Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="index"><span>Blog</span></a>
                                            <ul>
                                                <li><a href="blog-1">Blog 01</a></li>
                                                <li><a href="blog-2">Blog 02</a></li>
                                                <li><a href="blog-3">Blog 03</a></li>
                                                <li><a href="blog-details">Blog Details</a></li>
                                            </ul>
                                        </li>  
                                        <li><a href="contact"><span>Contact</span></a></li>    -->
                                <!-- <li class=" ">
                                    <div class="btn-box ">
                                        <?php
                                        if ($user_role == 'Agent') {
                                            echo '<a href="uploadprops" class="theme-btn btn-one" style="height: 10px !important; font-size: 15px;
                                            line-height: 1px;"><span>+</span>Add Listing</a>';
                                        } else {

                                        }
                                        ?>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <!-- <div class="logo-box">
                    <figure class="logo"><a href="index"><img src="assets/images/logo.png" alt=""></a></figure>
                </div> -->
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <!-- <div class="btn-box">
                    <a href="index" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div> -->
            </div>
        </div>
    </div>
</header>