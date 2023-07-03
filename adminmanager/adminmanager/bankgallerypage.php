<?php
include('includes/opendb.php'); 
$agencyname=strtoupper($_GET['agency']);
$yearactivity=$_GET['year'];
$bankid=$_GET['id'];
$nameactivity=strtoupper($_GET['activity']);

?>
<?php


	//get current directory
	//$working_dir = getcwd();
	
	//get image directory
	$img_dir = $working_dir . "/../home/exmancom/membership.exman.com.ng/submitbankentry/uploads/$bankid/";
	
	//change current directory to image directory
	chdir($img_dir);
	
	//using glob() function get images 
	$files = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE );
	
	
	//again change the directory to working directory
	chdir($working_dir);
	?>
	<!DOCTYPE html>
<html dir="ltr" lang="en">
 <!-- Custom CSS -->
    <!-- Popup CSS -->
  <head>
 <link href="https://membership.exman.com.ng/adminmanager/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="https://membership.exman.com.ng/adminmanager/dist/css/style.min.css" rel="stylesheet">
	
 
 <!-- This page plugin CSS -->
    
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
	//include("includes/preloader.php");
	?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
      <?php
	 // include("includes/topheader.php");
	  ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php
	 //  include("includes/leftsidebar.php");
	   ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           <?php
		//   include("includes/breadcrumb.php");
		   ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->
                <div class="row">
				
				<div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-primary">PICTURE GALLERY OF <?php echo $nameactivity ?> | <?php echo $yearactivity ?> | <small> <?php echo $agencyname ?></h4>
								
                                <div class="">
                                  
								  <div class="row el-element-overlay">
                    
                   


	
	<?php
	$c = 1;
	//iterate over image files
	foreach ($files as $file) {
		
		echo "<div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='el-card-item'>
                                <div class='el-card-avatar el-overlay-1'> <img src='https://membership.exman.com.ng/submitbankentry/uploads/$bankid/$file' alt='$nameactivity' width='50%'/>
                                    <div class='el-overlay'>
                                        <ul class='list-style-none el-info'>
                                            <li class='el-item'><a class='btn default btn-outline image-popup-vertical-fit el-link' href='https://membership.exman.com.ng/submitbankentry/uploads/$bankid/$file'><i class='icon-magnifier'></i></a></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class='el-card-content'>
                                    <h4 class='m-b-0'>$nameactivity | $yearactivity</h4> <span class='text-muted'>$agencyname</span>
                                </div>
                            </div>
                        </div>
                    </div>";
	 $c++; } ?>
	
   
   
   
		



				   
					
					
					
					
                </div>
								  
								  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
				
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        <?php 
		include("includes/footer.php");
		?> <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->
   
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <!--This page JavaScript -->
     <script src="https://membership.exman.com.ng/adminmanager/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="https://membership.exman.com.ng/adminmanager/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://membership.exman.com.ng/adminmanager/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/app.min.js"></script>
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/app-style-switcher.horizontal.js"></script>
   <!-- slimscrollbar scrollbar JavaScript -->
    <script src="https://membership.exman.com.ng/adminmanager/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://membership.exman.com.ng/adminmanager/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="https://membership.exman.com.ng/adminmanager/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="https://membership.exman.com.ng/adminmanager/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="https://membership.exman.com.ng/adminmanager/assets/libs/magnific-popup/meg.init.js"></script>
	

</body>

</html>