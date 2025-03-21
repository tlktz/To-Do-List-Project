<?php
require 'db.php'; // Siguraduhin na naka-connect sa database

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    // I-update ang status ng task na "completed"
    $stmt = $conn->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
    $stmt->execute([$task_id]);

    // Ibalik sa index.php
    header("Location: index.php");
    exit();
}
?>
