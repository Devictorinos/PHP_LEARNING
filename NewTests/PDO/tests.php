<?php
//namespace NewTests\PDO;

class DB
{
    private $_options;
    private $_dbh;
    private $_host;
    private $_user;
    private $_password;


    public function __construct()
    {
        $this->_host     = "localhost";
        $this->_options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $this->_user     = "root";
        $this->_password = 123;

        $this->_dbh = new PDO("mysql:host=" . $this->_host . ";dbname=northwind;", $this->_user, $this->_password, $this->_options);

        
    }

    public function con()
    {
        return $this->_dbh;
    }
}


class Product
{
    public $ProductID;
    public $ProductName;
    public $CategoryID;

    public  function __construct()
    {

    }

    public function getProductID()
    {
        return $this->ProductID;
    }

    public function getProductName()
    {
        return $this->ProductName;
    }

    public function getCategoryID()
    {
        return $this->CategoryID;
    }
}


$db = new DB();
$dbh = $db->con();

$sql = "SELECT ProductID, ProductName, CategoryID FROM Products";

$query = $dbh->prepare($sql);
$query->execute();

$result = $query->fetchAll(PDO::FETCH_CLASS, 'Product');

$product  = new Product();
foreach ($result as $obj) {
    $name = $obj->getProductName();
    echo "<pre>";
    echo $name;
} 
