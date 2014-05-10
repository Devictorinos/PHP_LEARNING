<?php

class Test implements IteratorAggregate
{
    private $_db;
    private $_names = array();
    public function __construct()
    {
        $drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {

            $this->db = new PDO("mysql:host=localhost;dbname=people;charset=utf8", "root", "123", $drivers);

        } catch (Exception $e) {

            echo $e->getMessage();
        }

        $this->getNames();
    }

    public function getIterator()
    {
        return new ArrayIterator($this->_names);
    }

    private function getNames()
    {
        $sql = "SELECT `id`, `name` FROM name";
        $query = $this->db->prepare($sql);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            
            $this->_names[$row->id] = $row->name;
        }
    }


}

$names = new Test();



foreach ($names as $key => $value) {
    echo "id = " . $key . " and name = " . $value . "<br />";
}
