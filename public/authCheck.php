<?php

// later on the server?
// if($_SERVER["HTTPS"] != "on")
// {
//    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
//    exit();
// }

$user = new User;

$auth = $user->getAuth();

if($auth == false) {
   header("Location: /user/login.php");
   die();
}
