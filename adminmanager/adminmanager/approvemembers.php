<?php
include('includes/aunthenticate.php'); 
$page="Membership Approval/Decline";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");
$mid = $_GET['id'];
$newstatus = $_GET['newstatus'];
if ($newstatus=="Declined"){
	$caption="DECLINE";
}
if ($newstatus=="Approved"){
	$caption="APPROVE";
}
// get user details

$sql8 = "SELECT *FROM membership WHERE id='$mid'";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = strtoupper($info8['agencyname']);
$contactperson = strtoupper($info8['contactperson']);
$datereg = $info8['datereg'];
$initialpayment = $info8['initialpayment'];
$userid = $info8['username'];
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
$rcno = $info8['rcno'];
$orgfunctions = $info8['orgfunctions'];
$memberstatus = $info8['status'];
$approvaladmin = $info8['approvaladmin'];
$agreeterm = $info8['agreeterm'];
$yearreg = $info8['yearreg'];
$emailstatus = $info8['emailstatus'];
$nextannualdue = $info8['nextannualdue'];
$completeregpay = $info8['completeregpay'];
$biznature = $info8['biznature'];
$apconcert = strtoupper($info8['apconcert']);
$seniorstaff = strtoupper($info8['seniorstaff']);
$peraddress = $info8['peraddress'];
$percity = $info8['percity'];
$perstate = $info8['perstate'];
$percountry = $info8['percountry'];
$postaladdress = $info8['postaladdress'];
$designation = strtoupper($info8['designation']);
$mpassport = $info8['passport'];

$signature = $info8['signature'];
$compprofile = $info8['compprofile'];
$passw = $info8['pincode'];

}
}
// end

// approval or decline
	
if (isset($_POST['submitform'])){
$datereg=date("d-m-y , g:i a");
$mstatus = mysqli_real_escape_string($conn,$_POST['mstatus']);
$adminemail = mysqli_real_escape_string($conn,$_POST['adminemail']);
$agencyname = mysqli_real_escape_string($conn,$_POST['agencyname']);
$agencyemail = mysqli_real_escape_string($conn,$_POST['agencyemail']);
$agencyuserid = mysqli_real_escape_string($conn,$_POST['agencyuserid']);
$adminuserid = mysqli_real_escape_string($conn,$_POST['adminuserid']);
$adminfname = mysqli_real_escape_string($conn,$_POST['adminfname']);
$contactdesignation = mysqli_real_escape_string($conn,$_POST['contactdesignation']);
$agencyphone = mysqli_real_escape_string($conn,$_POST['agencyphone']);
$agencycontact = mysqli_real_escape_string($conn,$_POST['agencycontact']);

$mremarks = mysqli_real_escape_string($conn,$_POST['mremarks']);
if ($mstatus=="Approved"){
//send approval email
include("emailtemplates/approvalemail.php");
}else{
//send decline email
include("emailtemplates/declineemail.php");
}

$id=0;
$sqlpay = "UPDATE membership set approvaladmin ='$mstatus' WHERE username='$agencyuserid'";
if (mysqli_query($conn, $sqlpay)) {
}

$sqlinsert = "INSERT INTO approvaldetails VALUES ('$id', '$agencyuserid','$agencyname','$agencyemail',' $adminuserid','$adminfname','$adminemail',	'$mstatus',	'$mremarks','$datereg')";
if (mysqli_query($conn, $sqlinsert)) {
	header("location:successapproval.php");
}


//	


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
        <h4 class="m-b-0 text-white"><center><?php echo $caption;?> APPLICATION</center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                      
								<form action="" method="post">
									  <b> Application Status </b> <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                    <input readonly  value="<?php echo $newstatus; ?>" name="mstatus" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                    <input hidden  value="<?php echo $newstatus; ?>" name="mstatus" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								 <input value="<?php echo $agencyname; ?>" required name="agencyname" type="hidden">
								 <input value="<?php echo $emailaddress; ?>" required name="agencyemail" type="hidden">
								 <input value="<?php echo $userid; ?>" required name="agencyuserid" type="hidden">
								 <input value="<?php echo $user; ?>" required name="adminuserid" type="hidden">
								 <input value="<?php echo $fullname; ?>" required name="adminfname" type="hidden">
								 <input value="<?php echo $adminemailadd; ?>" required name="adminemail" type="hidden">
								 <input value="<?php echo $contactperson; ?>" required name="agencycontact" type="hidden">
								 <input value="<?php echo $designation; ?>" required name="contactdesignation" type="hidden">
								 <input value="<?php echo $phone; ?>" required name="agencyphone" type="hidden">
									  <b>Remarks? </b><br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
								    <textarea name="mremarks" class="form-control" rows="8"></textarea>
                               
                                </div> 
								
								
								<div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button  class="btn btn-block btn-lg btn-warning" type="submit" name="submitform">SAVE STATUS </button>
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
					
					    <div class="col-lg-5 col-xlg-3 col-md-5">
                        <div class="card">
						
						 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>CORPORATE DETAILS </center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
										   <li class="list-group-item list-group-item-danger"><h4><?php echo $agencyname; ?><br><small>[name of agency]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $rcno; ?><br><small>[RC Number]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $biznature; ?><br><small>[business nature]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $orgfunctions; ?><br><small>[organization functions]</small></h4> </li>
											
											<li class="list-group-item list-group-item-danger"><h4><?php echo $apconcert; ?><br><small>[APCON or NIMN certified?]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $seniorstaff; ?><br><small>[have senior staff?]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $peraddress; ?><br><small>[permanent address]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $percity; ?><br><small>[city]</small></h4> </li>
											
											<li class="list-group-item list-group-item-danger"><h4><?php echo $perstate; ?><br><small>[state]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $percountry; ?><br><small>[country]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $postaladdress; ?><br><small>[postal address]</small></h4></li>
                                        </ul>
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