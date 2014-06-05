<?php


class Insert implements Iterator
{
    private $_position;
    private $_array = array();
    private $_count;
    private $db;
    public function __construct($array)
    {

        $this->_array = $array;

        $drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {

            $this->db = new PDO("mysql:host=localhost;dbname=people;charset=utf8", "root", "123", $drivers);

        } catch (Exception $e) {

            echo $e->getMessage();
        }

    }

    public function rewind()
    {
        $this->_position = 0;
    }


    public function current()
    {

        $args = $this->_array[$this->_position];

        if (preg_match("/^[a-z]+$/i", $args)) {
            
            $sql = "INSERT INTO `name` (name) VALUES (:name)";

            $query = $this->db->prepare($sql);
            $query->bindValue(":name", $args, PDO::PARAM_STR);
            $query->execute();

        }
        return $this->_array[$this->_position];

    }

    public function key()
    {
        return $this->_position;
    }


    public function next()
    {
        return ++ $this->_position;
    }

    public function valid()
    {
        return isset($this->_array[$this->_position]);
    }


}


$names = array("Yosi", "Moshe","Malka", "Beni", "Sagi", "Oleg");

$iterator = new Insert($names);

foreach ($iterator as $key => $value) {

    echo $key . ": " . $value . "<br>";

}


?>