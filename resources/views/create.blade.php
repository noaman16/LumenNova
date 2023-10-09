<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>
    <form action="{{ url('/tasks') }}" method="POST">
        @csrf <!-- Add CSRF token for security -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <input type="submit" value="Create Task">
    </form>
</body>
</html>
