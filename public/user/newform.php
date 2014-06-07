<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/views/Page.php";

$err_text = "";

if(isset($_GET['err'])) {
   if($_GET['err'] == 1) {
      $err_text = "ERROR: there was an error creating your account!";
   } else {
      $err_text = "Sorry Invalid email!";
   }
}

$page = new Page("$root/views/templates");

$page->render("newform.php", array(
   "err_text" => $err_text
   )
);



