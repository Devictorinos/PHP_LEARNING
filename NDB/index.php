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

$sql = "SELECT EmployeeID, LastName, FirstName, BirthDate, Address, City, Region FROM `Employees` 
        WHERE  EmployeeID IN (".$a.",".$b.",6,7)";

NDB::R()->select($sql);

while ($row = NDB::R()->FetchIntoClass(new Employee())) {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";

}


NDB::R()->select($sql);


while ($row  = NDB::R()->Fetch()) {
    var_dump($row);
}

$result = NDB::R()->FetchClassAll('Employee');

foreach ($result as $key => $value) {
    $value->getEmD();
}





