<?php 
class Page {
   public $title;
   public $body;
   protected $css;
   protected $js;

   public function __construct() {
      $this->css = [];
      $this->js = [];
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
   private function bakeCSS() {
      $html = "";
      foreach($this->css as $css) {
         $html .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/$css.css\">";
      }
      return $html;
   }

   // make the HTML for the js includes
   private function bakeJS() {
      $html = "";
      foreach($this->js as $js) {
         $html .= "<script type=\"text/javascript\" src=\"/js/$js.js\"></script>";
      }
      return $html;
   }


   public function bake() {
      $html = "<!DOCTYPE html>";
      $html .= "<html>";
      $html .= "<head>";
      $html .= "<title>$this->title</title>";
      $html .= $this->bakeCSS();
      $html .= "</head>";
      $html .= "<body>";
      $html .= $this->body;
      $html .= $this->bakeJS();
      $html .= "</body>";
      $html .= "</html>";
      return $html;
   }

}
