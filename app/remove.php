<?php

if (isset($_POST['id'])) {
    require '../db_connection.php';

    $id = $_POST['id'];

    if (empty($id)) {
        echo 0;
    } else {
        $statement = $connect->prepare("DELETE FROM todos WHERE id=?");
        $res = $statement->execute([$id]);

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }

        $connect = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
