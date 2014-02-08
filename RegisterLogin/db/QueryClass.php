<?php

/**
 * Nice DB Work class.
 *
 * @package Nice DB Work
 * @author Viktor Lubchuk <viktorlubchuk@gmail.com>
 *
 * 
 */

namespace db;

use PDO;

abstract class QueryClass
{
    protected $dbh;
    public $registerData = array();
    public $displayErrors;
    protected $userFirstName;
    protected $userLastName;
    protected $userEmail;
    protected $userPassword;
   // protected $userRepeatPassword;
    protected $userIP;
    protected $userRegisterDate;
    protected $passwordHash;
   // protected $EmailHash;
  //  protected $unicNum;
    protected $passPrefix = "pdo_";
    public $errors = array();
    protected $params = array();
    protected $values = array();
    protected $fields = array();


    public function __construct($dbh, array $registerData, $displayErrors)
    {
        $this->dbh    = $dbh;
        $this->registerData    = $registerData;
        $this->displayErrors    = $displayErrors;


        // if (!empty($this->errors) && $this->displayErrors === true) {

        //     echo "<pre>" . print_r($this->errors, true) . "</pre>";
        // }



    }
}
