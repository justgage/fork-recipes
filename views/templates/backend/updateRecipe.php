<?php include "$this->path/nav.php";?>

<form action="/recipe/update.php" method="POST">

<div>
<label for="title">Title:</label>
<input name="title" type="text" value="<?php echo $_recipe->title ?>">
</div>

<div>
   <label for="instructions">Instructions</label>
   <div>
      <textarea name="instructions" cols="30" rows="10"><?php echo $_recipe->instructions; ?></textarea>
   </div>
</div>
   <input type="hidden" name="id" value="<?php echo $_recipe->id ?>">
   <input type="submit" value="save">
</form>
