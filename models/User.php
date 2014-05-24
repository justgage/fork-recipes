<?php 
require_once("$root/models/Model.php");
class User extends Model {

   // Get all recipes
   public function getAllUsers() {
      $req = $this->db->query('
         SELECT id, username
         FROM user
         ');
      return $req->fetchAll(PDO::FETCH_CLASS);
   }

   public function getUser($id) {
      $sql = '
         SELECT id, username
         FROM user
         WHERE id=:id
         ';

      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $req->execute(array(":id" => $id));
      return $req->fetch(PDO::FETCH_OBJ); // <- return only one!
   }

   public function getUserRecipes($id) {

      $sql = '
         SELECT 
            id,
            title,
            instructions
         FROM recipe
         WHERE authorId = :id
         ';

      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

      $req->execute(array(":id" => $id));

      return $req->fetchAll(PDO::FETCH_CLASS); // <- return only one!
   }

   public function __construct($connect = true) {
      parent::__construct($connect);
   }

}
