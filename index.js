$(document).ready(function() {
    // ADD TASK FUNCTION
    $("#submitBtn").click(function() {
        let taskName = $("#task_name").val().trim();
        if (taskName !== "") {
            $.post("add_task.php", { task_name: taskName }, function(data) {
                location.reload(); // Reload page after adding
            });
        }
    });

    // MARK AS DONE FUNCTION
    $(document).on("click", ".complete-btn", function() {
        let taskId = $(this).data("id");
        $.post("mark_done.php", { id: taskId }, function(data) {
            location.reload(); // Reload page after marking as done
        });
    });

    // DELETE TASK FUNCTION
    $(document).on("click", ".delete-btn", function() {
        let taskId = $(this).data("id");
        $.post("delete_task.php", { id: taskId }, function(data) {
            location.reload(); // Reload page after deleting
        });
    });
});
