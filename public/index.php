<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/path.php';
//require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";

$page = new Page($public);
$page->title = "Homepage";
$page->addCSS("css/main");
//$page->addJS("js/alert");
$page->render("templates/main.php");



