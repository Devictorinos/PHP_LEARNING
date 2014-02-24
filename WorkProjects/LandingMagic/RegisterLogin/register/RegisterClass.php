<?php
/**
 *
 *
 *
 *
 */

namespace register;

use db;
use PDO;
use PDOEcxception;
use Exception;

class RegisterClass extends db\QueryClass
{

    
    /*** executing All Methods when declaring Object ***/
    public function __construct($db, $array, $displayErrors)
    {
        parent::__construct($db, $array, $displayErrors);

        $this->checkFirstandLastName($this->registerData['userFirstName'], $this->registerData['userLastName']);
        $this->checkEmail($this->registerData['userEmail']);
        $this->checkPassword($this->registerData['userPassword'], $this->registerData['userRepeatPassword']);
        $this->userIP = $this->registerData['userIP'];
        $this->userRegisterDate = $this->registerData['userRegisterDate'];
        $this->checkUserLogin($this->registerData['userLogin']);

        /*** Display errors Array if exists ***/
        if (!empty($this->errors) && $this->displayErrors === true) {
                     echo "<pre>" . print_r($this->errors, true) . "</pre>";


        }
        

            
        
    }

    /*** Checking First Name and Last Name ***/
    private function checkFirstandLastName($fName, $lName)
    {
        
        if (empty($fName) || empty($lName)) {

            $this->errors[] = "Error: User First Name or Last Name can`t be empty! check received data ";

        }

        if ((!empty($fName) && (strlen($fName) <= 3 || strlen($fName) >= 20))
               || (!empty($lName) && (strlen($lName) <= 3 || strlen($lName) >= 20))) {

            $this->errors[] = "Error: First and Last Name must contain minimum 3 and maximum 20 letters! check received data";

        }

        if (!preg_match("/^[\w\d_]{3,20}$/i", $fName) || !preg_match("/^[\w\d_]{3,20}$/i", $lName)) {

            $this->errors[] = "Error: Invalid Characters in First Name or Last Name! check received data";

        } else {
            
            
            $this->userFirstName = $fName;
            $this->userLastName  = $lName;
            return $this;
        }
            
        
    }

    /*** Checking User Login ***/
    private function checkUserLogin($login)
    {
        $sql = "SELECT * FROM `users` WHERE `userLogin` LIKE ? ";

        $query = $this->dbh->prepare($sql);
        $query->bindParam(1, $login, PDO::PARAM_STR);
        $query->execute();
        $Login = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($Login) {

            $_SESSION['errorLogin'] = "Error:  Login  already Exists!";
            $this->errors[] =  "Error:  Login  already Exists!";
        }
        
    }

    /*** Checking Email ***/
    private function checkEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $this->errors[] =  "Error: Invalid Email Address! check received Data";

        } else {

            $sql = "SELECT * FROM `users` WHERE `userEmail`= ? ";

            $query = $this->dbh->prepare($sql);
            $query->bindValue(1, $email, PDO::PARAM_STR);
            $query->execute();
            $Email = $query->fetchAll(PDO::FETCH_ASSOC);
            
            if ($Email) {

                $_SESSION['errorEmail'] = "Error:  Email Address already Exists!";
                $this->errors[] =  "Error:  Email Address already Exists!";
            } else {
                $this->userEmail = $email;
                return $this;
            }


        }

    }

    /*** Checkin password ***/
    private function checkPassword($userPassword, $userRepeatPassword)
    {
        if (empty($userPassword) || empty($userRepeatPassword)) {

            $this->errors[] = "Error: Password fields can`t be Empty! check received data";
        }

        if ((!empty($userPassword) && strlen($userPassword) <= 5)
        || (!empty($userRepeatPassword) && strlen($userRepeatPassword) <= 5)) {
            
            $this->errors[] = "Error: password must contain minimum 6 character";
        }

        if ($userPassword !== $userRepeatPassword) {

            $this->errors[] = "Error: password fields not match! check received data";

        } else {

            unset($this->registerData['userRepeatPassword']);
            $this->userPassword = $userPassword;
            
            return $this->doHashing($userPassword);// Do hashing to password
        }
    }

    /*** Hashing password ***/
    private function doHashing($userPassword)
    {
        $this->passwordHash = $this->passPrefix.md5(sha1(md5($userPassword)));
        return $this;
    }

    // private function checkExistingData($data)
    // {
    //     $sql = "SELECT * FROM `users` WHERE "

    // }

    // //generating password "password for users that forgot it"
    // private function unicNum($password)
    // {
    //     $cryptingArray = array( "1","2","3","4","5","6","7","8","9","0","!","@","#","$","%","^","&","*","(",")","_+",
    //                             "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
    //                             "A","B","S","D","E","F","J","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

    //     shuffle($cryptingArray);

    //     foreach (array_rand($cryptingArray, 10) as $key) {

    //         $this->unicNum .= $cryptingArray[$key];
    //     }
        
         
    //     return $this;
    // }
    
    

    /*** Building query ***/
    private function buildQuery()
    {

        

        if (array_key_exists('userPassword', $this->registerData)) {

            $this->registerData['userPassword'] = $this->passwordHash;
        }

        $this->fields = array_keys($this->registerData);
        $this->values = array_values($this->registerData);

        $this->params = array_map(function ($val) {

            //@^\d{1,2}[-]\d{1,2}[-]\d{2,4} \d{2}:\d{2}:\d{2}@
            ///^\d+(-)\d+(-)\d+( \d+(:\d+:\d+))$/
            //@^\d{1,2}[-]\d{1,2}[-]\d{2,4} \d{2}:\d{2}:\d{2}@/
            //%H:%i:%s %p
            if (preg_match("/^\d+(-)\d+(-)\d+( \d+(:\d+:\d+))$/", $val)) {
                    
                    return "STR_TO_DATE( ? , '%d-%m-%Y %H:%i:%s %p')";

            } else {
                return "?";
            }
            
            

        }, $this->values);

        $fields = implode(",", $this->fields);
        $values = implode(",", $this->params);
        
        $this->sql  = "INSERT INTO `users` (${fields})\n";
        $this->sql .= "VALUES ($values)";

        return array($this->sql, $this->values);
    }

    /*** Executing Query  IF errors array is empty ***/
    public function runSQL()
    {

        if (empty($this->errors)) {


            list($sql, $values) = $this->buildQuery();

            $this->dbh->beginTransaction();

            try {

                $query = $this->dbh->prepare($sql);
        
                foreach ($this->values as $key => &$val) {
                  
                    $type = is_bool($val)    ? PDO::PARAM_BOOL : PDO::PARAM_STR;
                    $type = is_null($val)    ? PDO::PARAM_NULL : PDO::PARAM_STR;
                    $type = is_integer($val) ? PDO::PARAM_INT : PDO::PARAM_STR;

                    $query->bindParam($key+1, $val, $type);

                }
                    $query->execute();
                    $this->dbh->commit();
                    return true;

            } catch (PDOException $e) {

                $this->dbh->rollBack();
                echo $e->getMessage();
                
            }

            
        } else {
            
            return false;
        }

    }
}
