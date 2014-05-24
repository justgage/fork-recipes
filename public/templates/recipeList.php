<?php 
$recipes = $vars;
?>

<div class="content">
<?php include "templates/nav.php";?>
<h1>Recipes</h1>
      <?php foreach ($recipes as $recipe) { ?>
   <div class="recipeBox">
      <h2><a href="<?php echo "/recipe/$recipe->id" ?>"> <?php echo $recipe->title ?></a> </h2>
      <div> <?php echo $recipe->instructions ?> </div>
   </div>
      <?php } // end recipe list ?>
</div>
