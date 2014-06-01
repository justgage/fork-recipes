<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/models/User.php";
require_once "$root/models/Recipe.php";
require "../authCheck.php";

if ( !isset($_GET['id']) ) {
   header("Location: /user/backend.php");
}

$recipe = new Recipe;

$id = $_GET['id'];

$worked = $recipe->delete($id);

if($worked) {
   header("Location: /user/backend.php?del=1");
} else {
   header("Location: /user/backend.php?del=0");
}

