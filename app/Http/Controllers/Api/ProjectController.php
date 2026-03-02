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

        // filtro por nome
        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $projects = $query->paginate(10);

        return ProjectResource::collection($projects);
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

    // GET /api/projects/{id}
    public function show($id)
    {
        $project = Project::with('tickets')->findOrFail($id);

        return new ProjectResource($project);
    }

    // PUT /api/projects/{id}
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update($data);

        return new ProjectResource($project);
    }

    // DELETE /api/projects/{id}
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully'
        ], 204);
    }
}