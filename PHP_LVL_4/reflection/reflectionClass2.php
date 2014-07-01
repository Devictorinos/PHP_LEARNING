<?php

interface MyInterface
{

}

class Object
{

}

class Counter extends Object implements MyInterface
{
    const START = 0;
    private static $c = Counter::START;

    public function count()
    {
        return self::$c++;
    } 
}

$class = new ReflectionClass('Counter');
echo "<pre>";
printf(
 "====> %s %s %s %s '%s' [instance of class %s]<br />" .
 "declared in %s <br />" . 
 "lines %d and %d<br />" . 
 " has modificators %d [%s]<br/>" ,
 $class->isInternal() ? "class internal" : 'user class',
 $class->isAbstract() ? "is abstract" : 'not abstarct',
 $class->isFinal() ? "is final" : "not final",
 $class->isInterface() ? "is interface" : "is class",
 $class->getName(),
 var_export($class->getParentClass(), 1),
 $class->getFileName(),
 $class->getStartLine(),
 $class->getEndLine(),
 $class->getModifiers(),
 implode(' ', Reflection::getModifierNames($class->getModifiers()))
    );

printf("interfaces <br /> %s <br />", var_export($class->getInterfaces(), 1));

printf("constants %s <br />", var_export($class->getConstants(), 1));

printf("methods %s <br/>", var_export($class->getMethods(), 1));


if ($class->isInstantiable()) {
    $counter = $class->newInstance();

    echo "created class instanse of {$class->getName()}? <br/>";

    echo $class->isInstance($counter) ? "yes instance <br/>" : "not instance <br/>";

    echo "<br/> created instance of class object()?<br/>";
    echo $class->isInstance(new Object()) ? " yes instance" : "not instance";
}

