<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> LumenNova Datatable</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap">

    <!-- <link href="{{ asset('css/jsquery.dataTables.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jsquery.dataTables.css') }}"/>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jsquery.dataTables.js') }}"></script>

</head>
<body>
    <div>
        <h2>LumenNova DataTable (Server Side Ajax)</h2>
        <table id="datatable" class="display">
            <thead>
                <tr align="left">
                    <th>ID</th>
                    <th data-sortable="true">Title</th>
                    <th data-sortable="false">Description</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>    
                    

    </div>

</body>
<script>
    $(document).ready(function(){
      $('#datatable').DataTable({
         processing: true,
         serverSide: true,
         order: [[ 0, "desc" ]],
         ajax: "{{ url('tasks_data') }}",
         columns: [
               { data: 'id' },
               { data: 'title' },
               { data: 'description' },
               { data: 'created_at' },
               { data: 'updated_at' }        
         ]
      });
    });
</script>
</html> 