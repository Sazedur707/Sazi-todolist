<?php
$tasksFile = 'tasks.txt';

// task dew
if (isset($_POST['submit'])) {
    $task = $_POST['taskInput'];

    if (!empty($task)) {
        $task = htmlspecialchars($task);
        file_put_contents($tasksFile, $task . PHP_EOL, FILE_APPEND);
    }
}

// Delete maro
if (isset($_POST['delete'])) {
    $deleteIndex = $_POST['delete'];
    if (file_exists($tasksFile)) {
        $tasks = file($tasksFile, FILE_IGNORE_NEW_LINES);
        if (isset($tasks[$deleteIndex])) {
            unset($tasks[$deleteIndex]);
            file_put_contents($tasksFile, implode(PHP_EOL, $tasks));
        }
    }
}

//task gula dekha
if (file_exists($tasksFile)) {
    $tasks = file($tasksFile, FILE_IGNORE_NEW_LINES);
    foreach ($tasks as $index => $task) {
        $taskId = "task_$index";
        echo "<li>";
        echo "<input type='checkbox' id='$taskId' name='done' onclick='updateTask($index)' />";
        echo "<label for='$taskId'>$task</label>";
        echo "<form method='post' action='index.php'>";
        echo "<input type='hidden' name='delete' value='$index'>";
        echo "<br><button class='delete_button' type='submit'>Delete</button>";
        echo "</form>";
        echo "</li>";
    }
}
?>

<!-- bockchod php diye hoi nah  -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("click", function(event) {
        if (event.target.matches('input[type="checkbox"]')) {
            var checkbox = event.target;
            var label = checkbox.nextElementSibling;

            if (checkbox.checked) {
                checkbox.disabled = true;
                label.classList.add("completed-task");
            } else {
                checkbox.disabled = false;
                label.classList.remove("completed-task");
            }
        }
    });
});
</script>
