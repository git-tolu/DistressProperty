<?php
include('includes/aunthenticate.php'); 
$page="General Notification";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");

//send notifications
if (isset($_POST['submitform'])){
$datereg=date("d-m-y , g:i a");
$emailmessage = mysqli_real_escape_string($conn,$_POST['emailmessage']);
$smsmessage = mysqli_real_escape_string($conn,$_POST['smsmessage']);
$subject = mysqli_real_escape_string($conn,$_POST['subject']);
$senderid = mysqli_real_escape_string($conn,$_POST['senderid']);

// fetch all emails and phone numbers
	$sqlb = "SELECT DISTINCT * FROM membership WHERE status ='active'";
$resultb = mysqli_query($conn, $sqlb);
if (mysqli_num_rows($resultb) > 0) {
	$column_count = mysqli_num_rows($resultb) or die(mysql_error());
	$allnos ="";
	$allemails ="";
	while($infob = mysqli_fetch_array($resultb)) {
	$emailaddress = $infob['emailaddress'];	
	$allemails = $emailaddress.", ".$allemails;
	$phone = $infob['phone'];
	$allnos = $phone.", ".$allnos;
	}
}
//
$id=0;
$sqlinsert = "INSERT INTO notifications VALUES ('$id', '$emailmessage', '$subject', '$smsmessage','$datereg', 'general','$allemails','$allnos','notsent','notsent')";
if (mysqli_query($conn, $sqlinsert)) {
	header("location:messagequee.php");
}
}

//	

//
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include("includes/pagehead.php");
?>
 <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
						 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>EMAIL NOTIFICATION DETAILS </center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                      
								<form action="" method="post">
									  <b> Subject </b> <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                   <input required name="subject" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								  <b>Message </b><br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
								    <textarea name="emailmessage" class="form-control" rows="5"></textarea>
                               
                                </div> 
								
								 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>SMS NOTIFICATION DETAILS </center></h4></div>
    	
								<br>
								
									  <b> Sender ID </b> <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                   <input readonly value="EXMAN"  type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                   <input required value="EXMAN" name="senderid" type="hidden" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								  <b>Message </b><br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
								    <textarea name="smsmessage" class="form-control" rows="5"></textarea>
                               
                                </div> 
								<div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button  class="btn btn-block btn-lg btn-info" type="submit" name="submitform">SEND NOW </button>
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
					
					    <div class="col-lg-8 col-xlg-3 col-md-5">
                        <div class="card">
						
						 <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><center>NOTIFICATION HISTORY</center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                      <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Date Sent</th>
												<th>Email Message</th>
                                                <th>SMS Message</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php 
$sql8 = "SELECT *FROM notifications WHERE mtype='general' ORDER BY id DESC";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$emailmessage = $info8['emailmessage'];
$smsmessage = $info8['smsmessage'];
$datesent= $info8['datesent'];


                                           echo" <tr>
                                                 <td>$datesent</td>
												<td>$emailmessage</td>
                                               
                                                
                                                <td>$smsmessage </td>
                                                
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
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
							
                        </div>
                    </div>
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