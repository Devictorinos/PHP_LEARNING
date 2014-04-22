<?php

namespace myProjects;

use PDO;

class Validator
{
    private $_var;
    private $_vars;

    public function ifInt($num)
    {
        if (is_array($num)) {

            foreach ($num as $number) {

                if (is_int((int)$number) && is_numeric($number) && preg_match("/^[0-9]/", $number) && intval((int)$number) === (int)$number) {
                    $this->_vars = true;
                } else {
                    $this->_vars = false;
                    return $this->_vars;
                    break;
                }
            }

            return $this->_vars;

        } else {

            if (is_int((int)$num) && is_numeric($num) && preg_match("/^[0-9]/", $num) && intval((int)$num) === (int)$num) {

                $this->_var = true;
                return $this->_var;
            } else {
                $this->_var = false;
                return $this->_var;
            }

        }
    }

    public function cleanStr($str)
    {
        if (is_array($str)) {
        
            $str = array_map(function ($key) {

                return trim(strip_tags(stripslashes($key)));

            }, $str);

            return $str;

        } else {

            $str = trim(strip_tags(stripslashes($str)));
            return $str;

        }

    }
}

$valid  = new Validator();

$num = 5;
$num1 = "5";
$arr = array(1, 4, "564565hg6546445654", 4, 5, 8);
$arr1 = array(1, 4, "5646445654", 4, 5, 8);
$str = "victor";
$strArr = array("vik","t/k", "lek\dd");

echo "<pre>" . print_r($valid->ifInt($num), true) . "</pre>";
echo "<pre>" . print_r($valid->ifInt($arr), true) . "</pre>";


//$valid->cleanStr($str);
echo "<pre>" . print_r($valid->cleanStr($str), true) . "</pre>";
echo "<pre>" . print_r($valid->cleanStr($strArr), true) . "</pre>";

?>