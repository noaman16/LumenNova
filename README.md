# DataTables Server-Side Processing

This branch introduces server-side processing for DataTables in the TaskController of the Lumen application. The changes enhance the efficiency of data retrieval, search, sort, and pagination by offloading these operations to the server.

## Changes Made

- Updated the `dataTable` method in the TaskController to handle server-side processing.
- Modified the DataTable initialization script in `resources/views/tasks_table.php` to enable server-side configuration.

## Usage

1. **TaskController Changes:**
   - The `dataTable` method in `TaskController` now processes DataTables requests on the server side, allowing for efficient data retrieval.

2. **View Changes:**
   - The DataTable initialization script in `resources/views/tasks_table.php` has been updated to indicate server-side processing:
     ```javascript
     $(document).ready(function() {
         var table = $('#tasks-table').DataTable({
             serverSide: true,
             // Other configurations...
         });
     });
     ```

## How to Verify

To verify that DataTables is using server-side processing:

1. Open your browser's Developer Tools (`Ctrl + Shift + I` or `Cmd + Opt + I`).
2. Navigate to the DataTable on the specified page (e.g., `http://example.local.com/tasks_table_view`).
3. Open the "Console" tab in Developer Tools.
4. Check for AJAX requests to the server (e.g., `/tasks_table`) when loading or interacting with the DataTable.

## Notes

- Ensure that your TaskController routes are correctly configured in `routes/web.php`.
- Adjust the DataTables initialization script if additional customization is required.

Feel free to reach out if you encounter any issues or have further questions.
