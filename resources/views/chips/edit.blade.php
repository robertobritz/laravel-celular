@extends('app')

@section('content')

<form action="{{route('chip.update', $chip->id ?? '')}}" method="post">
    @method('PUT')
    @csrf
    @include('Includes.alerta')

    <div class="form-group">
        <label for="sel1">Selecio um nome:</label>
            <select class="form-control" id="sel1" name="name">
                <option>{{$chip->user->name ?? '-'}}</option>
                <option> - </option>
                @foreach($users as $user)
                   
                @if (@isset($user->chip))
                    
                @else
                    <option>{{$user->name}}</option>  
                @endif
                    
                @endforeach
            </select>
        </div> 
    <div class="form-group">
    <label>numero</label>
    <input type="text" name="numero" class="form-control" value="{{$chip->numero ?? ''}}">
    </div>
    <div class="form-group">
    <label>id_chip</label>
    <input type="text" name="id_chip" class="form-control" value="{{$chip->id_chip ?? ''}}">
    </div>
    <div class="form-group">
    <label>PIN1</label>
    <input type="text" name="PIN1" class="form-control" value="{{$chip->PIN1 ?? ''}}">
    </div>
    <div class="form-group">
    <label>PIN2</label>
    <input type="text" name="PIN2" class="form-control" value="{{$chip->PIN2 ?? ''}}">
    </div>
    <div class="form-group">
    <label>PUNK</label>
    <input type="text" name="PUNK" class="form-control" value="{{$chip->PUNK ?? ''}}">
    </div>
    <div class="form-group">
    <label>PUNK2</label>
    <input type="text" name="PUNK2" class="form-control" value="{{$chip->PUNK2 ?? ''}}">
    </div>
    <div class="form-group">
    <label>DADOS</label>
    <input type="text" name="DADOS" class="form-control" value="{{$chip->DADOS ?? ''}}">
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
   <form action="{{route('chip.index')}}">
    <br><br>
    <button class="btn btn-warning ">Voltar ao  index</button>
    </form>
@endsection