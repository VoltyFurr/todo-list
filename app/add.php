<?php

if (isset($_POST['title'])) {
    require '../db_connection.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header("Location: ../index.php?mess=error");
    } else {

        $statement = $connect->prepare("INSERT INTO todos(title) VALUE (?)");
        $res = $statement->execute([$title]);

        if ($res) {
            header("Location: ../index.php?mess=success");
        } else {
            header("Location: ../index.php");
        }

        $connect = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}

