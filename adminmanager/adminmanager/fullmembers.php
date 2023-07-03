<?php
include('includes/aunthenticate.php'); 
$page="Active Members";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");
?><!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include("includes/pagehead.php");
?>
 <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    
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
				
				<div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">MANAGE ACTIVE MEMBERS</h4>
								<?php if (isset($msg)) { echo $msg; }?>
                                <div class="">
                                   <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Name of Agency</th>
                                                <th>RC No.</th>
                                                
                                                <th>Next Due</th>
                                                <th>Email Address</th>
                                                <th>Phone No.</th>
                                                <th>Contact Person</th>
                                                
												<th>Date Registered</th>
												 
                                                <th> -- </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php 
			  
$sql8 = "SELECT *FROM membership WHERE status='active' AND approvaladmin='Approved' ORDER BY id DESC";
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = $info8['agencyname'];
$contactperson = $info8['contactperson'];
$datereg = $info8['datereg'];
$initialpayment = $info8['initialpayment'];
$userid = $info8['username'];
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
$rcno = $info8['rcno'];
$orgfunctions = $info8['orgfunctions'];
$memberstatus = $info8['status'];
$nextannualdue = $info8['nextannualdue'];


                                           echo" <tr>
                                                <td>$agencyname</td>
                                                <td>$rcno</td>
                                                
                                                <td>$nextannualdue </td>
                                                <td>$emailaddress</td>
												<td>$phone</td>
												<td>$contactperson</td>
											
												<td>$datereg</td>
                                                <td><div class='btn-group'>
    <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
        Action
    </button>
    <div class='dropdown-menu'>
        <a class='dropdown-item' href='regdetails.php?id=$mid'>Registration Details</a>
		
        <a class='dropdown-item' href='resendactivation.php?id=$mid''>Resend Login Details </a>
	
        
    </div>
</div></td>
                                            </tr>";
}
}
											?>
											
                                           
                                        </tbody>
                                       
                                    </table>
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
    <?php
	include("includes/pagescript.php");
	?>
	
		<!--This page plugins -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-advanced.init.js"></script>


</body>

</html>