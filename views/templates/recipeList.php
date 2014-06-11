<ul class="row list">
   <?php foreach ($_recipes as $i => $recipe) { ?>
   <li class="recipeBox col-lg-12">
   <h3 class="title">
      <a href="<?php echo "/recipe/id.php?id=$recipe->id"?>">
         <?php echo $recipe->title ?>
      </a> 
      <small> by <a href="/user/id.php?id=<?php echo $recipe->author_id; ?>"> <?php echo $recipe->author_usename; ?> </a> </small>
   </h3>
   <div class="instructions"> <?php echo $recipe->instructions ?> </div>
   </li>
<?php 
?>

   <?php } // end recipe list ?>
</ul>
