<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
    <title>BLKDG Todo List App</title>
    <link rel="stylesheet" href="css/default.css">
</head>

<body>
    <div id="todo">
        <div id="add">
            <form method="POST" class="formtodo" action="add_query.php">
                <div id="submit">
                    <input type="text" class="addtodo" maxlength="100" name="task" placeholder="Add new task"
                        required />
                    <button class="btn" name="add">&gt;</button>
                </div>
        </div>
        <div id="app">
            <h1>Things to do</h1>
            <ul>
                <?php
                require 'conn.php';
                $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` DESC");
                $count = 1;
                while ($fetch = $query->fetch_array()) {
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
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>