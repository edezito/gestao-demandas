@extends('layouts.app')

@section('content')
    <h2>Projetos</h2>

    <div style="display: flex; gap: 10px; align-items: center;">
        <input id="search" placeholder="Buscar projeto pelo nome...">
        <button onclick="loadProjects()">Buscar</button>
    </div>

    <hr>

    <h3>Novo Projeto</h3>
    <input id="name" placeholder="Nome do Projeto"><br>
    <input id="description" placeholder="Descrição do Projeto"><br>
    <button onclick="createProject()" style="margin-top: 10px; background: #28a745;">Criar Projeto</button>

    <hr>

    <div id="projects"></div>
    
    <div id="pagination" style="margin-top: 20px; text-align: center;"></div>
@endsection