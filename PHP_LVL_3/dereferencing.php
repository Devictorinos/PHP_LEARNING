<?php

namespace PHP_LVL_3;

class Test
{
    public function sayHi()
    {
        echo __CLASS__. " in line " . __LINE__ . " with method " . __METHOD__ . " hi! ";
    }
}

class Name
{
    public function sayHi()
    {
        echo __CLASS__ . " in line " . __LINE__ . " with method " . __METHOD__ . " hi! ";
    }
}

function deref($name)
{
    switch ($name) {
        case 'Test':
            return new Test();
            break;
        case 'Name':
            return new Name();
            break;

    }
}

deref('Test')->sayHi();

echo "<hr />";

deref('Name')->sayHi();
