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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
    <script>

    var i = 0;
    var j = 0;
    function foo(i) {
        
        alert(++i)
    }

    function foo2(j) {
        
        console.log(j++)
    }

    foo(i)
    foo2(j)

    </script>
<body>
    <form action="#">
            

        <label for="check">check</label>
        <input type="checkbox" name="check" id="check">


    </form>
</body>
</html>
