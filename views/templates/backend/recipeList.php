<?php foreach ($_recipes as $recipe) { ?>
   <div class="recipeBox">
      <h2><a href="<?php echo "/recipe/id.php?id=$recipe->id"?>"> <?php echo $recipe->title ?></a> </h2>
      <div> <?php echo $recipe->instructions ?> 

      <a class="btn btn-defualt" href="/recipe/updateForm.php?id=<?php echo $recipe->id?>">Edit</a>
      <a class="btn btn-defualt" href="/recipe/delete.php?id=<?php echo $recipe->id?>">Delete</a>
 </div>
   </div>
<?php } // end recipe list ?>