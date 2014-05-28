<?php

class MyIterator implements Iterator
{
    private $_var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->_var = $array;
        }
    }

    public function rewind()
    {
        echo "rewinding<hr />";
        reset($this->_var);
    }

    public function current()
    {
        $var = current($this->_var);
        echo "current: {$var}<hr/>";
        return $var;
    }

    public function key()
    {
        $var = key($this->_var);
        echo "key: {$var}<hr/>";
        return $var;
    }

    public function next()
    {
        $var = next($this->_var);
        echo "next: {$var}<hr/>";
        return $var;
    }

    public function valid()
    {
        $var = $this->current() !== false;
        echo "valid: {$var}<hr/>";
        return $var;
    }
}

$values = array(1, 2, 3);

$it = new MyIterator($values);

foreach ($it as $key => $value) {
    
    echo "{$key}: $value<br />";
}