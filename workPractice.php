<?php

$dataHandler = array();
$idsHandler   = array();
$dbh = new PDO("mysql:host=localhost;dbname=northwind;charset=utf8", "root", "123", array(PDO::ATTR_PERSISTENT => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $dbh->prepare("SELECT * FROM `Categories`");
$query->execute();
//$categories = $query->fetchAll(PDO::FETCH_ASSOC);
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

    $idsHandler[$row['CategoryID']] = $row['CategoryID'];
    $dataHandler[] = $row;
    
}

echo "<pre>" . print_r($idsHandler, true) . "</pre>";
echo "<pre>" . print_r($dataHandler, true) . "</pre>";
