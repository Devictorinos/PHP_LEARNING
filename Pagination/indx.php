<?php

$dbh = new PDO("mysql:host=localhost;dbname=northwind", "root", "123");


$query = $dbh->prepare("SELECT ContactName FROM Customers");
$query->execute();
$numRows = $query->rowCount();

echo "<pre>" . print_r($numRows, true) . "</pre>";


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
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}

$limit = "LIMIT " . ($pn-1) * $perPage . ', ' . $perPage;

$query2 = $dbh->prepare("SELECT ContactName FROM Customers " . $limit . "");
$query2->execute();


$paginationDisplay = ""; // Initialize the pagination output variable
// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display
if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    } 
    // Lay in the clickable numbers display here between the Back and Next links
    $paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
    // If we are not on the very last page we can place the Next button
    if ($pn != $lastPage) {
        $nextPage = $pn + 1;
        $paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage . '"> Next</a> ';
    } 
}


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
    echo $paginationDisplay;
    echo $outputList;


?>
    
</body>
</html>