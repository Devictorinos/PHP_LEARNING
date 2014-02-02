<?php

namespace some_practicas;

function saySome()
{
    echo 'viktor';
}


function showSaying($function, $arg)
{
    call_user_func(__NAMESPACE__."\\".$function, $arg);
}

// saySome('viktor');

showSaying('saySome', 'viktor');
