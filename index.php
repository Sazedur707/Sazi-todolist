<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sazi To-Do List</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body>
    <div class="container">
        <h1><span style="color: #c30026">Sazi</span> To-Do List</h1>
        <form method="post" action="index.php">
            <input type="text" name="taskInput" placeholder="Add new task...">
            <button class="button-89" type="submit" name="submit">Add Task</button>
        </form>
        <ul id="taskList">
            <?php include 'tasks.php'; ?>
        </ul>
        Total tasks remaining: <?php $totalTasks = 0;
                        if (file_exists($tasksFile)) {
                            $totalTasks = count(file($tasksFile, FILE_IGNORE_NEW_LINES));
                        }
                        echo $totalTasks; ?>
    </div>
</body>
</html>
