<ul class="row list">
   <?php foreach ($_recipes as $recipe) { ?>
   <li class="recipeBox col-lg-6">
   <h3 class="title">
      <a href="<?php echo "/recipe/id.php?id=$recipe->id"?>">
         <?php echo $recipe->title ?>
      </a> 
      <small> by <a href="/user/id.php?id=<?php echo $recipe->author_id; ?>"> <?php echo $recipe->author_usename; ?> </a> </small>
   </h3>
   <div class="instructions"> <?php echo $recipe->instructions ?> </div>
   </li>
   <?php } // end recipe list ?>
</ul>
