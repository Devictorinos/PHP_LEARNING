<?php

include "NDB.Class.php";
include "Debug.Class.php";

class Employee
{
    public $EmployeeID;
    public $LastName;
    public $FirstName;
    public $BirthDate;
    public $Address;
    public $City;
    public $Region;


    public function __construct()
    {

    }

    public function getEmD()
    {
        echo "Employee First Name " . $this->FirstName;
        echo "<hr/>";
        echo "Employee Last Name " . $this->LastName;
        echo "<hr/>";
        echo "Employee Birth Date " . $this->BirthDate;
        echo "<hr/>";
        echo "lives in City " . $this->City . " and Address " . $this->Address;
        echo "<hr/>";
        echo "Employee Region " . $this->Region;
        echo "<br><br><br><br>";

    }
}




$a = 1;
$b = 2;

$employees = new Employee();

/*$sql = "SELECT EmployeeID, LastName, FirstName, BirthDate, Address, City, Region FROM `Employees` 
        WHERE  EmployeeID IN (".$a.",".$b.",6,7)";




NDB::R()->select($sql);

while ($row = NDB::R()->FetchIntoClass(new Employee())) {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";

}*/

/*$sql = "SELECT EmployeeID, LastName, FirstName, BirthDate, Address, City, Region FROM `Employees` 
        WHERE  EmployeeID IN (".$a.",".$b.",8,9)";

NDB::R()->select($sql);


while ($row = NDB::R()->FetchIntoClass(new Employee())) {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";

}*/

/*$result = NDB::R()->fetchClassAll('Employee');

foreach ($result as $key => $value) {
    $value->getEmD();
}
*/


$arr['titleOfCourtesy']   = "MSr.";


$result = NDB::R()->update('Employees', $arr)->whereBetween1("EmployeeID", 1, 8)->where1("Country", "USA", "=")->exec();

var_dump($result);
$arr = [];
/*$arr['FirstName']   = "Vivid";
$arr['LastName']   = "Coches";
$arr['BirthDate']   = date("Y-m-d H:i:s");

$result2 = NDB::R()->insert('Employees', $arr);
$lastID = NDB::R()->getLastInsertId();
var_dump($result2);
var_dump($lastID);



$arr = [];
$arr['FirstName']   = "fdfdf";
$arr['LastName']   = "fdfdfdfdfd";
$arr['BirthDate']   = date("Y-m-d H:i:s");

$result2 = NDB::R()->insert('Employees', $arr);
$lastID = NDB::R()->getLastInsertId();
var_dump($result2);
var_dump($lastID);*/
/*$arr['LastName']   = "Alexanderov";
$arr['FirstName']  = "Gudvin";


NDB::R()->update('Employees', $arr);
$result2 = NDB::R()->where1("EmployeeID", 2)->exec();*/

//var_dump($result2);

/*$arr['LastName']   = "Lubchuk";
$arr['FirstName']  = "Victor";*/


//$result = NDB::R()->update('Employees', $arr)->where1("tyryr", 6)->whereBetween1("EmployeeID", 1, 6)->whereBetween2("DATE", "2014-09-18", "2014-12-12")->where3("tyryr", 6)->where4("fdsfsd", 8)->where5("Country", "gfdgd", ">")->where2("Country", "USA", "=")->exec(true);