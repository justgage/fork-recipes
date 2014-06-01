<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/models/Recipe.php";
require "../authCheck.php";

if ( !isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['instructions']) ) {
   header("Location: /user/backend.php");
}

$recipe = new Recipe;

$id = $_POST['id'];
$title = $_POST['title'];
$instructions = $_POST['instructions'];

$worked = $recipe->update($id, $title, $instructions);

if($worked) {
   header("Location: /user/backend.php");
} else {
   header("Location: /recipe/updateForm.php?id=$id");
}

