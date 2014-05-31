<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$newUser = new User;

$err = $newUser->createUser($username, $password, $email);

if($err > 0) {
   header("Location: /user/newform.php?err=1");
} else {
   header("Location: /user/backend.php");
}

