<?php

namespace some_practicas;

class Test
{
    public $var;

    public function saySome($arg)
    {
      
        return  $this->say($arg);
    }

    private function say($arg)
    {
        $this->var = $arg;

        return $this;
    }

    public function __toString()
    {
        return $this->var;
    }
}

$a = new \some_practicas\Test;

$a->saySome("hello");

echo $a;

echo "<br />";

$b = new \some_practicas\Test;

echo $b->saySome("hello viktor");
