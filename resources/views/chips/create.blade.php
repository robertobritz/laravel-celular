@extends('app')

@section('content')

<form action="{{route('chip.store')}}" method="post">
    @csrf
    @include('Includes.alerta')

<div class="form-group">
    <label for="sel1">Selecio um nome:</label>
        <select class="form-control" id="sel1" name="name">
            <option>-</option>
            @foreach($users as $user)
               
            @if (@isset($user->chip_id))
                
            @else
                <option>{{$user->name}}</option>  
            @endif
                
            @endforeach
        </select>
    </div>     
    <div class="form-group">
    <label>numero</label>
    <input type="text" name="numero" class="form-control" >
    </div>
    <div class="form-group">
    <label>id_chip</label>
    <input type="text" name="id_chip" class="form-control" >
    </div>
    <div class="form-group">
    <label>PIN1</label>
    <input type="text" name="PIN1" class="form-control" >
    </div>
    <div class="form-group">
    <label>PIN2</label>
    <input type="text" name="PIN2" class="form-control" >
    </div>
    <div class="form-group">
    <label>PUNK</label>
    <input type="text" name="PUNK" class="form-control" >
    </div>
    <div class="form-group">
    <label>PUNK2</label>
    <input type="text" name="PUNK2" class="form-control" >
    </div>
    <div class="form-group">
    <label>DADOS</label>
    <input type="text" name="DADOS" class="form-control" >
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
   <button class="btn btn-lg btn-success">Criar Chip</button>
   </form>
@endsection