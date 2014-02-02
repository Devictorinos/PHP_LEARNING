<?php


require_once 'db.php';
require_once 'functions.php';




if (isset($_POST['register'])) {


    $username = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    if (empty($_POST['login'])) {

        echo 'User name field Cannot be empty';

    } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['login'])) {

        echo 'Wrong characters';

    } elseif (empty($_POST['password']) || empty($_POST['repeatPassword'])) {

        echo ' You must repeat your password';

    } elseif (empty($_POST['email'])) {

        echo 'email field cannot be empty';

    } elseif (strlen($_POST['login']) > 20 || strlen($_POST['login']) < 2) {

        echo 'invalid length for User Name';

    } elseif (strlen($_POST['password']) < 6) {

        echo 'password to short !! min length 6 characters';

    } elseif ($_POST['password'] !== $_POST['repeatPassword']) {

        echo 'Passwords do not match';

    } elseif (strlen($_POST['email']) > 64) {



    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        echo 'invalid email address';

    } elseif (!empty($_POST['login']) &&
      strlen($_POST['login']) >= 2 &&
      strlen($_POST['login']) <= 64 &&
      preg_match('/^[a-z\d]{2,64}$/i', $_POST['login']) &&
      !empty($_POST['password']) &&
      !empty($_POST['repeatPassword']) &&
      $_POST['password'] === $_POST['repeatPassword'] &&
      !empty($_POST['email']) &&
      strlen($_POST['email']) <= 64 &&
      filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

          $pass = $_POST['password'];

          $password = do_hash($pass);

          $checkEmail = checkIfEmailExists($db, $email);//checking if email exists
          $checkUser =  checkIfUserExists($db, $username);//checking if user name exists
          $exists = false;//switch
          $message = '';//error message

        if ($checkUser) {

            $message =  'user exists';

            $exists = true;
        }

        if ($checkEmail) {
            $message .=  'email exists';
            $exists = true;
        }

        if ($exists) {

            echo $message;
        } else {

            $result = insertUser($db, $username, $email, $password);
  
            if ($result) {
                echo 'user add successful';
            } else {
                echo 'cannot add user';
            }
        }

    }


}//end if
