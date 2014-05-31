<?php include "$this->path/nav.php";?>
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
<form action="/user/auth.php" method="POST">
<input name="username" placeholder="username" type="text">
<input name="password" placeholder="password" type="text">
<input type="submit" value="register">
</form>

<?php 
}
?>
