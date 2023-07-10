<?php
include('includes/aunthenticate.php');
$page = "Agents";
$home = "Distress Property Market ";
$apptitle = "Distress Property Market : Admin ";
$todaydate = date("jS F, Y");
if (isset($_GET['viewagent'])) {
    $viewagent = $_GET['viewagent'];
    $sql8 = "SELECT * FROM real_users WHERE username='$viewagent'  ORDER BY id DESC";
} else {

    echo "<script>window.location.href = 'dashboard'</script>";
}

$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
    $column_num = 1;
    while ($info8 = mysqli_fetch_array($result8)) {
        $user = $info8['user_id'];

        $mid = $info8['user_id'];
        $fullname = $info8['fullname'];
        $agent_id = $info8['username'];
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

        $accountstatus = $info8['accountstatus'];
        if ($accountstatus == 'pending' || $accountstatus == 'Disapproved') {
            $class = 'label-danger';
            $btn = "<button id='$mid' class='btn btn-primary activeBtn'>Approve</button>";
        } else {
            $class = 'label-success';
            $btn = "
                        <button id='$mid' class='btn btn-primary deactiveBtn'>Disapprove</button>";
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
                                <h4 class="m-b-0 text-white text-uppercase">
                                    <center><?=  $fullname ?></center>
                                </h4>
                            </div>

                            <div class="card-body">

                                <div class="col-md-12 col-sm-12 ">

                                    <ul class="list-group">
                                        <?php if (empty($info8['profilepic'])): ?>
                                            <img src="../assets/images/clients/clients-2.png"
                                                class="card-img-top  p-25 responsive img-fluid" alt="Profile Picture"
                                                style="border-style: dotted;" width="350">
                                        <?php else: ?>
                                            <img src="../' . $info8['profilepic'] . '"
                                                class="card-img-top p-15 responsive  img-fluid" alt="Profile Picture"
                                                style="border-style: dotted;" width="350">
                                        <?php endif; ?>

                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                    <!-- Column -->

                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">

                            <!-- <div class="card-header bg-warning">
                                <h4 class="m-b-0 text-white">
                                    <center> PERSON INFO </center>
                                </h4>
                            </div> -->

                            <div class="card-body">

                                <div class="col-md-12 col-sm-12 ">

                                    <ul class="list-group">
                                        <li class='my-2 list-group-item bg-warning'> <h4 class="text-white"> <?=  $usertitle ?><br><small>[User Title]</small></h4> </li>
                                        <li class='my-2 list-group-item bg-light'> <h4 class="text-dark"> <?=  $aboutuser ?><br><small>[User Details]</small></h4> </li>
                                        <li class='my-2 list-group-item bg-warning'> <h4 class="text-white"> <?=  $user_role ?><br><small>[Agent Role]</small></h4> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                    <!-- Column -->

                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- <div class="card-header bg-warning">
                            <h4 class="m-b-0 text-white">
                                <center> PERSON INFO </center>
                            </h4>
                        </div> -->
                        <div class="card">
                            <div class="card-body">

                                <div class="col-md-12 col-sm-12 ">

                                    <ul class="list-group">
                                    <li class='my-2 list-group-item bg-warning'> <h4 class="text-white"> <?=  $user_email ?><br><small>[Email]</small></h4> </li>
                                        <li class='my-2 list-group-item bg-light'> <h4 class="text-dark"> <?=  $userphone ?><br><small>[Phoneno]</small></h4> </li>
                                        <li class='my-2 list-group-item bg-warning'> <h4 class="text-white"> <?=  $datereg ?><br><small>[Date Registered]</small></h4> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
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