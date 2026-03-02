<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TicketController;

// Projects CRUD
Route::apiResource('projects', ProjectController::class);

// Tickets aninhados (nested routes)
Route::apiResource('projects.tickets', TicketController::class);