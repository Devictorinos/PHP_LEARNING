<?php

declare(strict_types=1);

foreach ($_GET as $key => $value) {
    if (empty($value))
        unset($_GET[$key]);
}


//$var =  $foo ?: $_GET['name'] ?? 'empty';// ?: throwning Notice
$var =  $foo ?? $_GET['name'] ?? 'empty';// ?? not throwning Notice

echo '<pre>' . print_r($var, true) . '</pre>'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="<?$_SERVER['PHP_SELF']?>" method="get" name="form">
    <fieldset>
        <div>
            <label for="name">Name: <input type="text" name="name" id="name"></label>
        </div>
        <div>
            <label for="email">Email: <input type="text" name="email" id="email"></label>
        </div>
        <div>
            <label for="name">Submit the Form  <input type="submit" name="submit" id="submit"></label>
        </div>
    </fieldset>
    </form>
</body>
</html>