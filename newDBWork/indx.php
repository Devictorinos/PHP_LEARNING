<?php

    require_once "DBConfig.Class.php";
    require_once "NDB.Class.php";

echo "<pre>";
/*try {

    $result = newDBWork\NDB::S('u');
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}*/


try {

    $result = NDB::S();
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}

try {

    $result = NDB::R();
    var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


try {

    $result = NDB::W();
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


try {

    $result = NDB::S();
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


try {

    $result = NDB::S()->select();
     var_dump($result);
} catch (PDOException $e) {
    ECHO "HERE1";
    echo $e->getMessage();

}


