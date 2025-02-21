<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            //'project_id' => 'required|exists:projects,id', // Ensure the project exists
        ]);


        $project->tasks()->create($request->only('title', 'description', 'due_date'));

        $message = "created task successfully";
        return response()->json($message);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date' // Ensure the project exists
        ]);

        $task->update($request->only('title', 'description', 'due_date'));

        $message = "updated task successfully";
        return response()->json($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        $message = "deleted task successfully";
        return response()->json($message);
    }
}
