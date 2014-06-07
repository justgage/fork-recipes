<div class="page-header">
<a class="pull-right btn btn-primary" href="/recipe/newForm.php?id=<?php echo $_recipe->id ?>">
Fork
<i class="glyphicon glyphicon-share-alt"></i>
</a>
   <h1><?php echo $_recipe->title ?></h1>
</div>
<div>
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
