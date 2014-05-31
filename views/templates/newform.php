<?php 
if(isset($_GET['err'])) {
   echo "<p> there was an error!</p>";
}
?>

<?php include "$this->path/nav.php";?>

<h1>Sign up</h1>


<form action="/user/create.php" method="POST">
<div><input name="username" placeholder="username" type="text"></div>
<div><input name="password" placeholder="password" type="password"></div>
<div><input name="email" placeholder="email" type="text"></div>
<div><input type="submit" value="register"></div>
</form>
