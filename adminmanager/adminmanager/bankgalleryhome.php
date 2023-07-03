<?php
include('includes/opendb.php'); 

?><!DOCTYPE html>
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

<?php $sql8 = "SELECT *FROM bank WHERE adminapproval='Approved' ORDER BY id DESC";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = strtoupper($info8['agencyname']);
$nameactivity = $info8['nameactivity'];
$yearactivity = $info8['yearactivity'];
$bankid = $info8['userid'];

				echo" <div class='col-sm-12 col-lg-3'>
                        <div class='card'>
                            <div class='card-body'>
                               
							   <ul class='list-group'>
								  <li class='list-group-item list-group-item-primary text-white'><h4><center>$agencyname</center></h4>
								  <center>$nameactivity | $yearactivity </center></li>
							    </ul>
                                          
							   
								 <center><a href='bankgallerypage.php?id=$bankid&agency=$agencyname&year=$yearactivity&activity=$nameactivity'><button type='button' class='btn btn-block btn-lg btn-info'>View Gallery </button> </a></center>
                              
                            </div>
                        </div>
                    </div>";
}
}			
			?>
					
					
				
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