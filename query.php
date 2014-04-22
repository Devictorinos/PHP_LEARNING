<?php


$id = array("id" => 1);

$page = array(

    "name" => "page",
    "title" => "new page",
    "descr" => "test",
    "content" => "test test test"
    );

$update = array();

foreach ($page as $key => $value) {
    
    $update[] = $key . "= " . "'".$value."'";
}

$update = implode(", ", $update);

//echo $update;

$sql = "UPDATE pages SET ".$update." WHERE id = ".$id['id']."";


echo $sql;