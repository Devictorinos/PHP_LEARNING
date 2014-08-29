<?php


$ws = array_slice(explode('/', $_SERVER['REQUEST_URI']), 3);

if(preg_match('/\?/', end($ws), $matches)) {

    $m = explode('?',end($ws));
} else {
    $m = false;
}


if(!$m) {


    switch (count($ws)) {
        case 1:
            $qs = $ws[0];
            break;
        case 2:
            $qs = $ws[0] . "/" . $ws[1];
            break;
        case 3:
            $qs = $ws[0] . "/" . $ws[1] . "/" . $ws[2];
            break;
        case 3:
            $qs = $ws[0] . "/" . $ws[1] . "/" . $ws[2] . $ws[3];
            break;            
        default:
            echo "not mutch";
            break;
    }
} else {

    switch (count($ws)) {
        case 1:
            $qs = $m[0];
            break;
        case 2:
            $qs = $ws[0] . "/" . $m[0];
            break;
        case 3:
            $qs = $ws[0] . "/" . $ws[1] . "/" . $m[0];
            break;
        case 4:
            $qs = $ws[0] . "/" . $ws[1] . "/" . $ws[2] . $m[0];
            break;            
        default:
            echo "not mutch";
            break;
    }
}


echo $qs;