<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";

$u = new User();
$u->id = $_GET["id"];

$recipes = $u->getRecipes();
$user = $u->getObjectById($u->id);

$page = new Page("$root/views/templates");

$page->render("user.php", array(
   "recipes" => $recipes,
   "user" => $user
));

