<?php

// ob_start();
// echo '<p>первый буфер </p>';

// ob_start();
//  $text = '<p>второй буфер </p>';
// ob_end_clean();

// ob_start();
// echo '<p>третий буфер </p>';
// echo $text;

// ob_end_flush();
//  setcookie("y-m-d", "today");

 // for($i = 1; $i < 11; $i++ )
// {   
//     sleep(1);
//     echo '<p>Это очередное обновление данных № '.$i.'</p>' ;    
//     flush();
// }

// ob_implicit_flush();
 
// for($i = 1; $i < 11; $i++ )
// {   
//     sleep(1);
//     echo '<p>Это очередное обновление данных № '.$i.'</p>' ;
// }

// ob_start();

// echo "Hello ";

// $out1 = ob_get_contents();

// echo "World";

// $out2 = ob_get_contents();

// ob_end_clean();

// var_dump($out1, $out2);


ob_start();
echo "Some text you want to echo on page!!";
//header("Location:somepage.php");
ob_end_flush();