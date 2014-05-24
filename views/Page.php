<?php 

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
         $html .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/$css.css\">";
      }
      return $html;
   }

   // make the HTML for the js includes
   private function renderJS() {
      $html = "";
      foreach($this->js as $js) {
         $html .= "<script type=\"text/javascript\" src=\"/$js.js\"></script>";
      }
      return $html;
   }

   public function render($template, $vars = null) {
      // note this auto adds a underscore to the begining
      if (is_null($vars) == false) {
         extract($vars, EXTR_PREFIX_ALL, ""); 
      }
?>
<!DOCTYPE html>
<html>
   <head>
   <title> <?php echo $this->title ?> </title>
   <?php echo $this->renderCSS(); ?>
   </head>
<body>
   <?php include $_SERVER['DOCUMENT_ROOT'] . "/$template"; ?>
   <?php echo $this->renderJS(); ?>
</body>
</html>
<?php   } 


}
