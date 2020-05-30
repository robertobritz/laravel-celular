@extends('app')

@section('title', 'Listar Funcionários') 

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="{{route('phone.create')}}" class="btn btn-success float-right">Criar Telefone</a>
        <h2>Telefones cadastrados</h2>
        <div class="clearfix"></div>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Utilizador</th>
            <th>Marca</th>
            <th>Número serial</th>
            <th>Modelo</th>
            <th>IMEI1</th>
            <th>IMEI2</th>
            <th>Enderço Mac</th>
            <th></th>
        </tr>
    </thead>
<tbody>
    @forelse($phones as $phone)
    <tr>
    <td>{{$phone->id}}</td>
    <td>{{$phone->User->name ?? '-'}}</td>
    <td>{{$phone->marca}}</td>
    <td>{{$phone->serial_number}}</td>
    <td>{{$phone->modelo}}</td>
    <td>{{$phone->IMEI1}}</td>
    <td>{{$phone->IMEI2}}</td>
    <td>{{$phone->mac_wirelles}}</td>
  
<td> <div class="btn-group">
<a href="{{ route('phone.edit', $phone->id)}}" class="btn btn-sm btn-primary mr-2"> Editar </a>
<form action="{{route('phone.destroy', ['phone' => $phone->id])}}" method="POST">
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
