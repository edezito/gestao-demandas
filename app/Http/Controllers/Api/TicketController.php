<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    // GET /api/projects/{project}/tickets
    public function index(Project $project)
    {
        return TicketResource::collection(
            $project->tickets()->paginate(10)
        );
    }

    // POST /api/projects/{project}/tickets
    public function store(Request $request, Project $project)
    {
        // regra: não cria se projeto não existir (já garantido pelo Model Binding)
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $ticket = $project->tickets()->create($data);

        return new TicketResource($ticket);
    }

    // GET /api/tickets/{ticket}
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    // PATCH /api/tickets/{ticket}
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $ticket->update($data);

        return new TicketResource($ticket);
    }

    // DELETE /api/tickets/{ticket}
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(null, 204);
    }
}