<?php

require_once "autoload.php";

// use Father as F;
// use Father\Child as CH;
// use Father\Child\InnerChild as ICH;
// use Father\Child\InnerChild\InnerInnerChild as IICH;

$obj = new Father\Object;
$obj1 = new Father\Child\Child;
$obj2 = new Father\Child\InnerChild\InnerChild;
$obj3 = new Father\Child\InnerChild\InnerInnerChild\InnerInnerChild;


$obj -> showString();
$obj1 -> showString();
$obj2 -> showString();
$obj3 -> showString();


//$obj->showString();
