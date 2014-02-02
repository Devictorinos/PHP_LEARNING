<?php

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>

<style type="text/css">

    .container{width:500px;height:400px;border:1px solid #222;margin:50px auto;padding:30px;}  

</style>



</head>
<body>


<div class="container">
<form action="#" name="testForm">
  
<label for="name">name</label> <br> 
<input type="text">
<br>
<label for="Email">Email</label><br>
<input type="text">
<br>
<label for="captcha">Captcha</label><br>
<input type="text">&nbsp;&nbsp;<span class="captcha"><?php header("Content-type: image/png");
imagepng($im);?></span>
<br>
<input type="submit" value="send">



</form>
  

</div>
</body>
</html>

