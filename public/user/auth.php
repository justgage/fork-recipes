<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";

$newUser = new User;
$newUser->username = $_POST['username'];
$newUser->password = $_POST['password'];

$auth = $newUser->auth();

if($auth) {
   header("Location: /user/backend.php");
} else {
   header("Location: /user/login.php?err=1");
}

