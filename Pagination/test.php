<?php

$dbh = new PDO("mysql:host=localhost;dbname=northwind", "root", "123");

echo "<pre>" . print_r($dbh, true) . "</pre>";

$query = $dbh->prepare("SELECT ContactName FROM Customers");
$query->execute();
$numRows = $query->rowCount();


if (isset($_GET['pn'])) {
    $pn = $_GET['pn'];
} else {
    $pn = 1;
}


$perPage = 9;

$lastPage = ceil($numRows / $perPage);


if ($pn < 1) {
    $pn = 1;
} else if ($pn > $lastPage) {
    $pn = $lastPage;
}


$centerPages = '';

$sub1 = $pn -1;
$sub2 = $pn -2;
$add1 = $pn +1;
$add2 = $pn +2;

if ($pn ==1) {

    $centerPages .= '&nbsp; <span>' . $pn . '</span>';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</span>';

} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF']. '?pn=' . $sub1 . '">' . $sub1 . '</a>';
    $centerPages .= '&nbsp;<span>' . $pn . '</span>';

} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF']. '?pn=' . $sub2 . '">' . $sub2 . '</a>';
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF']. '?pn=' . $sub1 . '">' . $sub1 . '</a>';
    $centerPages .= '&nbsp; <span>' . $pn . '</span>';
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a>';
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add2 . '">' . $add2 . '</a>';
   
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF']. '?pn=' . $sub1 . '">' . $sub1 . '</a>';
    $centerPages .= '&nbsp; <span>' . $pn . '</span>';
    $centerPages .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $add1 . '">' . $add1 . '</a>';
}




$pDisplay = '';

if ($lastPage != "1"){
    // This shows the user what page they are on, and the total number of pages
    $pDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';
    // If we are not on page 1 we can place the Back button
    if ($pn != 1) {
        $previous = $pn - 1;
        $pDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '"> Back</a> ';
    } 


$pDisplay = '&nbsp; <span>' . $centerPages . '</span>';

if ($pn != $lastPage) {
    $next = $pn + 1;
    $pDisplay .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '">next</a>';
}

}

$limit = "LIMIT " . ($pn - 1) * $perPage . ',' . $perPage;

$query2 = $dbh->prepare("SELECT ContactName FROM Customers " . $limit . "");
$query2->execute();

$outputList = '';
while($row = $query2->fetch(PDO::FETCH_OBJ)){ 

    $firstname = $row->ContactName;
    

    $outputList .= '<h1>' . $firstname . '</h1><hr />';
    
} 

echo $pDisplay;
echo $outputList;
?>