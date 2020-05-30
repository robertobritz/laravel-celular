@extends('app')

@section('content')

<form action="{{route('user.update', $user->id)}}" method="post">
    @method('PUT')
    @csrf
    @include('Includes.alerta')

<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" value="{{ $user->name}}">
    </div>
    <div class="form-group">
    <label>Setor</label>
    <input type="text" name="setor" class="form-control" value="{{ $user->setor }}">
    </div>
    <div class="form-group">
    <label>Empresa</label>
    <input type="text" name="empresa" class="form-control" value="{{ $user->empresa }}">
    </div>
    <div class="form-group">
    <label>Centro de Custo</label>
    <input type="text" name="centro_custo" class="form-control" value="{{ $user->centro_custo }}">
    </div>
    <div class="form-group">
    <label>E-mail</label>
    <input type="text" name="email_google" class="form-control" value="{{ $user->email_google }}">
    </div>
    <div class="form-group">
    <label>Senha Google</label>
    <input type="text" name="senha_google" class="form-control" value="{{ $user->senha_google }}">
    </div>
    {{-- comment 
    
    @foreach($categories as $c)
    <div class="col-2 checkbox">
    <label>
    <input type="checkbox" name="categories[]" value="{{$c->id}}"> {{$c->name}}
    </label>
    </div>
    @endforeach
    </div>
    </div>
  --}}
   <button class="btn  btn-success">Atualizar Usuário</button>
   </form>
   <form action="{{route('user.index')}}">
    <br><br>
    <button class="btn btn-warning ">Voltar ao  index</button>
    </form>
@endsection