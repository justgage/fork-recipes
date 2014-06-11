<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";

$recipe = new Recipe();
$recipes = $recipe->getAll();

$page = new Page("$root/views/templates");
$page->title = "Homepage";
$page->addJS('bower_components/list.js/dist/list');
$page->addJS('bower_components/fork/js/search');
$page->render("recipeIndex.php", array("recipes" => $recipes));
