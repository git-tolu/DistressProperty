<?php
date_default_timezone_set('Africa/Lagos'); session_start();
error_reporting(E_ALL & ~E_NOTICE);
/* server timezone */
define('CONST_SERVER_TIMEZONE', 'UTC');	
if (!isset($_SESSION['username']) && !isset($_SESSION['userfullname'])){
header("Location: index");
}else{
$cname = $_SESSION['cname'] ;
$role = $_SESSION['userrole'] ;
$fullname = $_SESSION['userfullname'] ;
$adminemailadd = $_SESSION['useremailadmin'] ;
$user = $_SESSION['username'] ;
$passport = $_SESSION['passport']  ;
$adminstatus = $_SESSION['adminstatus'] ;
include('opendb.php');

}
?>