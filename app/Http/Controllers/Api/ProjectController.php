<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $logedUser = Auth::id();
        $projects = Project::query()
            ->where('user_id', $logedUser)
            ->get();
        //$projects = Project::all();

        return JsonResource::collection($projects);
//        return Project::where('user_id', Auth::id())->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return JsonResource::make($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //$this->authorize('view', $project);
        $project->loadMissing('tasks');
        $project->loadMissing('user');
        return JsonResource::make($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //$this->authorize('update', $project);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($request->only('name', 'description'));
        return JsonResource::make($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $message = "deleted successfully";
        return JsonResource::make($message);
    }
}
