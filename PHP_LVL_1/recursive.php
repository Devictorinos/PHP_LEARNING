<?php

$workers = array ( 0 => array(

    "name" => "Sam",
    "lastName" => "Denisov",
    "age" => 25,
    "year" => "2013",
    "country" => array(
        
        "name" => "Israel",
        "town" => "Haifa",
        "street" => "alenby",

        "house" => array(

            "number" => "76",
            "apartament" => "6",
            "rooms" => 4
            )


    )



    ),

    1 => array(

    "name" => "Maya",
    "lastName" => "Tobak",
    "age" => 22,
    "year" => "1987",
    "country" => array(
        
        "name" => "Israel",
        "town" => "Ashdod",
        "street" => "Lohamey Hagetaot",

        "house" => array(

            "number" => "39",
            "apartament" => "9",
            "rooms" => 5
            )


    )



    ),

    2 => array(

    "name" => "Yosi",
    "lastName" => "Bendror",
    "age" => 20,
    "year" => "1988",
    "country" => array(
        
        "name" => "Israel",
        "town" => "Tel Aviv",
        "street" => "Adar",

        "house" => array(

            "number" => "34",
            "apartament" => "33",
            "rooms" => 5
            )


    )



    )

);

// var_dump($workers);


//$arr = array(1,2,3,4,5,6,7,8,9,0);
//
// function showRecursive($array, $mode = 0)
// {
//     if (!is_array($array)) {
//         return 1;
//     }

//     if (is_null($array)) {
//         return 0;
//     }
//     $cnt = 0;
//     foreach ($array as $key => $value) {

//         if (is_array($value) && $mode === 1) {
//            // echo "<tr>";
//               $cnt += showRecursive($value, 1);
//            // echo "</tr>";
//             $cnt ++;
//         }
//        // } else {
           
            
//          //   echo '<td style="text-align:center;"><p style="background:green;color:red;">'.$value.'</p></td>';
            

//         //}
//     }

//     return $cnt;

// }

function showRecursive($array)
{
    if ($array % 2 == 0) {
         echo "<tr>";
    }
      
    foreach ($array as $key => $value) {

        if (is_array($value)) {
            
            showRecursive($value);
        
        } else {
                      
            echo '<td style="text-align:center;"><p style="background:green;color:white;font-weight:bold;">'.$value.'</p></td>';
            
        }
    }
    
    echo "</tr>";
}




echo "<table width=\"1000\">";
            echo "<tr style=\"background:#232323;color:white;font-weight:bold;\">";
                  echo "<th>First Name</th><th>Last Name</th><th>Age</th><th>Year</th><th>Country</th><th>Town</th><th>Street</th><th>Hous Number</th><th>Apartament number</th><th>Rooms</th>";
            echo "</tr>";
            
               $c =  showRecursive($workers);
             
            
echo "</table>";
