<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/models/Recipe.php";
require "../authCheck.php";

if (!isset($_GET['id'])) {
   header("Location: /");
}


$toForkid = $_GET['id'];

$recipe = new Recipe;
$id = $recipe->fork($user->id, $toForkid);

if($id != false) {
   header("Location: /recipe/updateForm.php?id=$id");
} else {
   header("Location: /user/backend.php");
}

