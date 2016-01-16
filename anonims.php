<?php

echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');
//output is hello world
function viktor ()
{

    echo "viktor";

};

echo "<br>";

call_user_func("viktor");

echo "<br>";

//declarating function that return variable.
function name (callble $var)
{
    return $var;
}


function run(callable $cb)
{
     call_user_func($cb, 'viktor');
     echo "\n";
}

echo "<br>";

run(function ($name) {
    echo "hello $name";
});

echo "<br>";

run(function ($name) {
    echo "what's up $name?";
});

echo "<br>";

run(function ($name) {
    echo "goodbye $name!";
});
