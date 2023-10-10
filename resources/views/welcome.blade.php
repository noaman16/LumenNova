<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nova</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to Nova</h1>
    </header>
    <main>
        <section>
            <h2>About Nova</h2>
            <p>Nova is an amazing application for managing tasks and staying organized. It provides CRUD operations for tasks and more.</p>
        </section>
        <section>
            <h2>Get Started</h2>
            <p>To get started, you can explore the following:</p>
            <ul>
                <li><a href="/tasks">View Tasks</a></li>
                <li><a href="/tasks/create">Create a New Task</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} Nova</p>
    </footer>
</body>
</html>
