<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    // GET /api/projects?q=texto
    public function index(Request $request)
    {
        $query = Project::query();

        // Filtro por nome
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        return ProjectResource::collection(
            $query->paginate(10)
        );
    }

    // POST /api/projects
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project = Project::create($data);

        return new ProjectResource($project);
    }

    // GET /api/projects/{project}
    public function show(Project $project)
    {
        $project->load('tickets');

        return new ProjectResource($project);
    }

    // PUT /api/projects/{project}
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($data);

        return new ProjectResource($project);
    }

    // DELETE /api/projects/{project}
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully'
        ], 204);
    }
}