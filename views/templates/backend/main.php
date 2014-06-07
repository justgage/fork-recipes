<h1>Backend </h1>

<?php if(isset($_GET['del'])): ?>
   <?php if($_GET['del'] == true): ?>
      <p class="background-danger">Recipe deleted sucsessfully</p>
   <?php else: ?>
      <p class="background-danger">Recipe failed to be deleted</p>
   <?php endif; ?>
<?php endif; ?>

<div class="pull-right"> logged in as <strong>"<?php echo $_user->username ?>"</strong>
<a href="/user/logout.php">Logout</a>
</div>
<h2>Recipies <a class="btn btn-default" href="/recipe/newForm.php">Add Recipe</a> </h2>
<?php
$num_recipes = count($_recipes);
if($num_recipes > 0) {
?>
   <p>number of recipes: <?php echo $num_recipes ?></p>
<?php include "$this->path/backend/recipeList.php";?>

<?php
}
else {  // no recipes
?>
<p>No recipes! :( <a class="btn btn-primary" href="/recipe/newForm.php">Create one</a></p>
<?php
}
?>




