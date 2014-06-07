<div class="row">
<?php foreach ($_recipes as $recipe) { ?>
   <div class="recipeBox">
      <h3>
         <a href="<?php echo "/recipe/id.php?id=$recipe->id"?>">
         <?php echo $recipe->title ?>
         </a> 
         <small> by <a href="/user/id.php?id=<?php echo $recipe->author_id; ?>"> <?php echo $recipe->author_usename; ?> </a> </small>
</h3>
      <div> <?php echo $recipe->instructions ?> </div>
   </div>
<?php } // end recipe list ?>
</div>
