<?php

session_start();
$_SESSION['secure'] = rand(100000, 999999);


?>
<img src="generator.php" />