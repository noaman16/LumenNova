<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>

    <form method="POST" action="/tasks/create">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>

        <button type="submit">Create Task</button>
    </form>
</body>
</html>
