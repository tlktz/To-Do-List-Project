<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];

    if (!empty($task_name)) {
        $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (:task_name)");
        $stmt->bindParam(':task_name', $task_name);
        $stmt->execute();
    }
}
?>
