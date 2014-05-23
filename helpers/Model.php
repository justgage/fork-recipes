<?php 

abstract class Model {

   protected $db;

   public function open() {
      $dbHost = "localhost";
      $dbPort = "";
      $dbUser = "forkBot";
      $dbPassword = "KBLmts6EXcdfdQPP";
      $dbName = "fork";

      $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

      //checks if we are NOT connected to openshift.
      // note, string compare CAN'T be a !== for some reason
      if ($openShiftVar !== null && $openShiftVar != "")
      {
         // In the openshift environment
         //echo "Using openshift credentials: ";

         $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
         $dbPort = ":" . getenv('OPENSHIFT_MYSQL_DB_PORT');
         $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
         $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
         $dbName = "forkrecipes";
      }

      //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br />\n";


      try {
         $this->db = new PDO("mysql:host=$dbHost$dbPort;dbname=$dbName", $dbUser, $dbPassword);
      } catch (PDOException $e) {
         echo "error connecting to database!";
      }

   }

   protected function __construct($connect = true) {
      if ($connect) {
         $this->open();
      }
   }

   public function close() {
      $this->db = null;
   }
}

class Recipe extends Model {
   public function getAll() {
      $req = $this->db->query("SELECT id, title, instructions, authorId, forkedFromId FROM recipe");
      return $req->fetchAll(PDO::FETCH_CLASS);
   }

   public function __construct($connect = true) {
      parent::__construct($connect);
   }

}
