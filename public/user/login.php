<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";

$user = new User;

$auth = $user->getAuth();

$page = new Page("$root/views/templates");

$page->render("backend/login.php", array("auth" => $auth));

