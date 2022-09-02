<?php
// Connect to DB
require 'db_connection.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do list</title>
    <!-- Connect CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
<div class="main-section">
    <h1 class="title-text">To-do list</h1>
    <div class="add-section">
        <!-- Task entry form -->

        <form action="app/add.php" method="post" autocomplete="off">
            <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                <label>
                    <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required">
                </label>
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php } else { ?>
                <label>
                    <input type="text" name="title" placeholder="What do you need to do?"/>
                </label>
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php } ?>
        </form>
    </div>
    <!-- Selecting records from the database by id -->
    <?php
    $todos = $connect->query("SELECT * FROM todos ORDER BY id DESC");
    ?>
    <div class="show-todo-section">
        <!-- Task display -->
        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item">
                <span id="<?= $todo['id']; ?>" class="remove-to-do">x</span>
                <?php if ($todo['checked']) { ?>
                    <label>
                        <input type="checkbox" class="check-box" data-todo-id="<?= $todo['id'] ?>" checked/>
                        <h2 class="checked"><?= $todo['title'] ?></h2>
                    </label>
                <?php } else { ?>
                    <label>
                        <input type="checkbox" data-todo-id="<?= $todo['id'] ?>" class="check-box"/>
                        <h2 class=""><?= $todo['title'] ?></h2>
                    </label>
                <?php } ?>
                <br>
                <small>created: <?= $todo['date_time'] ?></small>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Connect JQuery -->
<script src="js/jquery-3.6.1.min.js"></script>
<!-- Connect JS -->
<script src="js/script.js"></script>
</body>
</html>