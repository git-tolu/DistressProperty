<?php
include('includes/aunthenticate.php');
$page = $fullname;
$home = "HOSTEL AFRICA";
$apptitle="Subscription Management System";

$todaydate = date("jS F, Y");

if (isset($_GET['id'])) {
    $user = $_GET['id'];
} else {
    header("location: pendingmembers.php");
}
// get user details
$sql8 = "SELECT *FROM  subscribers WHERE regid ='$user'";
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
    while ($info8 = mysqli_fetch_array($result8)) {
        $mid = $info8['id'];
        $title = strtoupper($info8['title']);
        $passport = $info8['passport'];
        $surname = $info8['surname'];
        $firstname = $info8['firstname'];
        $maidenname = strtoupper($info8['maidenname']);
        $othernames = $info8['othernames'];
        $nationality = strtoupper($info8['nationality']);
        $countryofresidence = strtoupper($info8['countryofresidence']);
        $contactaddress = strtoupper($info8['contactaddress']);
        $hometelno = $info8['hometelno'];
        $mailingaddress = strtoupper($info8['mailingaddress']);
        $nextofkin = strtoupper($info8['nextofkin']);
        $mobileno = $info8['mobileno'];
        $occupation = strtoupper($info8['occupation']);
        $employersname = strtoupper($info8['employersname']);
        $employerstelno = $info8['employerstelno'];
        $employersfulladdress = strtoupper($info8['employersfulladdress']);
        $paymentplans = $info8['paymentplans'];

        if ($paymentplans == "outright") {
            $paymentplans = strtoupper("Outright Payment @ 5% discount");
        }
        if ($paymentplans == "6 months") {
            $paymentplans = strtoupper("6 months Payment Plan @2.5% discount");
        }

        if ($paymentplans == "18 months") {
            $paymentplans = strtoupper("18 months Payment Plan @zero interest rate");
        }

        $witnessname = strtoupper($info8['witnessname']);
        $witnessaddress = strtoupper($info8['witnessaddress']);
        $witnessoccupation = strtoupper($info8['witnessoccupation']);
        $refname = $info8['refname'];
        $refaddress = $info8['refaddress'];
        $refemail = $info8['refemail'];
        $reftelno = $info8['reftelno'];
        $datereg = $info8['datereg'];
        $amountpayable = $info8['amountpayable'];
        $amountpayablef = number_format($info8['amountpayable'], 2);
        $units = $info8['numofunits'];
        $useremailadd = $info8['emailaddress'];

    }
}

// find total paid
// get user details
$sql7 = "SELECT *FROM  payments WHERE userid ='$user'";
$result7 = mysqli_query($conn, $sql7);
if (mysqli_num_rows($result7) > 0) {
    $totalpaid = 0;
    while ($info7 = mysqli_fetch_array($result7)) {
        $amountpaid = $info7['amountpaid'];
        $totalpaid = $totalpaid + $amountpaid;
    }
}else{
    $amountpaid = 0;
    $totalpaid = 0;
}
$balance = $amountpayable - $totalpaid;
$balancef = number_format($balance, 2);
$totalpaidf = number_format($totalpaid, 2);

$priceperunit = $amountpayable / $units;
$priceperunitf = number_format($priceperunit, 2);
// end
if ($amountpayable > $totalpaid) {
    $paybuton = "<a href='makepayment.php'><button class='btn btn-block btn-lg btn-secondary' type='button'>MAKE PAYMENT NOW </button></a></li>";
} else {
    $paybuton = "";
}

