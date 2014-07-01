<?php

$dbh = new PDO("mysql:host=localhost;dbname=northwind", "root", "123");


$query = $dbh->prepare("SELECT  * FROM Customers ");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);

$numRows = $query->rowCount();



if (isset($_GET['pn'])) {
    $pn = $_GET['pn'];
} else {
    $pn = 1;
}

$startPage = 1;
$perPage = 9;

$lastPage = ceil($numRows / $perPage);


if ($pn < 1) {
    $pn = 1;
} else if ($pn > $lastPage) {
    $pn = $lastPage;
}

$controls = '';


if ($pn != $lastPage) {

    $controls .= '<a id="next" href="' . $_SERVER['PHP_SELF'] . '?pn=' . ($pn + 1) . '"> next </a>';
}


for ($i=1; $i <= $lastPage; $i++) {

    if ($i == $pn) {
        $background = ' red;';
    } else {
        $background = ' green;';
    }

    
    $controls .= '<a id="page_' . $i . '" data-page="' . $i . '" class="num" style="background:' . $background . ' " href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '"> ' . $i . '</a>';
}

if ($pn != $startPage) {

    $controls .= '<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . ($pn - 1) . '"> prev </a>';
}

$controls .= "PAGE " . $pn . " of " . $lastPage ;


$limit = "LIMIT " . ($pn) * $perPage . ' OFFSET ' . $perPage;

$query2 = $dbh->prepare("SELECT ContactName FROM Customers " . $limit . "");
$query2->execute();

$outputList = '';

while($row = $query2->fetch(PDO::FETCH_OBJ)){ 

    $firstname = $row->ContactName;
    

    $outputList .= '<h1>' . $firstname . '</h1><hr />';
    
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <style>
        .num {
            text-decoration: none; border: 1px solid #222222;padding: 5px;margin: 0 5px;
        }
    </style>    
    <script>
 /*   $(document).ready(function(){

        var $page  = <?=$pn?> ;
        var $showPages = 5;
        var leng = $('.num').length;    
        for (var i = 0; i <= leng;  i++) {

            var page = $('#page_' + i).attr('data-page');

            if (page > $showPages) {

                $('#page_' + page).hide();
            }
        };


        $('#next').on('click', function(){



        });

        if ($page > 5) {
      /*      var $next = */
        /*    $hide = $page - 5;
            $('#page_' + $page).show();

            for (var i = 1; i < ($page-4); i++) {
                console.log($('#page_' + i))
                $('#page_' + i).hide();
            };

            

        }
*/
   // });*/

</script>
</head>

<body>

<?
    echo $controls;
    echo $outputList;


?>
    
</body>
</html>