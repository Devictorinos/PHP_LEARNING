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


/*++ IteratorAggregate ++*/
class Test implements IteratorAggregate
{
    private $__start;
    private $__end;

    public function __construct($start, $end)
    {
        $this->_start = $start;
        $this->_end   = $end;
    }

    public function getIterator()
    {
        return  new NumberSquared($this->_start, $this->_end);
    }

}

$nums = new NumberSquared(2, 5);

foreach ($nums as $key => $value) {
    
    echo " square of number {$key} =  $value<hr />";
}

echo "<br /> <hr />";

$nums1 = new NumberSquared(3, 9);

foreach ($nums1 as $key1 => $value1) {
    
    echo " square of number1 {$key1} =  $value1 <hr />";
}

echo "TEST <hr />";
$test = new Test(10, 20);

foreach ($test as $key => $value) {
     echo " square of number1 {$key} =  $value <hr />";
}
?>