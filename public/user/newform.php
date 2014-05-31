<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once "$root/views/Page.php";

$err_text = "";

if(isset($_GET['err'])) {
   $err_text = "ERROR: there was an error creating your account!";
}

$page = new Page("$root/views/templates");

$page->render("newform.php", array(
   "err_text" => $err_text
   )
);



