<?php

use Illuminate\Support\Facades\Route;

// Tela 1: Lista de Projetos
Route::get('/', function () {
    return view('projects');
});

// Tela 2: Lista de Tickets de um Projeto Específico
Route::get('/tickets/{project}', function ($project) {
    return view('tickets', ['project' => $project]);
});