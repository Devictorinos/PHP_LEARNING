<?php

$db = mysqli_connect("localhost", "root", "123", "sqltests");

if ($db) {
    echo "connected";
} else {
    echo "error with connect to data bas";
}


$sql = "INSERT INTO ClicksPerDay (`BannerID`, `clicks`, `Date`)
      VALUES ('3456', '8', '2014-01-17')";
$result = mysqli_query($db, $sql);

$sql = "INSERT INTO ClicksPerDay (`BannerID`, `clicks`, `Date`) 
         VALUES ('3457', '6', '2014-01-17')";
$result = mysqli_query($db, $sql);

if ($result) {
    echo "insert success";
} else {
    die(mysqli_error($db));
}

$totalsArray = Array();
$sql = "SELECT Clicks as sales, date(Date) as salesDate
        FROM ClicksPerDay
        WHERE BannerID = 3456
        GROUP BY salesDate DESC
        ORDER BY salesDate DESC";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($result)) {

    $totalsArray[$row['salesDate']]['sales'] = $row['sales'];
    $totalsArray[$row['salesDate']]['rents'] = 0;
}
echo "================================";
$sql = "SELECT Clicks as rents, date(Date) as rentsDate
        FROM ClicksPerDay
        WHERE BannerID = 3457
        GROUP BY rentsDate DESC
        ORDER BY rentsDate DESC";
$result = mysqli_query($db, $sql);

while($row = mysqli_fetch_assoc($result)) {

    $totalsArray[$row['rentsDate']]['rents'] = $row['rents'] ;
    if (!array_key_exists('sales', $totalsArray)) {

        $totalsArray[$row['rentsDate']]['sales'] = ($totalsArray[$row['rentsDate']]['sales']) ? $totalsArray[$row['rentsDate']]['sales'] : 0;
    }
}

echo "this is output<br>";



echo "<pre>" . print_r($totalsArray, true) . "</pre>";

echo '<table border="1">';
echo '<tr>
            <td>Date</td><td>Sales</td><td>Rents</td>
      </tr>';
foreach($totalsArray as $key => $val) {

    echo "<tr>";
    echo '<td>'.$key.'</td><td>'.$val['sales'].'</td><td>'.$val['rents'].'</td>';

    echo "</tr>";

}

echo "</table>";


