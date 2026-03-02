@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 20px;">
        <a href="/">&larr; Voltar para Projetos</a>
    </div>
    
    <h2>Tickets do Projeto #{{ $project }}</h2>

    <h3>Novo Ticket</h3>
    <input id="title" placeholder="Título do Ticket"><br>
    <input id="description" placeholder="Descrição da tarefa ou problema"><br>
    <button onclick="createTicket()" style="margin-top: 10px; background: #28a745;">Criar Ticket</button>

    <hr>

    <div id="tickets"></div>

    <script>
        const PROJECT_ID = {{ $project }};
    </script>
@endsection