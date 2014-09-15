<?php


include "NDB.Class.php";
include "Query.Class.php";
include "Select.Class.php";


$arr['name']    = "name";
$arr['lastname'] = "lastname";

$con_token = 5;
$sql = "SELECT * FROM `Employees` 
        WHERE  EmployeeID IN (1,2,6,7) AND BirthDate > '1955-3-4%'";

$result = NDB::R()->select($sql)->getOnyResult();

var_dump($result);

while($row  = $result->fetch(PDO::FETCH_OBJ)) {

    var_dump($row);
}