<?php
include 'db.php';

// Fetch tasks
$stmt = $conn->prepare("SELECT * FROM tasks ORDER BY created_at DESC");
$stmt->execute();
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/effd3867de.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <main>
        <div class="header">
            <h1>To do List</h1>
            <input type="text" id="task_name" placeholder="Enter task">
            <button id="submitBtn">Create</button>
        </div>

        <div class="content">
            <h2>Task Lists</h2>
            <div id="todoContainer">
                <?php foreach ($tasks as $task) : ?>
                    <?php if ($task['status'] !== 'completed') : ?>
                        <p>
                            <?= htmlspecialchars($task['task_name']) ?>
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
                    <div class="pending">
            <h2>Pending Tasks</h2>
<div id="pendingContainer">
    <?php foreach ($tasks as $task) : ?>
        <?php if ($task['status'] == 'pending') : ?>
            <p><?= htmlspecialchars($task['task_name']) ?> 
                <form action="complete_task.php" method="POST" style="display:inline;">
                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                    <button type="submit">Done</button>
                    
                    <button class="delete-btn" data-id="<?= $task['id'] ?>">Delete</button>
                </form>
            </p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
        </div>
        <div class="completed">
<h2>Completed Tasks</h2>
<div id="completedContainer">
    <?php foreach ($tasks as $task) : ?>
        <?php if ($task['status'] == 'completed') : ?>
            <p><del><?= htmlspecialchars($task['task_name']) ?></del></p>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
        </div>
    </main>

    <script src="index.js"></script>
</body>
</html>
