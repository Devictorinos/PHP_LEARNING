<?php

function foo($a, $b, $c)
{

}

function foo2(Exception $a, &$b, $c)
{

}
function foo3(ReflectionFunction $a, $b = 1, $c = null)
{

}
function foo4($a, $b, $c)
{

}


$reflect = new ReflectionFunction("foo3");

echo '<pre>';
echo $reflect;

foreach ($reflect->getParameters() as $key => $param) {

    printf(
        "-- parameter  #%d: %s {\n" .
        "Null allowed %s \n" .
        "Transfered By Reference %s \n" .
        "required ? %s\n" .
        "}\n",
        $param->getPosition(),
        $param->getName(),
        var_export($param->allowsNull(), 1),
        var_export($param->isPassedByReference(), 1),
        $param->isOptional() ? "No" : "Yes"

    );

}
