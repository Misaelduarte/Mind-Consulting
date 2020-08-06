@extends('adminlte::page')

@section('title', 'Editar Usuário')
    
@section('content_header')
    <h1>Editar Usuário</h1>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
          <h5><i class="icon fas fa-ban"></i>Ocorreu um erro!</h5>

          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-success">
        {{session('alert')}}
    </div>
@endif

<div class="card">
<div class="card-body">
  <form method="POST" class="form-horizontal" action="{{route('users.update', ['user'=>$user->id])}}">
    @method('PUT')
    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nome Completo</label>

          <div class="col-sm-10">
            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
          </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">CPF</label>

          <div class="col-sm-10">
            <input type="text" name="cpf" value="{{ $user->cpf }}" class="form-control @error('cpf') is-invalid @enderror" disabled>
          </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">E-mail</label>

          <div class="col-sm-10">
            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
          </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nova Senha</label>

          <div class="col-sm-10">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
          </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>

          <div class="col-sm-10">
            <input class="btn btn-success" type="submit" value="Salvar">
          </div>
    </div>
</form>
</div>
</div>
  
@endsection

@section('js')
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById("inputCpf"),
        {mask: '000.000.000-00'}
    );
</script>
@endsection 