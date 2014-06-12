<h1>Backend </h1>

<?php if(isset($_GET['del'])): ?>
   <?php if($_GET['del'] == true): ?>
      <p class="background-danger">Recipe deleted sucsessfully</p>
   <?php else: ?>
      <p class="background-danger">Recipe failed to be deleted</p>
   <?php endif; ?>
<?php endif; ?>

<a class="btn btn-warning pull-right" href="/user/logout.php">Logout <i class="glyphicon glyphicon-log-out"></i></a>
   <h2>Recipies  </h2>
<?php
$num_recipes = count($_recipes);
if($num_recipes > 0) {
?>
   <p>number of recipes: <?php echo $num_recipes ?></p>
<a class="btn btn-primary" href="/recipe/newForm.php"><i class="glyphicon glyphicon-plus"></i> New Recipe</a>
<?php include "$this->path/backend/recipeList.php";?>

<?php
}
else {  // no recipes
?>
<p>No recipes! :( <a class="btn btn-primary" href="/recipe/newForm.php">Create one</a></p>
<?php
}
?>




