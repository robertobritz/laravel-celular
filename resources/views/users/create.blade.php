@extends('app')

@section('content')

<form action="{{route('user.store')}}" method="post">
    @csrf
    @include('Includes.alerta')

<div class="form-group">
    <label>Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old ('name')}}" >
    </div>
    <div class="form-group">
    <label>Setor</label>
    <input type="text" name="setor" class="form-control" value="{{ old ('setpr')}}" required>
    </div>
    <div class="form-group">
    <label>Empresa</label>
    <input type="text" name="empresa" class="form-control" value="{{ old ('empresa')}}" required>
    </div>
    <div class="form-group">
    <label>Centro de Custo</label>
    <input type="text" name="centro_custo" class="form-control" value="{{ old ('centro_custo')}}" required>
    </div>
    <div class="form-group">
    <label>E-mail</label>
    <input type="text" name="email_google" class="form-control" value="{{ old ('email_google')}}" required>
    </div>
    <div class="form-group">
    <label>Senha Google</label>
    <input type="text" name="senha_google" class="form-control" value="{{ old ('senha_google')}}" required>
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
   <button class="btn btn-lg btn-success">Criar Usuário</button>
   </form>
@endsection