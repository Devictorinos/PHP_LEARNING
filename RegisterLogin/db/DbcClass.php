<?php
/**
 *
 * @autor viktorino
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 * @param string $host
 * @param string $dbName
 * @param string $user
 * @param string $password
 */

namespace db;

use PDO;
use PDOException;

/**
 * Folder Name Of Register Class 
 */
use register\RegisterClass as RegisterClass;
use CheckValid;

class DbcClass
{

    private $dbh;

    public function __construct($host, $dbName, $user, $password)
    {
        $dbc = "mysql:host={$host};dbname={$dbName};charset=utf8";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            $this->dbh = new PDO($dbc, $user, $password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }


    public function registerNewUser($registerData, $errors = false)
    {
        return new RegisterClass($this->dbh, $registerData, $errors);
    }

    public function loginUser()
    {
        return new Login();
    }
}
