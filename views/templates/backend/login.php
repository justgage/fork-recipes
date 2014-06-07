<div class="form-group login-pane well">
<h2>Login</h2>
<?php 

if(isset($_GET['err'])) {
   echo '<div class="alert alert-warning">Sorry wrong password or username! Please try again!</div>';
}

if($_auth) {
   echo '<p class="bg-sucsess">It looks like your already loged in!</p>';
   echo '<a href="/user/backend.php" class="btn btn-primary">Enter</a>';
} else {
?>
<div class="center-block">
<form action="/user/auth.php" method="POST" role="form">

   <div class="form-group">
      <div><input class="form-control" name="username" placeholder="username" type="text"></div>
   </div>

   <div class="form-group">
      <div><input class="form-control" name="password" placeholder="password" type="password"></div>
   </div>

   <div class="form-group">
      <div><input class="form-control" type="submit" value="go"></div>
   </div>

</form>
</div>

<a class="" href="/user/newform.php">Register</a>

<?php 
}
?>
</div>
