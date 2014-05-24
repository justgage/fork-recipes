<?php $recipe = $vars;  ?>
<div class="content">
<?php include "nav.php";?>
<h1><?php echo $recipe->title ?></h1>
<p>
   <?php echo $recipe->instructions ?>
<div>
   <strong>Author: </strong>
   <?php echo $recipe->author_usename ?> 
</div>
</p>
</div>
