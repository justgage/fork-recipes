<?php
$user = new User;

$auth = $user->getAuth();

if($auth == false) {
   header("Location: /user/login.php");
   die();
}
