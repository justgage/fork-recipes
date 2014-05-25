<div class="content">
<?php include "nav.php";?>
<h1><?php echo $_recipe->title ?></h1>
<p>
   <?php echo $_recipe->instructions ?>
<div>
   <strong>Author: </strong>
   <a href="<?php echo "/user/id.php?id=$_recipe->author_id" ?>">
      <?php echo $_recipe->author_usename ?> 
   </a>
</div>
</p>
</div>