if ($totalpaid > 0) {
    $payhistory = "<a href='paymenthistorydetails.php'><button class='btn btn-block btn-lg btn-primary' type='button'>VIEW PAYMENT HISTORY</button></a></li>";
} else {
    $payhistory = "";
}

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
        <h4 class="m-b-0 text-white"><center>PERSONAL DATA</center></h4></div>
    
                            <div class="card-body">
                                
                            <div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
                                        <img style="border-style: dotted;" class="p-25 responsive" src="../<?php echo $passport; ?>" width="350" /></center>
                                            
                                            <br>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo "$title $fullname"; ?><br><small>[FULL NAME]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $maidenname; ?><br><small>[MAIDEN NAME]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $nationality; ?><br><small>[NATIONALITY]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $countryofresidence; ?><br><small>[CONTACT ADDRESS]</small></h4> </li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $useremailadd; ?><br><small>[EMAIL ADDRESS]</small></h4> </li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $hometelno; ?><br><small>[HOME TEL]</small></h4> </li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $mailingaddress; ?><br><small>[MAILING ADDRESS]</small></h4> </li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $nextofkin; ?><br><small>[NEXT OF KIN NAME]</small></h4> </li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $mobileno; ?><br><small>[NEXT OF KIN PHONE]</small></h4> </li>
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
        <h4 class="m-b-0 text-white"><center>EMPLOYMENT DETAILS </center></h4></div>
    
                            <div class="card-body">
                                
                            <div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
                                           <li class="list-group-item list-group-item-default"><h4><?php echo $occupation; ?><br><small>[OCCUPATION]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $employersname; ?><br><small>[EMPLOYER NAME]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $employerstelno; ?><br><small>[EMPLOYER PHONE]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $employersfulladdress; ?><br><small>[EMPLOYER ADDRESS]</small></h4> </li>
                                            
                                         </ul>
                                    </div>
                            
                            </div>
                            </div>
                            
                            
                    <div class="card">
                        
                         <div class="card-header bg-warning">
                      <h4 class="m-b-0 text-white"><center>WITNESS DETAILS</center></h4></div>
    
                            <div class="card-body">
                                
                            <div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
                                           <li class="list-group-item list-group-item-default"><h4><?php echo $witnessname; ?><br><small>[WITNESS NAME]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $witnessaddress; ?><br><small>[WITNESS ADDRESS]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $witnessoccupation; ?><br><small>[WITNESS OCCUPATION]</small></h4></li>
                                              
                                         </ul>
                                    </div>
                            
                            </div>
                     </div>
                     
                     <div class="card">
                        
                         <div class="card-header bg-warning">
                      <h4 class="m-b-0 text-white"><center>FIRST REFERER </center></h4></div>
    
                            <div class="card-body">
                                
                            <div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
                                           <li class="list-group-item list-group-item-default"><h4><?php echo $refname; ?><br><small>[REFERENCE NAME]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $refaddress; ?><br><small>[REFERENCE ADDRESS]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $refemail; ?><br><small>[REFERENCE EMAIL]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $reftelno; ?><br><small>[REFERENCE TEL NO.]</small></h4> </li>
                                            
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
        <h4 class="m-b-0 text-white"><center>PRODUCT SUBSCRIPTION </center></h4></div>
                        <div class="card">
                            <div class="card-body">
                                
                            <div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
                                             <li class="list-group-item list-group-item-default">
                                            <div class="card">
                                             <img class="card-img-top img-responsive" src="assets/images/hostelafrica.jpg" alt="Card image cap">
                                   
                                            </div>
                                            </li>
                                            <li class="list-group-item list-group-item-default"><h4>STARLET RESIDENCE <br><small>[NAME OF PRODUCT]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $units; ?><br><small>[NO. OF UNITS]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $paymentplans; ?><br><small>[PAYMENT PLAN]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><b><center>₦<?php echo $priceperunitf; ?></b><br><small>[PRICE PER UNIT]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4 class="text-warning"><b><center>₦<?php echo $amountpayablef; ?></b><br><small>[TOTAL AMOUNT TO PAY]</small></h4> </li>
                                            <li class="list-group-item list-group-item-primary"><h4 class="text-white"><b><center>₦<?php echo $totalpaidf; ?></b><br><small>[TOTAL AMOUNT PAID]</small></h4> 
                                            <?php //  echo $paybuton; ?>
                                            <?php // echo $payhistory; ?>
                                            <br>
                                            </li>
                                            <li class="list-group-item list-group-item-default"><h4 class="text-danger"><b><center>₦<?php echo $balancef; ?></b><br><small>[BALANCE]</small></h4> </li>
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