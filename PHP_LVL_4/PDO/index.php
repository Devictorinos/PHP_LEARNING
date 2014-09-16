<?php

    class victor
    {
        public $id;

        public function showId()
        {
            echo $this->id;
        }
    }
    $drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {

        $db = new PDO("mysql:host=localhost;dbname=people;charset=utf8", "root", "123", $drivers);

    } catch (Exception $e) {

        echo $e->getMessage();
    }

$sql = "SELECT `name`, `id`  FROM name";
$query = $db->prepare($sql);
$query->execute();


$obj = new victor();
//================================================
//$row = $query->fetch(PDO::FETCH_OBJ);//getting data as object
//================================================

//================================================
//$row = $query->fetch(PDO::FETCH_LAZY);//getting all data as object with query string
//================================================

//================================================
//$row = $query->fetch(PDO::FETCH_CLASS|PDO::FETCH_CLASSTYPE);//first field in the select become an Object
//================================================

//================================================
//$row = $query->fetch(PDO::FETCH_CLASS , 'victor');//inserting values before construct
//================================================

//================================================
//$row = $query->fetch(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'victor');//inserting values after construct
//================================================


//================================================
//$query->setFetchMode(PDO::FETCH_INTO, $obj);
//$row = $query->fetch();
//================================================


//echo "<pre>" . print_r($row,true) . "</pre>";


//echo $row->id;
//$row->showId();

//$obk = clone $row;

var_dump($obj);