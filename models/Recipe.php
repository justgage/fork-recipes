<?php 
require_once("$root/models/Model.php");
class Recipe extends Model {

   // Get all recipes
   public function getAll() {
      $req = $this->db->query('
         SELECT id, title, instructions, authorId, forkedFromId 
         FROM recipe
         ');
      return $req->fetchAll(PDO::FETCH_CLASS);
   }

   public function getId($id) {

      $sql = '
         SELECT 
            r.id,
            r.title,
            r.instructions,
            r.forkedFromId,
            u.username AS author_usename,
            u.id AS author_id 
         FROM recipe r 
         INNER JOIN user u on r.authorId=u.id
         WHERE r.id = :id
         ';

      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $req->execute(array(":id" => $id));
      return $req->fetchAll(PDO::FETCH_CLASS)[0]; // <- return only one!
   }

   public function __construct($connect = true) {
      parent::__construct($connect);
   }

}
