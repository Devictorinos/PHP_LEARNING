<?php
function _iscurl(){
    if(function_exists('curl_version'))
        return true;
    else
        return false;
}

var_dump(_iscurl());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="get.php" method="POST" name="formsa">
    <input type="text" name="name"/>
    <input type="text" name="age"/>
    <input type="submit" value="send"/>


</form>
</body>
</html>