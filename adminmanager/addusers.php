<?php
include('includes/aunthenticate.php');
$page = "Add Users";
$home = "Distress Property Market ";
$apptitle = "Distress Property Market : Admin ";
$todaydate = date("jS F, Y");
$display = 'display-none';
$errorMessage = ' ';

$alertColor = ' ';
if (isset($_GET['del'])) {
    # code...
    $id = $_GET['del'];
    $sql = "DELETE FROM `adminusers` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        $display = ' ';
        $alertColor = 'success';
        $errorMessage = 'Deleted successfully';
        // header("location: pendingpost?status=Approved");

    }

}

if (isset($_POST['AddUserBtn'])) {
    $fullname = $_POST['fullname'];
    $emailadd = $_POST['emailadd'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $role = $_POST['role'];
    $cname = 'cname'.rand(1000, 90000);
    $sql = "INSERT INTO `adminusers`(`cname`, `fullname`, `username`, `password`, `role`, `emailadd`, `status`, `phone`) VALUES ('$cname','$fullname','$username','$hash','$role','$emailadd','active','$phone')";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        $display = ' ';
        $alertColor = 'success';
        $errorMessage = 'Added successfully';
        // header("location: pendingpost?status=Approved");

    }

}

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
                                <div class="card-header d-flex justify-content-between">

                                    <h4 class="card-title">Add Users</h4>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                        data-target="#modalId">
                                        Add user
                                    </button>


                                </div>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="">
                                    <div class="alert alert-<?= $alertColor; ?>  " <?= $display; ?> role="alert">
                                                <?= $errorMessage ?>
                                            </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table v-middle">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="border-top-0 text-capitalize">full name</th>
                                                    <th class="border-top-0 text-capitalize">user_email</th>
                                                    <th class="border-top-0 text-capitalize">user_role</th>
                                                    <th class="border-top-0 text-capitalize">userphone</th>
                                                    <th class="border-top-0 text-capitalize"> Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql8 = "SELECT * FROM adminusers WHERE role != 'Super Admin'   ORDER BY id DESC";


                                                $result8 = mysqli_query($conn, $sql8);
                                                if (mysqli_num_rows($result8) > 0) {
                                                    $column_num = 1;
                                                    while ($info8 = mysqli_fetch_array($result8)) {
                                                        $user = $info8['id'];

                                                        $mid = $info8['id'];
                                                        $fullname = $info8['fullname'];
                                                        $agent_id = $info8['username'];
                                                        $user_email = $info8['emailadd'];
                                                        $user_role = $info8['role'];
                                                        $userphone = $info8['phone'];



                                                        echo "
                                        <tr>
                                            <td>
                                                <div class='d-flex align-items-center'>
                                                    <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='../assets/images/footer-logo.png' width='70%'></a></div>
                                                    <div class=''>
                                                        <h4 class='m-b-0 font-16'>$fullname</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$user_email</td>
                                            <td>$user_role</td>
                                            <td>$userphone</td>
                                            <td class='btn-group'>
                                            <a  class='btn btn-primary'  href='addusers?del=" . $mid . "'>delete</a>
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
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="">
                    <div class="modal-body">
                        <div class="row " >
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01" class="form-label">fullname</label>
                                <input type="text" class="form-control" id="validationCustom01" name="fullname"
                                    placeholder="Mark.." required>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="validationCustomUsername" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" class="form-control" id="validationCustomUsername"
                                        name="emailadd" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustomUsername" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="validationCustomUsername"
                                        name="username" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="validationCustom03" required
                                    placeholder="0902948942..">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom04" class="form-label">Role</label>
                                <select class="form-control" id="validationCustom04" name="role"  required>
                                    <option selected disabled value="">Choose...</option>
                                    <option class="Administrator">Administrator</option>
                                    <option class="Manager">Manager</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom03" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="validationCustom03" required
                                    placeholder="****..">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="AddUserBtn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
        $('body').on('click', '.activeBtn', function (e) {
            e.preventDefault();
            activeBtn = $(this).attr('id');
            // console.log(activeBtn);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: { activeBtn: activeBtn },
                success: function (response) {
                    console.log(response)
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
        $('body').on('click', '.deactiveBtn', function (e) {
            e.preventDefault();
            deactiveBtnMem = $(this).attr('id');
            // console.log(deactiveBtnMem);
            $.ajax({
                type: "POST",
                url: "includes/action.php",
                data: {
                    deactiveBtnMem: deactiveBtnMem
                },
                success: function (response) {
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