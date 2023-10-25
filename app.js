document.addEventListener("DOMContentLoaded", function () {
    // Function to fetch and list tasks
    function listTasks() {
        fetch("/tasks")
            .then((response) => response.json())
            .then((data) => {
                const taskList = document.getElementById("task-list");
                taskList.innerHTML = ""; // Clear the existing list
                data.forEach((task) => {
                    const listItem = document.createElement("li");
                    listItem.textContent = task.title;
                    taskList.appendChild(listItem);
                });
            });
    }

    // List tasks when the page loads
    listTasks();

    // Handle task creation form submission
    const taskForm = document.getElementById("task-form");
    taskForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;

        fetch("/tasks", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ title, description }),
        })
            .then((response) => response.json())
            .then(() => {
                // Clear form fields and list tasks again
                document.getElementById("title").value = "";
                document.getElementById("description").value = "";
                listTasks();
            });
    });
});
