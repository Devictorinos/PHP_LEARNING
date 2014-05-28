<?php
/*implements Serializable*/
class A implements Serializable
{
    private $_varA;

    public function __construct()
    {
        $this->_varA = "a";
    }

    public function serialize()
    {
        return serialize($this->_varA);
    }

    public function unserialize($serialized)
    {
        $this->_varA = unserialize($serialized);
    }

    public function showVar()
    {
        echo $this->_varA . "<br />";
    }
}

class B extends A
{
    private $_varB;

    public function __construct()
    {
        parent::__construct();
        $this->_varB = "b";
    }

    public function serialize()
    {
        $aSerialized = parent::serialize();

        return serialize(array('_varB', $aSerialized));
    }

    public function unserialize($serialized)
    {
        $temp = unserialize($serialized);
        $this->_varB = $temp[0];
        parent::unserialize($temp[1]);
    }

/*    public function __sleep()
    {
        return array('_varA', '_varB');
    }*/
}

$obj = new B();

$serialized = serialize($obj);

echo "$serialized <hr />";

echo $obj->showVar();
$restored = unserialize($serialized);
?>