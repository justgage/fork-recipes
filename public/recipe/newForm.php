<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";
require "../authCheck.php";

$page = new Page("$root/views/templates");

$page->render("backend/createRecipe.php", array());


