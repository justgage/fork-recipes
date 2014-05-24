<?php 

class Page implements \Slim\View {
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


   public function render() {
      $html = "<!DOCTYPE html>";
      $html .= "<html>";
      $html .= "<head>";
      $html .= "<title>$this->title</title>";
      $html .= $this->renderCSS();
      $html .= "</head>";
      $html .= "<body>";
      $html .= $this->body;
      $html .= $this->renderJS();
      $html .= "</body>";
      $html .= "</html>";
      return $html;
   }

}
