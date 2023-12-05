// config/datatables.php

return [
    'models' => [
        'Task' => App\Models\Task::class,
    ],
    'dataTables' => [
        'engine' => 'eloquent',
        'builder' => Yajra\DataTables\EloquentDataTable::class,
        'minified' => false,
        'extensions' => [],
        'search' => [
            'smart' => true,
            'case_insensitive' => true,
            'exact' => true,
        ],
        'order' => [
            'order' => 'asc',
            'start' => 0,
            'length' => 10,
            'max_length' => 500,
            'sortable' => true,
            'render' => null,
            'hypertext' => true,
            'auto' => true,
            'filter' => null,
        ],
        'fractal' => [
            'error' => 'Fractal transformer not found!',
        ],
        'cache' => [
            'enabled' => true,
            'repository' => 'yajra',
            'lifetime' => 60,
            'driver' => 'file',
            'key' => null,
            'hashed' => false,
            'prefix' => 'datatables_',
            'reset' => false,
        ],
        'pdf' => [
            'enabled' => false,
            'binary' => 'vendor/wemersonjanuario/wkhtmltopdf-windows/bin/64bit/wkhtmltopdf-amd64.exe',
            'timeout' => 60,
            'options' => [],
            'env' => [],
        ],
        'csv' => [
            'delimiter' => ',',
            'enclosure' => '"',
            'line_ending' => PHP_EOL,
            'use_bom' => true,
            'include_headings' => false,
            'filename' => null,
        ],
        'views' => [
            'enabled' => false,
            'paths' => [],
        ],
    ],
];
