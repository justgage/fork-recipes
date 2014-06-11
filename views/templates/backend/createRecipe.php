<form role="form" action="/recipe/create.php" method="POST">
   <div class="row">
      <div class="form-group form-inline">
      <h1>
         Creating Recipe: <input placeholder="Title of the Recipe" class="input-lg form-control" name="title" type="text" value="<?php echo $_recipe->title ?>">
      </h1>
      </div>

      <div class="form-group">
         <label for="instructions">Instructions</label>
         <div>
            <textarea class="form-control" name="instructions" cols="30" rows="10"><?php echo $_recipe->instructions; ?></textarea>
         </div>
      </div>
      <input class="form-control" name="forkedFromId" type="hidden" value="<?php echo $_recipe->forkedFromId; ?>">
      <input type="submit" value="create" class="btn btn-primary">
   </div>
</form>
