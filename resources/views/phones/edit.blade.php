@extends('app')

@section('content')

<form action="{{route('phone.update', $phone->id)}}" method="post">
    @method('PUT')
    @csrf
    @include('Includes.alerta')

    <div class="form-group">
        <label for="sel1">Selecio um nome:</label>
            <select class="form-control" id="sel1" name="name">
                <option>{{$phone->user->name ?? '-'}}</option>
                <option> - </option>
                @foreach($users as $user)
                   
                @if (@isset($user->phone))
                    
                @else
                    <option>{{$user->name}}</option>  
                @endif
                    
                @endforeach
            </select>
        </div> 
    <div class="form-group">
    <label>marca</label>
    <input type="text" name="marca" class="form-control" value="{{$phone->marca}}">
    </div>
    <div class="form-group">
    <label>Serial Number</label>
    <input type="text" name="serial_number" class="form-control" value="{{$phone->serial_number}}">
    </div>
    <div class="form-group">
    <label>Modelo</label>
    <input type="text" name="modelo" class="form-control" value="{{$phone->modelo}}">
    </div>
    <div class="form-group">
    <label>IMEI1</label>
    <input type="text" name="IMEI1" class="form-control" value="{{$phone->IMEI1}}">
    </div>
    <div class="form-group">
    <label>IMEI2</label>
    <input type="text" name="IMEI2" class="form-control" value="{{$phone->IMEI2}}">
    </div>
    <div class="form-group">
    <label>IMEI2</label>
    <input type="text" name="IMEI2" class="form-control" value="{{$phone->IMEI2}}">
    </div>
    <div class="form-group">
    <label>Mac Wirelles</label>
    <input type="text" name="mac_wirelles" class="form-control" value="{{$phone->mac_wirelles}}">
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
   <form action="{{route('phone.index')}}">
    <br><br>
    <button class="btn btn-warning ">Voltar ao  index</button>
    </form>
@endsection