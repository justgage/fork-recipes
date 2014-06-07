
<form action="/recipe/create.php" method="POST">

<div>
<label for="title">Title:</label>
<input name="forkedFromId" type="hidden" value="<?php echo $_recipe->forkedFromId; ?>">
<input name="title" type="text" value="<?php echo $_recipe->title ?>">
</div>

<div>
   <label for="instructions">Instructions</label>
   <div>
      <textarea name="instructions" cols="30" rows="10"><?php echo $_recipe->instructions; ?></textarea>
   </div>
</div>
   <input type="submit" value="create">
</form>
