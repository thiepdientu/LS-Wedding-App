<?php

namespace App\Http\Controllers;

use App\Models\TodoTask;
use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'describe' => 'required|string|max:1000',
            'done' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);

        $task = TodoTask::create($validator);

        return response()->json([
            'code' => 1,
            'message' => 'send response success',
            'data' => $task
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoTask $todoTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $task = TodoTask::findOrFail($key);
        if (!$task) {
            abort(404, 'Task not exist');
        }
        return view('taskform', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = TodoTask::find($id);
        if (!$task) {
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ], 404);
        }

        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'describe' => 'required|string|max:1000',
            'done' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'email' => 'required|string|max:255'
        ]);
        
        $task->update($validator);
        return response()->json([
            'code' => 1,
            'message' => 'Update task success' ,
            'data' => $task
        ]);
    }


    public function getListTaskForMail($key)
    {
       
        $task = TodoTask::where('email', $key)->get();

        return response()->json([
            'code' => 1,
            'message' => 'Success',
            'data' => $task
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoTask $todoTask)
    {
        //
    }
}
