<?php

    require_once "DBConfig.Class.php";
    require_once "NDB.Class.php";

echo "<pre>";
try {

    $result = newDBWork\NDB::con('u');
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


try {

    $result = newDBWork\NDB::con('s');
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}

try {

    $result = newDBWork\NDB::con('r');
    var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


try {

    $result = newDBWork\NDB::con('w');
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}

try {

    $result = newDBWork\NDB::con('w');
    var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}

try {

    $result = newDBWork\NDB::con('s');
    var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}

