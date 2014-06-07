<?php 
require_once("$root/models/Model.php");
class Recipe extends Model {

   // Get all recipes
   public function getAll() {
      $req = $this->db->query('
         SELECT 
            r.id,
            r.title,
            r.instructions,
            r.forkedFromId,
            u.username AS author_usename,
            u.id AS author_id 
         FROM recipe r 
         INNER JOIN user u on r.authorId=u.id
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
      return $req->fetch(PDO::FETCH_OBJ);
   }



   public function search($text) {
      $sql = "
         SELECT 
            r.id,
            r.title,
            r.instructions,
            r.forkedFromId
         FROM recipe r 
         INNER JOIN user u on r.authorId=u.id
         WHERE r.title LIKE '%:text%'
         ";

      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      $req->execute(array(":text" => $text));
      return $req->fetchAll(PDO::FETCH_CLASS);

   }

   public function __construct($connect = true) {
      parent::__construct($connect);
   }


   public function create($authorId, $title, $instructions, $forkedFromId = NULL) {
      $sql = 'INSERT INTO recipe 
         (`authorId`, `title`, `instructions`, `forkedFromId`) 
         VALUES (:authorId, :title, :instructions, :forkedFromId);';

      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

      try {
         $worked = $req->execute(array(
            ":authorId" => $authorId,
            ":title" => $title,
            ":instructions" => $instructions,
            ":forkedFromId" => $forkedFromId
         ));

         $id = $this->db->lastInsertId();

         return $id;
      } catch (PDOException $e) {
         return false;
      }
   }

   public function fork($authorId, $id) {
      $copy = $this->getId($id);

      return $this->create($authorId, $copy->title, $copy->instructions, $copy->id);
   }

   public function delete($id) {
      $sql = 'DELETE FROM recipe WHERE id = :id;';
      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

      try {
         $worked = $req->execute(array(
            ":id"           => $id,
         ));

      } catch (PDOException $e) {
         echo "$e";
         die();
         return false;
      }

      return $worked;
   }

   public function update($id, $title, $instructions) {
      $sql = 'UPDATE recipe SET
         `title` = :title,
         `instructions` = :instructions
         WHERE `id` = :id
         LIMIT 1';

      try {
      $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

         $worked = $req->execute(array(
            ":id"           => $id,
            ":title"        => $title,
            ":instructions" => $instructions,
         ));

         return $worked;
      } catch (PDOException $e) {
         return false;
      }
   }

}
