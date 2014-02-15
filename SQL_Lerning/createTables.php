<?php
  
  namespace SQL_lerning;

  use PDO;
  use PDOException;

  $options   = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  $dbcon     = 'mysql:host=localhost;dbname=test_db;charset=utf8';
  $user      = 'root';
  $password  = '123';

try {
  
    $db  = new PDO($dbcon, $user, $password, $options);

} catch (PDOException $e) {
    
    echo $e->getMessage();
}


// $sql = 'CREATE TABLE my_employees (
//         id INT(11) NOT NULL PRIMARY KEY,
//         name VARCHAR (50) NOT NULL,
//         title VARCHAR(50) NOT NULL,
//         deptid INT(11) NOT NULL) 
//         ENGINE=InnoDB DEFAULT
//         CHARSET=utf8;
        
//         IF NOT EXISTS ALTER TABLE my_employees ADD price VARCHAR(235) NOT NULL';

// $query = $db->prepare($sql);
// $query->execute();

 $sql1 = "IF NOT EXISTS ALTER TABLE my_employees 
          ADD price VARCHAR(235) NOT NULL";

 $query1 = $db->prepare($sql1);
 $query1->execute();
