<form role="form" action="/recipe/update.php" method="POST">

   <div class="form-group form-inline">
      <h1>
         Editing <input placeholder="Title of the Recipe" class="input-lg form-control" name="title" type="text" value="<?php echo $_recipe->title ?>">
      </h1>
   </div>

   <div class="form-group">
      <label for="instructions">Instructions</label>
      <div>
         <textarea class="form-control" name="instructions" cols="30" rows="10"><?php echo $_recipe->instructions; ?></textarea>
      </div>
   </div>
   <input type="hidden" name="id" value="<?php echo $_recipe->id ?>">
   <input class="btn btn-primary" type="submit" value="save">
</form>
