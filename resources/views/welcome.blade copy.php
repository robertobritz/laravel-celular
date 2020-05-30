@extends('app')

@section('title', 'Pagina Inicial') 

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Relação de Utilizadores</h2>
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
            <th>Número</th>
            
            <th>Celular Nrº de Série</th>
            <th>Alt Número</th>
            <th>Alt Celular</th>
            <th>
        </tr>
    </thead>
<tbody>
    @forelse($users as $user)
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->setor}}</td>
    <td>{{$user->empresa}}</td>
    <td>{{$user->chip->numero ?? '-'}}</td>
    
    <td>{{$user->phone->serial_number ?? '-'}}</td>
    
    <td> <div class="btn-group">
       <a href="{{ route('chip.edit', $user->id )}}" class="btn btn-sm btn-primary"> Alterar </a>

    </td>
    <td> <div class="btn-group">
        <a href="{{ route('phone.edit', $user->id )}}" class="btn btn-sm btn-primary"> Alterar </a>

    </td>
  
<td> <div class="btn-group">

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
