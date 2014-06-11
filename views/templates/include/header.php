<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/path.php";
require_once $root . "/models/User.php";
session_start();
$user = new User;
$auth = $user->getAuth();

?>

<?php
if($auth):
?>
<div class="padding pull-right"> logged in as <strong>"<?php echo $user->username ?>"</strong>
   <a class="btn btn-default" href="/user/backend.php">Backend</a>
</div>
<?php else: ?>
<div class="padding pull-right"> 
   <a class="btn btn-default" href="/user/newform.php">Register</a>
   <a class="btn btn-primary" href="/user/login.php">Login</a>
</div>
<?php endif; ?>

<div class="container">
   <div class="logo">
      <a href="/">
         <img src="/bower_components/fork/img/logo.png" alt="Fork Recipes" />
      </a>
   </div>
   <?php include 'nav.php'; ?>
   <div class="bg-white">
