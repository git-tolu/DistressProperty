<?php 
session_start();
session_destroy();

unset($_SESSION['cname']) ;
unset($_SESSION['userrole'] ) ;
unset($_SESSION['userfullname'] ) ;
unset($_SESSION['useremail'])  ;
unset($_SESSION['username'] ) ;
unset($_SESSION['passport'] ) ;
unset($_SESSION['adminstatus'])  ;


header("location:index.php");
?>