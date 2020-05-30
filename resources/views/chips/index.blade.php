@extends('app')

@section('title', 'Listar Funcionários') 

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('chip.create')}}" class="btn btn-success float-right">Cadastrar Chip</a>
        <h2>Chips cadastrados</h2>
        <div class="clearfix"></div>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Utilizador</th>
            <th>Número</th>
            <th>ID Chip</th>
            <th>PIN1</th>
            <th>PIN2</th>
            <th>PUNK</th>
            <th>PUNK2</th>
            <th>Dados</th>
            <th></th>
        </tr>
    </thead>
<tbody>
    @forelse($chips as $chip)
    <tr>
    <td>{{$chip->id}}</td>
    <td>{{$chip->User->name ?? '-'}}</td>
    <td>{{$chip->numero}}</td>
    <td>{{$chip->id_chip}}</td>
    <td>{{$chip->PIN1}}</td>
    <td>{{$chip->PIN2}}</td>
    <td>{{$chip->PUNK}}</td>
    <td>{{$chip->PUNK2}}</td>
    <td>{{$chip->DADOS}}</td>
 
<td> <div class="btn-group">
<a href="{{ route('chip.edit', $chip->id)}}" class="btn btn-sm btn-primary mr-2"> Editar </a>
<form action="{{route('chip.destroy', ['chip' => $chip->id])}}" method="POST">
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