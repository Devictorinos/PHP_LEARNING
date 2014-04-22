<?php

function foo()
{
    echo func_num_args();//showing count of passed arguments to function
 
    echo "<pre>";
    print_r(func_get_args());//showing passed arguments
    echo "</pre>";

    echo func_get_arg(1);// showing passed argument

}


foo('viktor', 'lubchuk', 28);


echo "<br />";
