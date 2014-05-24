<div class="content">
<?php include "nav.php";?>
<h1>Recipes</h1>
      <?php foreach ($_recipes as $recipe) { ?>
   <div class="recipeBox">
      <h2><a href="<?php echo "/recipe/id.php?id=$recipe->id"?>"> <?php echo $recipe->title ?></a> </h2>
      <div> <?php echo $recipe->instructions ?> </div>
   </div>
      <?php } // end recipe list ?>
</div>
