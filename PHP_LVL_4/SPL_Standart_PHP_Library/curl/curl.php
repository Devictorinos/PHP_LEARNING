<?php
/**
 * Created by PhpStorm.
 * User: victorino
 * Date: 5/27/14
 * Time: 11:31 PM
 */

$names = $_POST['name'];
$ages = $_POST['age'];
$drivers = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

$db = new PDO("mysql:host=localhost;dbname=people;charset=utf8", "root", "123", $drivers);

$sql = "INSERT INTO `name` ( `name`, `email`) VALUES ('".$names."', '".$ages ."')";

$query = $db->prepare($sql);
$query->execute();