<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";


$user = new User;



if ( !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['email']) ) {
   header("Location: /user/newform.php");
}

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if ($email === false) {
   header("Location: /user/newform.php?err=2");
   die(1);
}



$user->username = $_POST['username'];
$user->password = $_POST['password'];
$user->email    = $_POST['email'];

$err = $user->create();

if($err) {
   header("Location: /user/newform.php?err=1");
} else {
   header("Location: /user/backend.php");
}

