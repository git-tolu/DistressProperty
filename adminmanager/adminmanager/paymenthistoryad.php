<?php
include('includes/aunthenticate.php'); 
$page=$fullname;
$home="HOSTEL AFRICA";
$apptitle = "Subscription Management System";

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
				
				<div class="col-sm-12 col-lg-12 d-flex justify-content-center align-items-center text-center">
                    <?php if(isset($_GET['id']) &&  $_GET['id'] != '' ):  ?>
                        <div class="card" style="width: 700px">
                            <div class="card-body">
                                <h4 class="card-title">PAYMENY HISTORY FOR STARTLET RESIDENT </h4>
								<?php if (isset($msg)) { echo $msg; }?>
                                <div class="">
                                   <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Date Paid</th>
												<th>Amount Paid</th>
                                                <th>Transaction ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php 
                                            $user = $_GET['id'];
                                            $sql8 = "SELECT * FROM payments WHERE userid='$user' ORDER BY id DESC";
                                                        
                                            $result8 = mysqli_query($conn, $sql8);
                                            if (mysqli_num_rows($result8) > 0) {
                                                $column_num = 1;
                                            while($info8 = mysqli_fetch_array($result8)) {	
                                            $mid = $info8['id'];
                                            $amountpaid = number_format($info8['amountpaid'],2);
                                            $transactionid= $info8['tx_ref'];
                                            $datepaid = $info8['tx_date'];

                                           echo" <tr>
                                                 <td>".$column_num++."</td>
                                                 <td>$datepaid</td>
												<td>$amountpaid</td>
                                               
                                                
                                               
                                                <td>$transactionid</td>
	
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
                        <?php else:  ?>
                        .<div class="card" style="width:500px">
                         
                              <div class="card-body">
                                <h5 class="card-title">Select Subscriber</h5>
                                <form class="row g-3 needs-validation" method="GET">
                                  <div class="col-md-12">
                                    <select class="form-control" id="validationCustom04" name="id"  required>
                                      <option selected disabled value="">Choose...</option>
                                      <?php 
                                        $sql8 = "SELECT * FROM subscribers";
                                        $result8 = mysqli_query($conn, $sql8);
                                            while ($result8Fetch = mysqli_fetch_assoc($result8)) {
                                                echo ' <option  value="'. $result8Fetch['regid'] .'">'. $result8Fetch['surname'] .' '. $result8Fetch['firstname'] .'</option>';
                                            }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                  </div>
                                </form>
                             
                              </div>
                            </div>
                        <?php endif;  ?>
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