<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>BLKDG Todo List App</title>
    <link rel="stylesheet" href="css/default.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    <link rel="manifest" href="/img/site.webmanifest">
</head>

<body>
    <div id="todo">
        <div id="add">
            <form method="POST" class="formtodo" action="add_query.php">
                <div id="submit">
                    <input type="text" class="addtodo" maxlength="100" name="task" placeholder="Add new task" autofocus required />
                    <button class="btn" name="add">&gt;</button>
                </div>
        </div>
        <div id="app">
            <h1>Things to do</h1>
            <ul>
                <?php
                require 'conn.php'; // connect class is $conn
                $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` DESC"); // mysql query task items
                $count = 1;
                while ($fetch = $query->fetch_array()) { // fetch task items from database and create array

                    // start todo item loop

                ?>
                    <li>
                        <?php
                        if ($fetch['status'] != "Done") {
                            echo
                            '<a href="update_task.php?task_id=' . $fetch['task_id'] . '&status=Incomplete"><img src="img/check-off.png" /></span></a>';
                        } else {
                            echo '<a href="update_task.php?task_id=' . $fetch['task_id'] . '&status=Done"><img src="img/check-on.png" /></span></a>';
                        }
                        ?>
                        <label for="check"><span>
                                <?php
                                if ($fetch['status'] != "Done") {
                                    echo $fetch['task'];
                                } else {
                                    echo '<strike>' . $fetch['task'] . '</strike>';
                                }

                                ?></span>
                            <a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="delete">x</a>
                        </label>
                    </li>
                <?php

                } // end todo item loop
                ?>

            </ul>
        </div>
    </div>
</body>

</html>