<?php

try {

    $db = new PDO("mysql:host=localhost;dbname=testDataBase;", "root", "123");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {

    echo $e->getMessage();
}



$name = $_POST['name'] = "tyugf";
$email = $_POST['email'] = "876jghj@xample.com";



$values = array($name, $email);
echo "<pre>" . print_r($values, true) . "</pre>";
//$sql ="SELECT userFirstName FROM users WHERE userLogin = {$name}  AND userEmail = {$email} 
//{(\$\w.*?)}

$sql ="SELECT userFirstName FROM users WHERE userLogin = {$name}  AND userEmail = {$email} ";

echo "<pre>" . print_r($sql, true) . "</pre>";

preg_match_all("/= (\w.+? )/i", $sql, $matches);

echo "<pre>" . print_r($matches, true) . "</pre>";

function doPDO($db, $sql, $values)
{

    $newValues = array();

    foreach ($values as $key => $value) {

           
            $newValues[":" . $key] = $value;
    }
    


trait User
{

}

   /* $sql = preg_replace_callback("/{(\$\w.*?)}/", function($matches) {

            //$matches = preg_replace("/{(\$\w.*?)}/", "?", $mutches);
            echo "<pre>" . print_r($matches, true) . "</pre>";
            return $matches;
    }, $sql);
*/
    $newKeys = array_keys($newValues);

    
    //$sql ="SELECT userFirstName FROM users WHERE userLogin = ".current($newKeys)."  AND userEmail = ".next($newKeys);

    

   // $query = $db->prepare($sql);
    
   // $query->execute($newValues);

   // $result = $query->fetchAll(PDO::FETCH_ASSOC);

    //echo "<pre>" . print_r($result, true) . "</pre>";
}
//
//doPDO($db, $sql, $values);