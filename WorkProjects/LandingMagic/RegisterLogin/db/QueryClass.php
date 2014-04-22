<?php

/**
 * Nice DB Work class.
 *
 * @package Landing Magic Query Class
 * @author Viktor Lubchuk <viktorlubchuk@gmail.com>
 *
 *
 *
 *
 *@param object        $dbh
 *@param string        $userFirstname
 *@param string        $userLastName 
 *@param string        $userEmail  
 *@param string        $userPassword
 *@param string        $userIP
 *@param string | Date $userRegisterDate
 *@param string        $passwordHash
 *@param string        $passPrefix
 *@param boolean       $displayErrors 
 *@param array         $errors
 *@param array         $values      
 *@param array         $fields      
 *
 */

namespace db;

use PDO;

abstract class QueryClass
{
    protected $dbh;
    protected $userFirstName;
    protected $userLastName;
    protected $userEmail;
    protected $userPassword;
    protected $userIP;
    protected $userRegisterDate;
    protected $passwordHash;
    protected $passPrefix = "pdo_";
    public $registerData = array();
    public $displayErrors;
    public $errors = array();
    protected $params = array();
    protected $values = array();
    protected $fields = array();


    public function __construct($dbh, array $registerData, $displayErrors = false)
    {
        $this->dbh    = $dbh;
        $this->registerData    = $registerData;
        $this->displayErrors    = $displayErrors;

    }
}
