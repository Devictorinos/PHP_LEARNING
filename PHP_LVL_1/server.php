<?php

phpinfo();

echo "powered by ".$_SERVER['SERVER_SOFTWARE'];
echo " " . PHP_VERSION;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="server.php" method="POST" >
    <input type="text" name="name" value=""><br>
    <input type="text" name="age" value=""><br>
    <input type="submit" value="See Result">
</form>

<?php
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {

        echo "name " . trim(strip_tags($_POST['name']))."<br>";
        echo "age "  .  trim(abs((int)$_POST['age']));
        
}


 ?>
    
</body>
</html>