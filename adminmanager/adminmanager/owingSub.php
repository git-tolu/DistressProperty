<?php
include('includes/aunthenticate.php');
$page = "Application";
$home = "Hostel Africa";
$apptitle = "Subscription Management System";
$todaydate = date("jS F, Y");

?>
<!DOCTYPE html>
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
                                <h4 class="card-title">Applications</h4>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="file_export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0 text-capitalize">full name</th>
                                                    <th class="border-top-0 text-capitalize">nationality</th>
                                                    <th class="border-top-0 text-capitalize">email address</th>
                                                    <th class="border-top-0 text-capitalize">num of units</th>
                                                    <th class="border-top-0 text-capitalize">amount payable</th>
                                                    <th class="border-top-0 text-capitalize">amount owed</th>
                                                    <th class="border-top-0 text-capitalize"> amount payed</th>
                                                    <th class="border-top-0 text-capitalize"> Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql8 = "SELECT * FROM subscribers  ORDER BY id DESC ";

                                                $result8 = mysqli_query($conn, $sql8);
                                                if (mysqli_num_rows($result8) > 0) {
                                                    $column_num = 1;
                                                    while ($info8 = mysqli_fetch_array($result8)) {
                                                        $mid = $info8['id'];
                                                        $user = $info8['regid'];
                                                        $surname = $info8['surname'];
                                                        $firstname = $info8['firstname'];
                                                        $nationality = $info8['nationality'];
                                                        $emailaddress = $info8['emailaddress'];
                                                        $numofunits = $info8['numofunits'];
                                                        $amountpayable = $info8['amountpayable'];
                                                        $amountpayable2 = number_format($info8['amountpayable'], 2);
                                                        $mobileno = $info8['mobileno'];
                                                        $datereg = $info8['datereg'];

                                                        $sql9 = "SELECT * FROM payments WHERE  userid='". $info8['regid'] ."' ";
                                                        $result9 = mysqli_query($conn, $sql9);
                                                        $result9Fetch['amountpaid'] = 0;
                                                        if (mysqli_num_rows($result9) > 0) {
                                                            while ($result9Fetch = mysqli_fetch_assoc($result9)) {
                                                                $result9Fetch['amountpaid'] = $result9Fetch['amountpaid'] + $result9Fetch['amountpaid'];
                                                                $amountpayed = number_format($result9Fetch['amountpaid'], 2);
                                                            }
                                                        } else {
                                                            $amountowing = $info8['amountpayable'] - $result9Fetch['amountpaid'];
                                                            $amountpayed = number_format(0, 2);
                                                            $amountowing = number_format($amountowing, 2);
                                                        }



                                                    

                                                        echo "
                                        <tr>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='assets/images/small.png' width='70%'></a></div>
                                                    <div class=''>
                                                        <h4 class='m-b-0 font-16'>$surname $firstname</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$nationality</td>
                                            <td>$emailaddress</td>
                                            <td>$numofunits</td>
                                            <td><label class='label label-danger'>$amountpayable2</label></td>
                                            <td>$amountowing</td>
                                            <td>$amountpayed</td>
                                        
                                            <td>
                                                <a href='regdetailsdup.php?id=$user'target='_blank' class='btn btn-primary'>Registration Details</a>
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