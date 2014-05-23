<?php 

/*
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Recipe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/Page.php';

$r = new Recipe();
$page = new Page();

$recipes = $r->getAll();

$page->title = "Homepage";
$body = "<h1>$page->title</h1>";

foreach($recipes as $recipe) {
   $body .=  "<h2>" . $recipe->title . "</h2>";
   $body .= "<div>" . $recipe->instructions . "</div>";
}

$page->body = $body;

$page->addCSS("main");
$page->addJS("alert");

echo $page->bake();
*/

echo "hello";
