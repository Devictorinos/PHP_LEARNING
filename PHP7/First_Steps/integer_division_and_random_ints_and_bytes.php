<?php

declare(strict_types=1);

//basic division
echo '<pre>';
var_dump(6/3);
var_dump(5/3);

//Find the reemainder
echo '<pre>';
var_dump(5 % 2);
var_dump(floor(-5/2));

//Initial proposal: new operator %% steal not working
//echo '<pre>';//
//var_dump(5 %% 2);//

//New function for integer devicion
echo '<pre>';
var_dump(intdiv(-5, 2));

function convertMetersToYards($meters)
{
    //Converts meters to tenth of a millimeter
    $mmx10      = $meters * 10000;
    //Devide by 9144 to get yards
    $yards      = intdiv($mmx10, 9144);
    //Use modulo division to get the remainder
    $remainder  = $mmx10 % 9144;
    //Divide by 3048 to get feet
    $feets       = intdiv($remainder, 3048);
    //Get the remainder and convert to inches
    $inches     = $feets % 3048;
    $inches     = number_format($inches / 254, 2);

    return new class($yards, $feets, $inches) {

        public $inches;
        public $feets;
        public $yards;

        public function __construct($yards, $feets, $inches)
        {
            $this->yards  = $yards;
            $this->feets  = $feets;
            $this->inches = $inches;


        }
    };
}

echo '<pre>';
var_dump(convertMetersToYards(50));


/**** Random Bytes ****/
echo '<pre>';
var_dump(bin2hex(random_bytes(12)));

/**** Random Ints ****/

$tries = 0;

while (true) {

    //Role the dice
    $dice1 = random_int(1, 10);//new function in php7
    $dice2 = random_int(1, 10);

    echo "{$dice1} - {$dice2}<br />";
    $tries++;

    //Close the loop when getting double six.
    if ($dice1 == 6 && $dice2 == 6) {
        $throws = ($tries > 1 ? "Throws" : "Throw");
        echo "<p>It took {$tries} {$throws} to get a double six</p>";

        break;
    }
}

