<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/path.php';
require "$root/vendor/autoload.php";

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
   $body = "";
   $body .= "<div class='ui'>";
   $body .= "<h1>$page->title</h1>";

   foreach($recipes as $recipe) {
      $body .=  "<h2>" . $recipe->title . "</h2>";
      $body .= "<div>" . $recipe->instructions . "</div>";
   }

   $body .= '<div class="red">red</div>';

   $body .= "</div>";

   $page->body = $body;
   $page->addCSS("css/main");
   //$page->addJS("js/alert");

   echo $page->bake();
});

$app->run();


