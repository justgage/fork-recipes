<?php include "$this->path/nav.php";?>
<div class="form-group">
<h2>Login</h2>
<?php 

if(isset($_GET['err'])) {
   echo '<p class="bg-danger">Sorry wrong password or username! Please try again!</p>';
}

if($_auth) {
   echo '<p class="bg-sucsess">It looks like your already loged in!</p>';
   echo '<a href="/user/backend.php" class="btn btn-primary">Enter</a>';
} else {
?>
<div class="center-block">
<form action="/user/auth.php" method="POST" role="form">
<div><input name="username" placeholder="username" type="text"></div>
<div><input name="password" placeholder="password" type="password"></div>
<div><input type="submit" value="go"></div>
</form>
</div>

<a href="/user/newform.php">Register</a>

<?php 
}
?>
</div>
