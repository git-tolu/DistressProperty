<?php
include('aunthenticate.php');

if (isset($_POST['activeBtn'])) {
    $activeBtn = $_POST['activeBtn'];

    $sql = "UPDATE real_users SET accountstatus='Activated' WHERE user_id='$activeBtn'";
    $result = mysqli_query($conn, $sql);

    
    if ($result) {
        echo 'success';
    } else {
        echo 'failed';
    }

    
}

if (isset($_POST['activeBtnPost'])) {
    $activeBtnPost = $_POST['activeBtnPost'];

    $sql = "UPDATE properties SET status='Approved' WHERE id='$activeBtnPost'";
    $result = mysqli_query($conn, $sql);

    
    if ($result) {
        echo 'success';
    } else {
        echo 'failed';
    }

    
}

if (isset($_POST['deactiveBtnPost'])) {
    $deactiveBtnPost = $_POST['deactiveBtnPost'];

    $sql = "UPDATE properties SET status='Disapproved' WHERE id='$deactiveBtnPost'";
    $result = mysqli_query($conn, $sql);

    
    if ($result) {
        echo 'success';
    } else {
        echo 'failed';
    }

    
}