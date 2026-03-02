<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    // GET /api/projects/{id}/tickets
    public function indexByProject($id)
    {
        $project = Project::findOrFail($id);

        return TicketResource::collection($project->tickets);
    }

    // POST /api/projects/{id}/tickets
    public function storeByProject(Request $request, $id)
    {
        $project = Project::findOrFail($id); // regra: não cria se projeto não existir

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $ticket = $project->tickets()->create($data);

        return new TicketResource($ticket);
    }

    // GET /api/tickets/{id}
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return new TicketResource($ticket);
    }

    // PATCH /api/tickets/{id}
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $ticket->update($data);

        return new TicketResource($ticket);
    }

    // DELETE /api/tickets/{id}
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return response()->json(null, 204);
    }
}