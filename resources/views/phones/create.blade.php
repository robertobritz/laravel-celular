@extends('app')

@section('content')

<form action="{{route('phone.store')}}" method="post">
    @csrf
    @include('Includes.alerta')
    
    <div class="form-group">
        <label for="sel1">Selecio um nome:</label>
            <select class="form-control" id="sel1" name="name">
                <option>-</option>
                @foreach($users as $user)
                   
                @if (@isset($user->phone))
                    
                @else
                    <option>{{$user->name}}</option>  
                @endif
                    
                @endforeach
            </select>
        </div>    
    <div class="form-group">
    <label>Marca</label>
    <input type="text" name="marca" class="form-control" >
    </div>
    <div class="form-group">
    <label>Serial Number</label>
    <input type="text" name="serial_number" class="form-control" >
    </div>
    <div class="form-group">
    <label>Modelo</label>
    <input type="text" name="modelo" class="form-control" >
    </div>
    <div class="form-group">
    <label>IMEI1</label>
    <input type="text" name="IMEI1" class="form-control" >
    </div>
    <div class="form-group">
    <label>IMEI2</label>
    <input type="text" name="IMEI2" class="form-control" >
    </div>
    <div class="form-group">
    <label>Mac Wirelles</label>
    <input type="text" name="mac_wirelles" class="form-control" >
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