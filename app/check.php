<?php

if (isset($_POST['id'])) {
    require '../db_connection.php';

    $id = $_POST['id'];


    if (empty($id)) {
        echo 'error';
    } else {
        $todos = $connect->prepare("SELECT id, checked FROM todos WHERE id=?");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $userId = $todo['id'];
        $checked = $todo['checked'];

        $userChecked = $checked ? 0 : 1;

        $query = "UPDATE todos SET checked=$userChecked WHERE id=$userId";

        $res = $connect->query($query);


        if ($res) {
            echo $checked;
        } else {
            echo "error";
        }
        $connect = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
