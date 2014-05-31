<?php

session_start();

unset($_SESSION['authId']);

header("Location: /user/login.php?logout=1");

?>
