<?php

function getStock($id)
{
    $names = array(
        "1"=>"victor",
        "2"=>"sergey"
        );
}

$server = xmlrpc_server_create();

xmlrpc_server_register_method($server, "getStock", "getStock");

?> 