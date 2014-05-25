<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";

$id = $_GET["id"];
$r = new Recipe();
$recipe = $r->getId($id);

$page = new Page("$root/views/templates");
$page->render("recipe.php", array( "recipe" => $recipe));
