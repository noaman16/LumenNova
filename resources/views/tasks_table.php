<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks DataTable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <!-- Include other necessary stylesheets manually -->

    <style>
        /* Add custom styles to adjust the table layout */
        body {
            padding: 20px; /* Add padding to the body */
        }
        #tasks-table_wrapper {
            margin-top: 20px; /* Add margin to the top of the table wrapper */
        }
    </style>
</head>
<body>

    <div class="container">
        <table id="tasks-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <!-- Add more columns if needed -->
                </tr>
            </thead>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tasks-table').DataTable({
                ajax: '/tasks_table',
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'description' },
                    // Add more columns if needed
                ],
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'print', 'colvis'
                ]
            });
        });
    </script>

</body>
</html>
