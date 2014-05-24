<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";

$r = new Recipe();
$page = new Page($public);

$recipes = $r->getAll();

$page->title = "Homepage";
$page->addCSS("css/main");
//$page->addJS("js/alert");
echo $page->render("templates/recipeList.php", $recipes);
