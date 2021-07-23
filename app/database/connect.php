<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "x2vR5ZyAG332saKxc";
$dbName = "restaurant";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
