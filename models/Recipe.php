<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");
class Recipe extends Model {

   // Get all recipes
   public function getAll() {
      $req = $this->db->query("SELECT id, title, instructions, authorId, forkedFromId FROM recipe");
      return $req->fetchAll(PDO::FETCH_CLASS);
   }

   public function __construct($connect = true) {
      parent::__construct($connect);
   }

}
