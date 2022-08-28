<?php

$hostName = "localhost";
$userName = "root";
$pass = "password";
$db_name = "to_do_list";

try {
    $connect = new PDO("mysql:host=$hostName;dbname=$db_name", $userName, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Connection failed : " . $error->getMessage();
}
