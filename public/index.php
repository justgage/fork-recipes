<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/path.php';
//require_once "$root/models/Recipe.php";
require_once "$root/views/Page.php";

$page = new Page("$root/views/templates");
$page->title = "Homepage";
$page->addCSS("bower_components/fork/css/main");
//$page->addJS("js/alert");
$page->render("main.php");



