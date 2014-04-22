<?php

include 'lerning2.php';


if ($visitCounter == 1) {
     echo "first time on site";
 }  else{

    echo "{$lastVisits} times $visitCounter";
 }