<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    
    public function show($id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        return response()->json($task);
    }

    //public function create()
    //{
        //return view('create');
    //} 
    


    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        // Create a new task
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();
    
        // Return a response, e.g., a JSON response
        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();
    
        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
    
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        $task->delete();
    
        return response()->json(['message' => 'Task deleted']);
    }
  // Impliment Datatable 

    public function dataTable()
    {
        return view('list');
    }

    public function getData(Request $request)
    {
        $draw 				= 		$request->get('draw'); // Internal use
        $start 				= 		$request->get("start"); // where to start next records for pagination
        $rowPerPage 		= 		$request->get("length"); // How many recods needed per page for pagination

        $orderArray 	   = 		$request->get('order');
        $columnNameArray 	= 		$request->get('columns'); // It will give us columns array
                     
        $searchArray 		= 		$request->get('search');
        $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
                                                      // which column index should be sorted 
                                                      // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name, 
                                                                  // Base on the index we get

        $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue 		= 		$searchArray['value']; // This is search value 

        $tasks_data = \DB::table('tasks');
        //$tasks_data = \DB::connection('nova')->table('tasks');
        $total = $tasks_data->count();

        $totalFilter = $total;

        $arrData = \DB::table('tasks');
       //$arrData = \DB::connection('nova')->table('tasks');
        $arrData = $arrData->get();

        $response = array(
        "draw" => intval($draw),
        "recordsTotal" => $total,
        "recordsFiltered" => $totalFilter,
        "data" => $arrData,
         );

         return response()->json($response);
    }
}
