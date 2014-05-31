<?php include "$this->path/nav.php";?>

<form action="/recipe/create.php" method="POST">

<div>
<label for="title">Title:</label>
<input name="title" type="text">
</div>

<div>
   <label for="instructions">Instructions</label>
   <div>
      <textarea name="instructions" cols="30" rows="10"></textarea>
   </div>
</div>
   <input type="submit" value="create">
</form>
