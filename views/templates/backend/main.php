<?php include "$this->path/nav.php";?>
<h1>Your Backend </h1>
<div class="pull-right"> logged in as <strong>"<?php echo $_user->username ?>"</strong>
<a href="/user/logout.php">Logout</a>
</div>
<?php
$num_recipes = count($_recipes);
if($num_recipes > 0) {
?>
   <p>number of recipes: <?php echo $num_recipes ?></p>
<p><a class="btn btn-primary" href="/recipe/newForm.php">Add Recipe</a></p>
<?php include "$this->path/recipeList.php";?>

<?php
}
else {  // no recipes
?>
<p>No recipes! :( <a class="btn btn-primary" href="/recipe/newForm.php">Create one</a></p>
<?php
}
?>




