<?php


if (isset($_COOKIE['UserLogin'])) {

    $user = $_COOKIE['UserLogin'];
}

$user = unserialize($user);


echo "<pre>" . print_r($user, true) . "</pre>";

?>
