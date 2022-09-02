<?php

$hostName = "localhost";
$userName = "root";
$pass = "password";
$db_name = "to_do_list";

try {
    $connect = new PDO("mysql:host=$hostName;dbname=$db_name", $userName, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connect->query("CREATE TABLE IF NOT EXISTS to_do_list.todos
(
    `id`        INT AUTO_INCREMENT,
    `title`     TEXT,
    `date_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `checked`  BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);");
} catch (PDOException $error) {
    echo "Connection failed : " . $error->getMessage();
}
