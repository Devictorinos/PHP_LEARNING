<?php


//Selecting sum of clicks from one table with IF statement
$sql = "SELECT
        SUM( IF(BannerId = 3456, Clicks, 0) ) AS  sales,
        SUM( IF(BannerId = 3457, Clicks, 0) ) AS  rents
        FROM ClicksPerDay
        WHERE BannerID IN (3456, 3457)";

//select sum of clicks from one table
$sql = "SELECT
        (
          SELECT
              SUM(Clicks)
          FROM
              ClicksPerDay
          WHERE
              BannerID = 3456
        ) AS sales,
        (
          SELECT
              SUM(Clicks)
          FROM
              ClicksPerDay
          WHERE
              BannerID = 3457
        ) AS rents";