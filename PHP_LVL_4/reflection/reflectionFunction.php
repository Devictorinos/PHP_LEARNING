<?php

function sayHello($name, $h)
{
    static $count = 0;

    return "<h{$h}> Hello, {$name} </h{$h}>>";
}

echo "<pre>";
Reflection::export(new ReflectionFunction('sayHello'));

echo "<hr />";


$funct = new ReflectionFunction('sayHello');

printf(

    "<p> ===> %s function '%s'\n" .
    " declareted in %s\n" .
    "from line %d to %d\n",
    $funct->isInternal() ? "Internal" : "User-defined",
    $funct->getName(),
    $funct->getFileName(),
    $funct->getStartLine(),
    $funct->getEndLine()
);

if ($static = $funct->getStaticVariables()) {
    printf(
        "<p> ---> Static Variable: %s",
        var_export($static, 1)
    );
}

echo "<hr />";

//call to function
printf("the result of call is: ");
$result = $funct->invoke('Victor', '1');
echo $result;

