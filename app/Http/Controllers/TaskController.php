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

    public function dataTable(Request $request)
    {
        $columns = [
            'id',
            'title',
            'description',
            // Add more columns if needed
        ];
    
        $query = Task::query();
    
        // Apply search
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $query->where(function ($query) use ($columns, $searchValue) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $searchValue . '%');
                }
            });
        }
    
        // Get the total count before applying pagination
        $total = $query->count();
    
        // Apply ordering
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $orderColumn = $columns[$request->input('order.0.column')];
            $orderDirection = $request->input('order.0.dir');
            $query->orderBy($orderColumn, $orderDirection);
        }
    
        // Apply pagination
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $query->skip($start)->take($length);
    
        $data = $query->get();
    
        return response()->json([
            'data' => $data,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ]);
    }
    

    public function dataTablePage()
    {
        return view('tasks_table');
    }


}
