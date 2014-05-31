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

   // create user
   public function createUser($username, $pass, $email) {

      if($username === NULL || $pass=== NULL ||  $email === NULL) {
         return true; // yes error
      }


      $sql = '
         INSERT INTO user (username, password, email, salt)
         VALUES (:username, :pass, :email, :salt)
         ';

      $length = 10;

      $salt = substr(str_shuffle("0123456789abcdefghipqrstuvwxyz" .
         "ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()"), 0, $length);

      $passHash = hash("md2" , $salt . $pass);

      echo $pass . " password <br />";
      echo $salt . " salt<br />";
      echo $passHash . " password hash. len->" . strlen($passHash)."<br />";

      try {
         $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
      } catch (PDOException $e) {
         return true;
      }

      $req->execute(array(
         ":username"  => $username,
         ":pass"  => $passHash,
         ":email" => $email,
         ":salt"  => $salt
      ));

      return false;
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
