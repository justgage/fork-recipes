<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/models/Recipe.php";
require "../authCheck.php";

if ( !isset($_POST['title']) || !isset($_POST['instructions']) ) {
   header("Location: /recipe/newForm.php");
}

$recipe = new Recipe;

$title = $_POST['title'];
$instructions = $_POST['instructions'];

$worked = $recipe->create($user->id, $title, $instructions);

if($worked) {
   header("Location: /user/backend.php");
} else {
   header("Location: /recipe/newForm.php");
}





