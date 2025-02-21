<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //

    public function create(Project $project)
    {
        return view('task.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            //'project_id' => 'required|exists:projects,id', // Ensure the project exists
        ]);



        $project->tasks()->create($request->only('title', 'description', 'due_date'));

        // Redirect to the tasks index page with a success message
//        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        return redirect()->route('projects.show', $project->id)->with('success', 'Task created successfully.');
    }


    public function edit(Task $task)
    {
//        $projects = Project::all();
//        return view('task.edit', compact('task', 'projects'));
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date' // Ensure the project exists
        ]);

        $task->update($request->only('title', 'description', 'due_date'));

        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $project_id = $task->project_id;
        $task->delete();
        return redirect()->route('projects.show', $project_id)->with('success', 'Task deleted successfully.');
    }
}
