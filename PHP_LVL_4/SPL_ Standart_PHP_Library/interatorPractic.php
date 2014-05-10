<?php


class NumberSquared implements Iterator
{
    private $_start;
    private $_end;
    private $_current;

    public function __construct($start, $end)
    {
        $this->_start = $start;
        $this->_end = $end;
    }

    public function rewind()
    {
        $this->_current = $this->_start;
        
    }

    public function key()
    {
        return $this->_current;
    }

    public function current()
    {
        return pow($this->_current, 2);
    }


    public function next()
    {
        return $this->_current ++;

    }

    public function valid()
    {
        return $this->_current <= $this->_end;
    }
}


$nums = new NumberSquared(2, 5);

foreach ($nums as $key => $value) {
    
    echo " square of number {$key} =  $value<hr />";
}