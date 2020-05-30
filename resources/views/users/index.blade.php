@extends('app')

@section('title', 'Listar Funcionários') 

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('user.create')}}" class="btn btn-success float-right">Criar Usuário</a>
        <h2>Usuários cadastrados</h2>
        <div class="clearfix"></div>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Setor</th>
            <th>Empresa</th>
            <th>Centro de Custo</th>
            <th>E-mail Google</th>
            <th>Senha Google</th>
            <th></th>
        </tr>
    </thead>
<tbody>
    @forelse($users as $user)
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->setor}}</td>
    <td>{{$user->empresa}}</td>
    <td>{{$user->centro_custo}}</td>
    <td>{{$user->email_google}}</td>
    <td>{{$user->senha_google}}</td>
  
<td> <div class="btn-group">
<a href="{{ route('user.edit', $user->id)}}" class="btn btn-sm btn-primary mr-2"> Editar </a>
<form action="{{route('user.destroy', ['user' => $user->id])}}" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">Remover</button>
</form>
</div>
</td>
</tr>
@empty
<tr>
<td colspan="4">Nada encontrado!</td>
</tr>
@endforelse
</tbody>
</table>

@endsection
