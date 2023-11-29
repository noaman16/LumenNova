<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Nova</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        h1 {
            margin: 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #3498db;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Uncomment the following block if you want to include a footer */
        /*
        footer {
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
        }
        */

        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            main {
                padding: 10px;
            }
        }
    </style>
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
                <li><a href="/tasks_table_view">View DataTable</a></li>
                <!-- <li><a href="/tasks/create">Create a New Task</a></li> -->
            </ul>
        </section> 
    </main>
    <!-- <footer>
        <p>&copy; {{ date('Y') }} Nova</p>
    </footer> -->
</body>
</html>
