<?php 
if(isset($_GET['err'])) {
   echo "<p> there was an error!</p>";
}
?>
<form action="/user/create.php" method="POST">
<input name="username" placeholder="username" type="text">
<input name="password" placeholder="password" type="text">
<input name="email" placeholder="email" type="text">
<input type="submit" value="register">
</form>
