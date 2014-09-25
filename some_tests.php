<?php

$text   = "These are a few words :) ...  ";
echo $text;
echo "<br>";
echo trim($text);
// class Builder
// {
//     private $query;
//     private $prefix;

//     public function __construct($prefix='')
//     {
//         //$this->query = $query;
//         $this->prefix = $prefix;
//     }

//     public function replaceCallback($match)
//     {
//         return (preg_match('/^{(.*)}$/', $match[1], $m)
//         ? ( empty($this->prefix) ? $m[1] : "{$this->prefix}_$m[1]" )
//         : $match[1]
//         );
//     }

//     public function build($query)
//     {
//         static $regExp = '/([^{"\']+|\'(?:\\\\\'.|[^\'])*\'|"(?:\\\\"|[^"])*"|{[^}{]+})/';
//         return preg_replace_callback($regExp, array(&$this, "replaceCallback"), $query);
//     }
// }
// $builder = new Builder('cms');

// echo $builder->build("SELECT * FROM {documents}");
// //Выведет SELECT * FROM cms_documents

// $var = 4;

// class MyClass
// {
//     public $callback;
   
    

//     public function callBacks(callable $number, $var)
//     {

//           call_user_func($number, $var);

//     }
// }

// $obj = new MyClass();

// $obj->callBacks(function ($number) {
//            echo $number * 10;
// }, $var);
// function increment(&$var)
// {
//     $var++;
// }




// $a = 1;


// call_user_func('increment', array(&$a));
// echo $a."\n";








// call_user_func_array('increment', array(&$a)); // Вместо этого можно использовать этот способ до PHP 5.3
// echo $a."\n";


// function barber($type)
// {
//     echo "Вы хотели стрижку $type, без проблем\n";
// }
// call_user_func('barber', "под горшок");
// call_user_func('barber', "наголо");

// class foo
// {
//     public $foo;
//     public $bar;

//     function foo()
//     {
//         $this->foo = 'Foo';
//         $this->bar = array('Bar1', 'Bar2', 'Bar3');
//     }
// }

// $foo = new foo();
// $name = 'МоеИмя';

// echo <<<EOT
// Меня зовут "$name". Я печатаю $foo->foo.
// Теперь я печатаю {$foo->bar[1]}.
// Это не должно вывести заглавную 'A': \x41
//EOT;
//
// $juice = "apple";
// echo "He drank some $juice juice.".PHP_EOL;
// // не работает, 's' - это верный символ для имени переменной,
// // но наша переменная имеет имя $juice.
// echo "He drank some juice made of {$juice}s.";

// $col = 10;
// $rows = 10;


// function multiplications($rows, $col, $color)
// {
//     static $cnt = 0;
//     $cnt ++;
//     echo $cnt;
//     echo '<table border="1" width="300" >';

//     for ($tr=1; $tr <= $rows; $tr++) {
       
//         echo '<tr>';

//         for ($td = 1; $td <= $col; $td++) {

//             if ($td == 1 || $tr == 1) {

//                 echo '<th style="background:'.$color.'"> '.$tr * $td.'</th>';

//             } else {
//                 echo '<td > '.$tr * $td.'</td>';
            
//             }
//         }


//         echo '</tr>';
//     }

//     echo '</table>';
 
// }

// multiplications($rows, $col, "green");
// multiplications($rows, $col, "green");
