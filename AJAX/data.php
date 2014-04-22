<?php

$dbh = new PDO("mysql:host=localhost;dbname=northwind;charset=utf8", "root", "123", array(PDO::ATTR_PERSISTENT => true));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $dbh->prepare("SELECT * FROM `categories`");
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

$jsonData = json_encode( $categories );
header( 'Content-Type: application/json' );
print( $jsonData );