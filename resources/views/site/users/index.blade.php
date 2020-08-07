@extends('adminlte::page')

@section('title', 'Usuários')
    
@section('content_header')
    <h1>
        Meus Usuários
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection

@section('content')

@if (session('warning'))
    <div class="alert alert-success">
        {{session('warning')}}
    </div>
@endif

<div class="card">
<div class="card-body">
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a>
                    <a class="btn btn-secondary btn-sm" href="">Ativar</a>
                    <a class="btn btn-danger btn-sm" href="">Desativar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

    {{ $users->links() }}

@endsection