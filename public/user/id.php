<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";

$id = $_GET["id"];
$u = new User();

$recipes = $u->getUserRecipes($id);
$user = $u->getUser($id);

$page = new Page("$root/views/templates");

$page->render("user.php", array(
   "recipes" => $recipes,
   "user" => $user
));

