<?php 

if( (include '_tab.php') == 'OK') { 
   $tab = "Home";
}

$tabs = [
   "Home" => "/",
   "Recipes" => "/recipe",
   "Backend" => "/user/backend.php",
];
?>

<ul class="nav nav-tabs">
<?php
foreach ($tabs as $name => $href) {
   if ($name === $tab) {
      echo "<li class='active'><a href='$href'>$name</a></li>";
   } else {
      echo "<li class=''><a href='$href'>$name</a></li>";
   }
}
?>
</ul>
