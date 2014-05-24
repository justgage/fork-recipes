<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/path.php';
require_once "$root/vendor/autoload.php";

$app = new \Slim\Slim(array(
   'templates.path' => './templates'
));

$app->get('/', function () {
   echo "<h1>Welcome to Fork Recipes</h1>";
});

$app->get('/recipe', function () use ($root, $public) {
   require_once "$root/models/Recipe.php";
   require_once "$root/views/Page.php";
   $r = new Recipe();
   $page = new Page($public);

   $recipes = $r->getAll();

   $page->title = "Homepage";
   $page->addCSS("css/main");
   //$page->addJS("js/alert");
   echo $page->render("templates/recipeList.php", $recipes);
});

$app->get('/recipe/:id', function ($id) use ($root, $public) {
   require_once "$root/models/Recipe.php";
   require_once "$root/views/Page.php";

   $r = new Recipe();
   $page = new Page($public);
   $recipe = $r->getId($id);

});

$app->run();
