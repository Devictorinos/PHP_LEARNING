<?php

// $db = mysqli_connect("localhost", "root", "123", "northwind");
// mysqli_set_charset($db, "utf8");

//$sql = "SELECT CustomerID as 'code ', CONCAT(Address,' ',City) as 'full Address' FROM customers ";


//$sql = "SELECT  FirstName, BirthDate as 'old date', ADDDATE(BirthDate, INTERVAL 27 DAY) as 'new date' FROM employees "; // getting date + 27 day

// $sql = "SELECT  ProductID,
//                 ProductName,
//                 UnitPrice, 
//                 UnitPrice + (UnitPrice * 0.165)  as VAT,
//                 UnitsInStock,
//                 UnitsOnOrder,
//                 CAST(UnitsInStock AS SIGNED) - CAST(UnitsOnOrder AS SIGNED)  as 'Difference'
//         FROM products 
//         ";
//$result = "SET sql_mode = 'NO_UNSIGNED_SUBTRACTION'";
//

//$sql = "SELECT  FirstName, BirthDate as 'old date', ADDDATE(BirthDate, INTERVAL 27 DAY) as 'new date' FROM employees "; // getting date + 27 day

// $sql = "SELECT  ProductID,
//                 ProductName,
//                 UnitPrice, 
//                 UnitPrice + (UnitPrice * 0.165)  as VAT,
//                 UnitsInStock,
//                 UnitsOnOrder,
//                 (UnitsInStock * UnitPrice) - (UnitsOnOrder * UnitPrice)  as 'Difference'
//         FROM products 
//         ";

//$sql = "SELECT  EmployeeID, LastName, ReportsTo FROM employees WHERE ReportsTo IS NOT NULL";
//$sql = "SELECT  OrderDate, EmployeeID, OrderID, RequiredDate  FROM orders WHERE EmployeeID = 7 AND DATEDIFF(DATE(RequiredDate), DATE(OrderDate)) > 20 "; //where date difference more than 20 days
// $sql = "SELECT  ProductID, ProductName, SupplierID  
//         FROM products
//         WHERE SupplierID IN (8, 16, 21) 
//         OR UnitPrice < 10 
//         AND UnitsInStock BETWEEN 1 AND 100 
//         ORDER BY  UnitPrice ";




//var_dump($sql);

// $result = mysqli_query($db, $sql);

// if (!$result) {
//     echo "error";
// } else {
//     echo "result is working";
// }

// while ($row = mysqli_fetch_assoc($result)) {

//     $res[] = $row;

// }

$db = mysqli_connect("localhost", "root", "123", "northwind");
      mysqli_set_charset($db, "utf8");

if (!$db) {

    echo "Problem! can`t connect to Data Base ";

}


// $sql = "SELECT p.ProductName, c.Description, su.City
//         FROM products as p JOIN categories as c 
//         ON p.CategoryID = c.CategoryID JOIN suppliers as su
//         ON p.SupplierID = su.SupplierID
//         AND su.City IN ('Tokyo', 'London')";

// $sql = "SELECT  c.CompanyName, o.OrderID
//         FROM customers as c LEFT JOIN orders as o
//         ON c.CustomerID = o.CustomerID
//         ORDER BY o.OrderID ASC";


  // $sql = "SELECT  o.OrderID, o.OrderDate, o.ShipAddress, c.CustomerID, c.CompanyName, c.Phone
  //         FROM orders as o JOIN customers as c
  //         ON o.CustomerID = c.CustomerID
  //         AND o.OrderDate LIKE '1996%'
  //         AND o.CustomerID LIKE 'A%' OR o.CustomerID LIKE 'C%' ";
  // $sql = "SELECT m.LastName as worker, w.LastName as manager
  //         FROM employees as w RIGHT JOIN employees as m
  //         ON  w.EmployeeID = m.ReportsTo";
 
  // $sql = "SELECT max(UnitPrice) as 'max products pice' , avg(UnitPrice) as 'average products price', min(UnitPrice) as 'minimal product price'
  //         FROM products
  //         GROUP BY CategoryID";
  
    // $sql = "SELECT max(UnitPrice) as 'max products pice' , avg(UnitPrice) as 'average products price', min(UnitPrice) as 'minimal product price'
    //       FROM products
    //       WHERE UnitPrice > 40
    //       GROUP BY CategoryID
    //       ";
    
    $sql = "SELECT p.UnitsOnOrder as 'units in order', p.UnitsOnOrder as 'units in stock', c.CategoryName
            FROM products as p JOIN categories as c
            ON p.CategoryID = c.CategoryID
            WHERE c.CategoryName LIKE 'C%'
            AND p.UnitsOnOrder > 1
            GROUP BY c.CategoryName DESC";

            

$result = mysqli_query($db, $sql);

//var_dump($result);
if (mysqli_num_rows($result) == 0) {
 
    die('There is 0 rows ');
}

if (!$result) {

    die("error with returning data");
}

while ($row = mysqli_fetch_assoc($result)) {

    $returnedData[] = $row;

}

$_POST['name'] = "viktor";

$var = $_POST;
  
echo "<pre>";
print_r($returnedData);
echo "</pre>";
