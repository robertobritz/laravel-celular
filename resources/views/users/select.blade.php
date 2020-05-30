@extends('app')

@section('content')

<form action="{{route('user.update', $user->id)}}" method="post">
    @method('PUT')
    @csrf
    @include('Includes.alerta')

<div class="form-group">
    <label>Nome:</label>
    <div class="form-control">{{ $user->name}}
    </div>
    <div class="form-group">
        
        <label for="sel1">Selecione o Número:</label>
        <select class="form-control" id="sel1" name="numero">
            <option>{{ $user->chip->numero ?? ''}}</option>
            <option>-</option>
            @foreach($chips as $chip)
               
            @if (@isset($chip->user))
                
            @else
                <option>{{$chip->numero}}</option>  
            @endif
                
            @endforeach
        </select>
    </div>
    <div class="form-group">

        <label for="sel1">Selecio Número de série:</label>
        <select class="form-control" id="sel1" name="serial_number">
            <option>{{ $user->phone->serial_number ?? ''}}</option>
            <option>-</option>
            @foreach($phones as $phone)
               
            @if (@isset($phone->user))
                
            @else
                <option>{{$phone->serial_number}}</option>  
            @endif
                
            @endforeach
        </select>
    </div>
        </div>
    </td>
    <input type="hidden" id="custId" name="userId" value="{{ $user->id}}">
   <button class="btn  btn-success">Atualizar Usuário</button>
   </form>
   <form action="{{route('homePage')}}">
    <br><br>
    <button class="btn btn-warning ">Voltar ao  index</button>
    </form>
@endsection