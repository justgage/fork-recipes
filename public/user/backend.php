<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";
require "../authCheck.php";

$page = new Page("$root/views/templates");

$recipes = $user->getRecipes();

$page->render("backend/main.php", array(
   "recipes" => $recipes,
   "user" => $user,
   "tab" => $tab
));


