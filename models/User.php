<?php 

require_once("$root/models/Model.php");

class User extends Model {

   public $id;
   public $username;
   public $password;
   public $salt;

   // Get all recipes
   public static function getAllUsers() {
      $req = $this->db->query('
         SELECT id, username
         FROM user
         ');
      return $req->fetchAll(PDO::FETCH_CLASS);
   }

   // NOTE: requires USERNAME
   public function getSalt() {
      $sql = '
         SELECT salt
         FROM user
         WHERE username=:username';

      try {
         $req =  $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $req->execute(array(
            ":username" => $this->username
         ));

         $temp = $req->fetch(PDO::FETCH_OBJ);


         $this->salt = $temp->salt;

         return true;
      } catch (PDOException $e) {
         return false;
      }
   }

   public function auth() {
      session_start();

      if (isset($_SESSION['authId']) == true) {
         return true;
      }

      if ( $this->username == NULL || $this->password == NULL ) {
         return false; // no auth
      }
      
      if($this->getSalt() == false) {
         return false;
      }

      $passHash = hash("md2" , $this->salt . $this->password);

      $sql = '
         SELECT id
         FROM user
         WHERE username = :username
         AND password = :passHash
         ';


      try {
         $req =  $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

         $req->execute(array(
            ":username" => $this->username,
            ":passHash" => $passHash
         ));

         $user = $req->fetch(PDO::FETCH_OBJ);

      } catch (PDOException $e) {
         return false;
      }


      if($user == false) {
         return false;
      } else {

         $_SESSION['authId'] = $user->id;

         return true;
      }
   }

   // create user
   public function create() {

      if($this->username === NULL || $this->password === NULL ||  $this->email === NULL) {
         return true; // yes error
      }

      $sql = 'INSERT INTO user (`username`, `password`, `email`, `salt`) VALUES (:username, :pass, :email, :salt);';

      $length = 10;

      $salt = substr(str_shuffle("0123456789abcdefghipqrstuvwxyz" .
         "ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()"), 0, $length);

      $passHash = hash("md2" , $salt . $this->password);

      try {
         $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

         $req->execute(array(
            ":username"  => $this->username,
            ":pass"  => $passHash,
            ":email" => $this->email,
            ":salt"  => $salt
         ));

         $this->id = $this->db->lastInsertId(); 

         $this->auth();

      } catch (PDOException $e) {
         return true;
      } catch (Exception $e) {
         return true;
      }


      return false;
   }

   /**
    * This will get a pdo object
    */
   public function getObjectById($id) {
      $sql = '
         SELECT id, username
         FROM user
         WHERE id=:id';

      try {

         $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
         $req->execute(array(":id" => $id));
         $tempUser = $req->fetch(PDO::FETCH_OBJ); // <- return only one!
         return $tempUser;

      } catch (PDOException $e) {

         return NULL;

      }
   }

   public function getAuth() {
      session_start();
      if(isset($_SESSION['authId'])) {
         $this->id = $_SESSION['authId'];
         $this->fill();
         return true; // yes auth
      } else {
         return false; // no auth
      }
   }

   public function getRecipes() {

      $sql = '
         SELECT 
            id,
            title,
            instructions
         FROM recipe
         WHERE authorId = :id
         ';

      try {
         $req = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

         $req->execute(array(":id" => $this->id));

         return $req->fetchAll(PDO::FETCH_CLASS);

      } catch (PDOException $e) {
         return NULL;
      }
   }

   public function __construct($id = NULL) {
      parent::__construct(true);

      $this->id = NULL;
      $this->username = NULL;
      $this->password = NULL;
      $this->salt = NULL;


      if ($id !== NULL) {
         fill();
      }
   }

   public function fill() {
      $tempUser = $this->getObjectById($this->id);
      $this->id = $tempUser->id;
      $this->username = $tempUser->username;
   }

}
