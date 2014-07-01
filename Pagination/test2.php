<?php


$dbh = new PDO("mysql:host=localhost;dbname=northwind", "root", "123");


$query = $dbh->prepare("SELECT ContactName FROM Customers");
$query->execute();
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

//setting up vartiables to display allways five links
$pagesToView = '';
$prevPage1 = $pn - 1;
$prevPage2 = $pn - 2;
$nextPage1 = $pn + 1;
$nextPage2 = $pn + 2;

if ($pn == 1) {
    
    $pagesToView .= '&nbsp;<span> ' . $pn . ' </span>';
    $pagesToView .= '&nbsp<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage1 . '">' . $nextPage1 . '</a>';

} else if ($pn == $lastPage) {

    $pagesToView .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $prevPage1 . '">' . $prevPage1 . '</a>';
    $pagesToView .= '&nbsp;<span> ' . $pn . '</span>';

} else if ($pn > 2 && $pn < ($lastPage - 1)) {

    $pagesToView .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $prevPage1 . '">' . $prevPage1 . '</a>';
    $pagesToView .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $prevPage2 . '">' . $prevPage2 . '</a>';
    $pagesToView .= '&nbsp;<span> ' . $pn . '</span>';
    $pagesToView .= '&nbsp<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage1 . '">' . $nextPage1 . '</a>';
    $pagesToView .= '&nbsp<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage2 . '">' . $nextPage2 . '</a>';

} else if ($pn > 1 && $pn < $lastPage) {

    $pagesToView .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $prevPage1 . '"> ' . $prevPage1 . '</a>';
    $pagesToView .= '&nbsp;<span> ' . $pn . '</span>';
    $pagesToView .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $nextPage1 . '">' . $nextPage1 . '</a>';
}


$paginationControls = '';

if ($lastPage != 1) {

    if ($pn != 1) {
        $paginationControls .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . ($pn - 1) . '"> prev </a>';
    
    }

        $paginationControls .= $pagesToView;
    if ($pn < $lastPage) {
        $paginationControls .= '&nbsp;<a href="' . $_SERVER['PHP_SELF'] . '?pn=' . ($pn + 1) . '"> next </a>';
        
    }

    $paginationControls .= '<select id="jumpToPage">';
    for ($i=1; $i <= $lastPage; $i++) {

            $selected = ($i == $pn) ? "selected" : "";
               
           

        $paginationControls .= '<option ' . $selected . ' value="' . $i . '">' . $i . '</option>';
    }

    $paginationControls .= '</select>';
}


$limit = "LIMIT " . ($pn-1) * $perPage . ', ' . $perPage;
echo $limit;
$query2 = $dbh->prepare("SELECT ContactName FROM Customers " . $limit . "");
$query2->execute();


$outputList = '';
while ($row = $query2->fetch(PDO::FETCH_OBJ)) {

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

    $(function(){

        $('#jumpToPage').on('change', function(){

            var $toPage = $(this). val();

            window.location.href="<?=$_SERVER['PHP_SELF']?>?pn=" + $toPage + "";
        });
    });
</script>
</head>

<body>

<?
    echo $paginationControls;
    echo $outputList;


?>
    
</body>
</html>