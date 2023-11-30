<!-- resources/views/table.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Table</title>
    <!-- Include Bootstrap CSS and DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables Column Filtering CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/css/fixedColumns.bootstrap4.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </tfoot>
                <tbody>
                <!-- The data will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap JS, DataTables JS, and DataTables Buttons JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include DataTables Column Filtering JS -->
<script src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['colvis', 'excel', 'print', 'csv'],
            processing: true,
            serverSide: true,
            ajax: {
                url: '/tasks_table', // Update this with your Lumen route for fetching tasks
                type: 'GET',
            },
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'description'},
            ],
            colReorder: true, // Enable column reordering
            fixedColumns: true, // Enable fixed columns
        });

        // Add column filtering inputs
        $('#myTable tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        });

        // Apply the search
        table.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });
</script>

</body>
</html>
