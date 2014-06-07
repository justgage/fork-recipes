<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";
require "../authCheck.php";

$recipe = null;

if(isset($_GET['id'])) {
   $id = $_GET['id'];
   $recipe = new Recipe;
   $recipe = $recipe->getId($id);
}


$page = new Page("$root/views/templates");

$page->render("backend/createRecipe.php", array("recipe" => $recipe));


