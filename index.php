<?php
// Connect to DB
require 'db_conn.php';

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
    <div class="add-section">
        <!-- Task entry form -->
        <form action="app/add.php" method="post" autocomplete="off">
            <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                <input type="text" name="title" style="border-color: #ff6666" placeholder="This field is required">
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php } else { ?>
                <input type="text" name="title" placeholder="What do you need to do?"/>
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            <?php } ?>
        </form>
    </div>
    <!-- Displaying a picture if there are no tasks -->
    <?php
    $todos = $connect->query("SELECT * FROM todos ORDER BY id DESC");
    ?>
    <div class="show-todo-section">
        <?php if ($todos->rowCount() <= 0) { ?>
            <div class="todo-item">
                <div class="empty">
                    <img src="" width="100%">
                </div>
            </div>
        <?php } ?>
    <!-- Task display -->
        <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="todo-item">
                <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>
                <?php if ($todo['checked']) { ?>
                    <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id'] ?>" checked/>
                    <h2 class="checked"><?php echo $todo['title'] ?></h2>
                <?php } else { ?>
                    <label>
                        <input type="checkbox" data-todo-id="<?php echo $todo['id'] ?>" class="check-box"/>
                        <h2 class=""><?php echo $todo['title'] ?></h2>
                    </label>
                <?php } ?>
                <br>
                <small>created: <?php echo $todo['date_time'] ?></small>
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