<?php 

require_once "$root/vendor/autoload.php";

class Page {
   public $title;
   public $body;
   protected $css;
   protected $js;
   protected $path;

   public function __construct($path) {
      $this->css = [];
      $this->js = [];
      $this->path = $path;
   }

   public function addCSS() {
      $filenames = func_get_args();

      foreach($filenames as $filename) {
         $this->css[] = $filename;
      }
   }

   public function addJS() {
      $filenames = func_get_args();

      foreach($filenames as $filename) {
         $this->js[] = $filename;
      }
   }

   // make the HTML for the css includes
   private function renderCSS() {
      $html = "";
      foreach($this->css as $css) {
         $html .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$this->path/$css.css\">";
      }
      return $html;
   }

   // make the HTML for the js includes
   private function renderJS() {
      $html = "";
      foreach($this->js as $js) {
         $html .= "<script type=\"text/javascript\" src=\"$this->path/$js.js\"></script>";
      }
      return $html;
   }

   public function render($template, $vars) {
?>
<!DOCTYPE html>
<html>
   <head>
   <title> <?php echo $this->title ?> </title>
   <?php echo $this->renderCSS(); ?>
   </head>
<body>
   <?php include "$template"; ?>
   <?php echo $this->renderJS(); ?>
</body>
</html>
<?php   } 


}
