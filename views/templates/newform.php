
<div class="form-group login-pane well">
<h1>Sign up</h1>

<?php 
if(isset($_GET['err'])) {
   echo "<p class='alert alert-danger'>$_err_text</p>";
}
?>

<div class="center-block">
<form action="/user/create.php" method="POST">

   <div class="form-group">
      <div><input class="form-control" name="username" placeholder="username" type="text"></div>
   </div>

   <div class="form-group">
      <div><input class="form-control" name="password" placeholder="password" type="password"></div>
   </div>

   <div class="form-group">
      <div><input class="form-control" name="email" placeholder="you@email.com" type="text"></div>
   </div>


   <div class="form-group">
      <div><input class="form-control" type="submit" value="sign up"></div>
   </div>

</form>
</div>
</div>
