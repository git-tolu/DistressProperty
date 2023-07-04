<?php
include('includes/aunthenticate.php');
$page = "Properties";
$home = "Distress Property Market ";
$apptitle = "Distress Property Market : Admin ";
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
                                <h4 class="card-title">Properties</h4>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="">
                                    <div id="errorshow">
                                        <div class="alert " id="error" role="alert">
                                            A simple primary alert—check it out!
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0 text-capitalize">property title</th>
                                                    <th class="border-top-0 text-capitalize">property category</th>
                                                    <th class="border-top-0 text-capitalize">Property Price</th>
                                                    <th class="border-top-0 text-capitalize">area/Locality</th>
                                                    <th class="border-top-0 text-capitalize">Country</th>
                                                    <th class="border-top-0 text-capitalize">bedrooms</th>
                                                    <th class="border-top-0 text-capitalize">bathrooms</th>
                                                    <th class="border-top-0 text-capitalize">toilets</th>
                                                    <th class="border-top-0 text-capitalize">Property Size(Sqrt)</th>
                                                    <th class="border-top-0 text-capitalize">Parking Space</th>
                                                    <th class="border-top-0 text-capitalize">Land Size(sqrt)</th>
                                                    <th class="border-top-0 text-capitalize">land category</th>
                                                    <th class="border-top-0 text-capitalize"> Cover Title</th>
                                                    <th class="border-top-0 text-capitalize"> property type</th>
                                                    <th class="border-top-0 text-capitalize">Youtube Link</th>
                                                    <th class="border-top-0 text-capitalize"> city</th>
                                                    <th class="border-top-0 text-capitalize"> state</th>
                                                    <th class="border-top-0 text-capitalize"> longtitude</th>
                                                    <th class="border-top-0 text-capitalize"> langtitude</th>
                                                    <th class="border-top-0 text-capitalize"> market status</th>
                                                    <th class="border-top-0 text-capitalize"> detailedinfo</th>
                                                    <th class="border-top-0 text-capitalize"> account status</th>
                                                    <th class="border-top-0 text-capitalize"> Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql8 = "SELECT * FROM properties ORDER BY id DESC LIMIT 10";
                                                $btn = '';
                                                $result8 = mysqli_query($conn, $sql8);
                                                if (mysqli_num_rows($result8) > 0) {
                                                    $column_num = 1;
                                                    while ($info8 = mysqli_fetch_array($result8)) {
                                                        $user = $info8['user_id'];

                                                        $mid = $info8['id'];
                                                        $propertytitle = $info8['propertytitle'];
                                                        // $propertytype = $info8['propertytype'];
                                                        $propertyprice = $info8['propertyprice'];
                                                        $area_location = $info8['area_location'];
                                                        $bedrooms = $info8['bedrooms'];
                                                        $bathrooms = $info8['bathroom'];
                                                        $address = $info8['address'];
                                                        $city = $info8['city'];
                                                        $state = $info8['state'];
                                                        // $postalcode = $info8['postalcode'];
                                                        $longtitude = $info8['longtitude'];
                                                        $langtitude = $info8['langtitude'];
                                                        $detailedinfo = substr($info8['detailedinfo'], 500);
                                                        // $propertyage = $info8['propertyage'];
                                                        // $propertyfeatures = $info8['propertyfeatures'];
                                                        // $agent_name = $info8['agent_name'];
                                                        // $agent_email = $info8['agent_email'];
                                                        $featuredimage = $info8['featuredimage'];
                                                        $accountstatus = $info8['status'];
                                                        if ($accountstatus == 'pending' || $accountstatus == 'Disapproved') {
                                                            $class = 'label-danger';
                                                            $btn = "<button id='$mid' class='btn btn-primary activeBtn'>Active</button>";
                                                        } else {
                                                            $class = 'label-success';
                                                            $btn = "
                                                            <button id='$mid' class='btn btn-primary deactiveBtn'>Deactive</button>";
                                                        }

                                                        // $phone = $info8['phone'];
                                                        // $rcno = $info8['rcno'];
                                                        // $orgfunctions = $info8['orgfunctions'];
                                                        // $memberstatus = $info8['status'];
                                                        // $approvaladmin = $info8['approvaladmin'];
                                                        // $completeregpay = $info8['completeregpay'];

                                                        // if ($approvaladmin == "Approved") {
                                                        //     $approval = "";
                                                        //     $approvalemail = "<a class='dropdown-item' href='resendapproval.php?id=$mid''>Resend Approval Email </a>";

                                                        // } else {
                                                        //     $approval = "<a class='dropdown-item' href='approvemembers.php?id=$mid&newstatus=Approved'>Approve Application </a>";
                                                        //     $approvalemail = "";
                                                        // }

                                                        // if ($approvaladmin == "Declined") {
                                                        //     $decline = "";
                                                        // } else {
                                                        //     $decline = "<a class='dropdown-item' href='approvemembers.php?id=$mid&newstatus=Declined'>Decline Application</a>";
                                                        // }


                                                        echo "
                                        <tr>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='assets/images/small.png' width='70%'></a></div>
                                                    <div class=''>
                                                        <h4 class='m-b-0 font-16'>$propertytitle</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>". $info8['propertyCategory']."</td>
                                            <td>". $info8['symbol'] ."$propertyprice</td>
                                            <td>". $info8['address']."</td>
                                            <td>". $info8['area_location']."</td>
                                            <td>$bedrooms</td>
                                            <td>$bathrooms</td>
                                            <td>". $info8['toilets']."</td>
                                            <td>". $info8['propsize']."</td>
                                            <td>". $info8['parkingspace']."</td>
                                            <td>". $info8['landcategory']."</td>
                                            <td>". $info8['landsize']."</td>
                                            <td>". $info8['titleproperty']."</td>
                                            <td>". $info8['typeproperty']."</td>
                                            <td>". $info8['youtubelink']."</td>
                                            <td>
                                            $city
                                            </td>
                                            <td>$state</td>
                                            <td>". $info8['longtitude']."</td>
                                            <td>". $info8['langtitude']."</td>
                                            <td>". $info8['marketstatus']."</td>
                                            <td>". substr($detailedinfo, 0, 200)."</td>
                                            <td><label class='label $class'>$accountstatus</label></td>
                                            <td>
                                            $btn
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
            <!-- <div id="errorshow" >
                <div id="error" class="alert"></div>
            </div> -->
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
    <script>
        $('#errorshow').hide()
        $('body').on('click', '.activeBtn', function(e) {
            e.preventDefault();
            activeBtnPost = $(this).attr('id');
            // console.log(activeBtnPost);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: {
                    activeBtnPost: activeBtnPost
                },
                success: function(response) {
                    // console.log(response)
                    if (response == 'success') {
                        $('#errorshow').show()
                        $('#error').html('Activated Succesfully');
                        $('#error').addClass('alert-success');
                    } else {
                        $('#errorshow').show()
                        $('#error').html('Something Went wrong try again later');
                        $('#error').addClass('alert-danger');
                    }

                }
            });
        });

        $('body').on('click', '.deactiveBtn', function(e) {
            e.preventDefault();
            deactiveBtnPost = $(this).attr('id');
            // console.log(deactiveBtnPost);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: {
                    deactiveBtnPost: deactiveBtnPost
                },
                success: function(response) {
                    // console.log(response)
                    if (response == 'success') {
                        $('#errorshow').show()
                        $('#error').html('Deactivated Succesfully');
                        $('#error').addClass('alert-success');
                    } else {
                        $('#errorshow').show()
                        $('#error').html('Something Went wrong try again later');
                        $('#error').addClass('alert-danger');
                    }

                }
            });
        });
    </script>


</body>

</html>