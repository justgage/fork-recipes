<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/views/Page.php";
require_once "$root/models/Recipe.php";
require "../authCheck.php";

if(isset($_GET['id'])) {

   $id = $_GET['id'];

   $page = new Page("$root/views/templates");

   $recipe = new Recipe;

   $recipe = $recipe->getId($id);

   $page->render("backend/updateRecipe.php", array("recipe" => $recipe));
}


