<?php

$start =  memory_get_usage();

$array = new SplFixedArray(100000);

//var_dump($array);
for($i = 0; $i < 100000; ++$i) {
    $array[$i] = $i;
}
//$array = range(1, 100000);
echo memory_get_usage() - $start;


