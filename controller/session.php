<?php
session_start();

require('dbc.php');

$dbusers = new Dbc;

$user_role = '';
if (!isset($_SESSION['useremail'])) {
  header('location: signin');
  die();
}

$user_email = $_SESSION['useremail'];
$UsersData = $dbusers->currentUser($user_email);
foreach ($UsersData as $values) {
  $id = $values['id'];
  $user_role = $values['user_role'];
  $fullname = $values['fullname'];
  $user_id = $values['user_id'];
  $_SESSION['agent_id'] = $values['username'];
  $username = $values['username'];
  $usertitle = $values['usertitle'];
  $userphone = $values['userphone'];
  $aboutuser = $values['aboutuser'];
  $profilepic = $values['profilepic'];
  $user_password = $values['user_password'];
  // $hashpass = $values['hashpass'];
}