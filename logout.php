<?php
session_start();

// unset($_SESSION['useremail']);
session_destroy();
header("location: ./signin");

?>