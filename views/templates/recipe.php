<?php include "$this->path/nav.php";?>
<div class="page-header">
   <h1><?php echo $_recipe->title ?></h1>
</div>
<p>
   <?php echo $_recipe->instructions ?>
<div>
   <strong>Author: </strong>
   <a href="<?php echo "/user/id.php?id=$_recipe->author_id" ?>">
      <?php echo $_recipe->author_usename ?> 
   </a>
</div>
</p>
