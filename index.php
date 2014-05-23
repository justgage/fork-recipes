<?php 

include 'helpers/Model.php';

$r = new Recipe();

$recipes = $r->getAll();

foreach($recipes as $recipe) {

   echo "<h2>" . $recipe["title"] . "</h2>";
   echo "<div>" . $recipe["instructions"] . "</div>";
}
