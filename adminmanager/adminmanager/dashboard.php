<?php
include('includes/aunthenticate.php');
$page = "Dashboard";
$home = "Xero Real";
$apptitle = "Application Management System";
$todaydate = date("jS F, Y");

// active membership
// $sql8 = "SELECT * FROM membership WHERE status='active'";		   
$sql8 = "SELECT * FROM real_users";
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
    $activemembers = number_format(mysqli_num_rows($result8));

} else {
    $activemembers = 0;
}

$sql8 = "SELECT * FROM real_users WHERE accountstatus='pending' ";
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
    $amountpayable = number_format(mysqli_num_rows($result8));

} else {
    $amountpayable = 0;
}

$sql8 = "SELECT * FROM real_users WHERE accountstatus='Activated' ";
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
    $amountowing = number_format(mysqli_num_rows($result8));

} else {
    $amountowing = 0;
}
// inactive members

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
include("includes/pagehead.php");
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
    // include("includes/preloader.php");
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
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#000 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;"
                                                href='fullmembers.php'>Total Application</a></span>
                                        <h4><a style="color:#fff !important;" href='fullmembers.php'>
                                                <?php echo $activemembers; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='fullmembers.php'> <img src="assets/images/active.png" width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#F17821 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;" href='pendingmembers.php'>Pending
                                                Application</a></span>
                                        <h4 style="color:#fff !important;"><a style="color:#fff !important;"
                                                href='pendingmembers.php'>
                                                <?php echo $amountpayable; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='pendingmembers.php'><img src="assets/images/pending.png"
                                                width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#000 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;" href='owingmembers.php'>Approved Application
                                            </a></span>
                                        <h4><a style="color:#fff !important;" href='owingmembers.php'>
                                                <?php echo $amountowing; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='owingmembers.php'> <img src="assets/images/owing.png" width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Recent Applications </h4>
                                        <h5 class="card-subtitle">Overview of Last Ten Recent Applications </h5>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="dl">
                                            <div class="button-group">
                                                <a href="pendingmembers.php"><button type="button"
                                                        class="btn waves-effect waves-light btn-outline-primary">+ View
                                                        All</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0 text-capitalize">full name</th>
                                            <th class="border-top-0 text-capitalize">user_email</th>

                                            <th class="border-top-0 text-capitalize">user_role</th>
                                            <th class="border-top-0 text-capitalize">userphone</th>
                                            <th class="border-top-0 text-capitalize">aboutuser</th>
                                            <th class="border-top-0 text-capitalize">usertitle</th>
                                            <th class="border-top-0 text-capitalize"> Date Registered</th>
                                            <th class="border-top-0 text-capitalize"> Account Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql8 = "SELECT * FROM real_users  ORDER BY id DESC LIMIT 10";

                                        $result8 = mysqli_query($conn, $sql8);
                                        if (mysqli_num_rows($result8) > 0) {
                                            $column_num = 1;
                                            while ($info8 = mysqli_fetch_array($result8)) {
                                                $user = $info8['user_id'];

                                                $mid = $info8['user_id'];
                                                $fullname = $info8['fullname'];
                                                $user_email = $info8['user_email'];
                                                $user_role = $info8['user_role'];
                                                $userphone = $info8['userphone'];
                                                $aboutuser = $info8['aboutuser'];
                                                $usertitle = $info8['usertitle'];
                                                $datereg = $info8['datereg'];
                                                $accountstatus = $info8['accountstatus'];
                                                if ($accountstatus == 'pending') {
                                                    $class = 'label-danger';
                                                } else {
                                                    $class = 'label-success';
                                                }
                                                

                                                echo "
                                        <tr>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='assets/images/small.png' width='70%'></a></div>
                                                    <div class=''>
                                                        <h4 class='m-b-0 font-16'>$fullname</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$user_email</td>
                                            <td>$user_role</td>
                                            <td>$userphone</td>
                                            <td><label class='label label-danger'>$aboutuser</label></td>
                                            <td>$usertitle</td>
                                            <td>
                                            <h5 class='m-b-0'>$datereg</h5>
                                            </td>
                                            <td><label class='label $class'>$accountstatus</label></td>
                                            <td>
                                        </td>
											
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