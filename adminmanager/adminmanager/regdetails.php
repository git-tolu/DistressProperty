<?php
include('includes/aunthenticate.php'); 
$page="Registration Details";
$home="EXMAN";
$apptitle="Membership Management System";
$todaydate=date("jS F, Y");
$mid = $_GET['id'];

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

if (empty($compprofile)){
	$compprofile = "<img class='responsive' src='assets/images/notuploaded.jpg' width='310'>";
}else{
	$compprofile = "<a href ='$compprofile' target='blank'><img class='responsive' src='assets/images/download.jpg' width='310'></a>";
}

$certincorp = $info8['certincorp'];
if (empty($certincorp)){
	$certincorp = "<img class='responsive' src='assets/images/notuploaded.jpg' width='310'>";
}else{
	$certincorp = "<a href ='$certincorp' target='blank'><img class='responsive' src='assets/images/download.jpg' width='310'></a>";
}

$formc07 = $info8['formc07'];
if (empty($formc07)){
	$formc07 = "<img class='responsive' src='assets/images/notuploaded.jpg' width='310'>";
}else{
	$formc07 = "<a href ='$formc07' target='blank'><img class='responsive' src='assets/images/download.jpg' width='310'></a>";
}
$formc02 = $info8['formc02'];
if (empty($formc02)){
	$formc02 = "<img class='responsive' src='assets/images/notuploaded.jpg' width='310'>";
}else{
	$formc02 = "<a href ='$formc02' target='blank'><img class='responsive' src='assets/images/download.jpg' width='310'></a>";
}
$auditedacct = $info8['auditedacct'];
if (empty($auditedacct)){
	$auditedacct = "<img class='responsive' src='assets/images/notuploaded.jpg' width='310'>";
}else{
	$auditedacct = "<a href ='$auditedacct' target='blank'><img class='responsive' src='assets/images/download.jpg' width='310'></a>";
}
}
}
// end
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include("includes/pagehead.php");
?>
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
						 <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><center>CONTACT PERSON INFO.</center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
										<img style="border-style: dotted;" class="p-25 responsive" src="<?php echo $mpassport; ?>" width="350" /></center>
										<br><img style="border-style: dotted;" class="p-15 responsive" src="<?php echo $signature; ?>"  width="350" /></center>
											
                                            <br>
                                            <li class="list-group-item list-group-item-danger"><h4><?php echo $contactperson; ?><br><small>[contact person]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $designation; ?><br><small>[designation]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $emailaddress; ?><br><small>[email address]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $phone; ?><br><small>[Telephone]</small></h4> </li>
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
					
					    <div class="col-lg-4 col-xlg-3 col-md-5">
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
					
					    <div class="col-lg-4 col-xlg-3 col-md-5">
											 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>UPLOADED DOCUMENTS </center></h4></div>
                        <div class="card">
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
										    
                                            <li class="list-group-item list-group-item-default"><h4>COMPANY PROFILE<br><?php echo $compprofile; ?></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4>CERTIFICATE OF INCORPORATION<br><?php echo $certincorp; ?></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4>CAC FORM C07<br><?php echo $formc07; ?></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4>CAC FORM C02<br><?php echo $formc02; ?></h4> </li>
                                        <li class="list-group-item list-group-item-default"><h4>AUDITED ACCOUNT<br><?php echo $auditedacct; ?></h4></li>
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
	
	

</body>

</html>