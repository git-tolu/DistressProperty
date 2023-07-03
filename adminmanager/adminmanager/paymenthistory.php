<?php
include('includes/aunthenticate.php'); 
$page="Payment History";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");


// process payment history
	
if (isset($_POST['submitform'])){
$agencyuserid = mysqli_real_escape_string($conn,$_POST['agencyuserid']);
header("location:paymenthistorydetails.php?uid=$agencyuserid");
}

//
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include("includes/pagehead.php");
?>
 <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    
 <style>
 .responsive {
  width: 100%;
  max-width: 350px;
  height: auto;
}  
</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
	include("includes/preloader.php");
	?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
      <?php
	  include("includes/topheader.php");
	  ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php
	   include("includes/leftsidebar.php");
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
		   include("includes/breadcrumb.php");
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
                    <!-- Column -->
                    <div class="col-lg-7 col-xlg-3 col-md-5">
                        <div class="card">
						 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>SELECT NAME OF AGENCY </center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                      
								<form action="" method="post">
								<div class="input-group mb-3">
                                    
                                     <select name='agencyuserid' class="select2 form-control custom-select" style="width: 100%; height:50px !important;">
                                    <option>Select</option>
									<?php 
										$sql8 = "SELECT *FROM membership WHERE status='active' AND approvaladmin='Approved' ORDER BY id DESC";			   
										$result8 = mysqli_query($conn, $sql8);
										if (mysqli_num_rows($result8) > 0) {
										while($info8 = mysqli_fetch_array($result8)) {	
										$mid = $info8['id'];
										$agencyname = $info8['agencyname'];
										$userid = $info8['username'];
										echo"<option value=$userid>$agencyname</option>";
										}
										}
									?>
                                     
                                       
                                    
                                </select>
                                </div>
								
							
								
								
								
								<div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button  class="btn btn-block btn-lg btn-warning" type="submit" name="submitform">DISPLAY PAYMENT HISTORY </button>
                                    </div>
                                </div>
								
								
								</form>
                                        
                                    </div>
							
                            </div>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
							
                        </div>
                    </div>
                    <!-- Column -->
					
					
                    <!-- Column -->
					
                    <!-- Column -->
                   
            
			
			
			
			
			
			
			
                    <!-- Column -->
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
    <?php
	include("includes/pagescript.php");
	?>
	
		<!--This page plugins -->
    
   <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>

</body>

</html>