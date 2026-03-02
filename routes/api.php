<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TicketController;

// Projects CRUD
Route::apiResource('projects', ProjectController::class);

// Tickets aninhados
Route::apiResource('projects.tickets', TicketController::class)->only(['index', 'store']);

// Rotas diretas de tickets
Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
Route::patch('/tickets/{ticket}', [TicketController::class, 'update']);
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);