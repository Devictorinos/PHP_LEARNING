<?php

class MyClass implements ArrayAccess
{   
    private $_title = array();

    public function offsetExists($item)
    {
        if (isset($this->_title[$item])) {
            return $this->_title[$item];
        }
    }

    public function offsetSet($item, $value)
    {

            $this->_title[$item] = $value;
        
        
    }

    public function offsetGet($item)
    {
        return $this->_title;
    }

    public function offsetUnset($item)
    {
        unset($this->_title);
    }
}

$obj = new MyClass();

$obj['1'] = "victor";
$obj['2'] = "yosi";
$obj['3'] = "eden";

echo "<pre>" . print_r($obj, true) . "</pre>";
