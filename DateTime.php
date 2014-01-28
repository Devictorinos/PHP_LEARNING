<?php
 
 echo time()."<br>";
 echo microtime()."<br>";
 echo @date("Y m d");
$time = @mktime(22, 56, 33, 2, 2, 1985);// mktime(hour,minute,second,day,month,year)
$get = getdate();
var_dump($get);
