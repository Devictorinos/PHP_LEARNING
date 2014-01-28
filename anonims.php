<?php

// echo preg_replace_callback('~-([a-z])~', function ($match) {
//     return strtoupper($match[1]);
// }, 'hello-world');
// // выведет helloWorld
// function viktor ()
// {

//     echo "viktor";

// };

// call_user_func("viktor");

// function name (callble $var)
// {
//     return $var;
// }

// name("viktor");



function run(callable $cb)
{
     call_user_func($cb, 'viktor');
     echo "\n";
}

run(function ($name) {
    echo "hello $name";
});

run(function ($name) {
    echo "what's up $name?";
});

run(function ($name) {
    echo "goodbye $name!";
});
