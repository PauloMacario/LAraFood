@extends('adminlte::page')

@section('title', "Permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissão</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
    <h1>Detalhes da permissão <b class="text-success">{{ $permission->name }}</b></h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-header">
        
        </div>        
        <div class="card-body">
            @include('admin.includes.alerts')
           <ul class="list-group">
               <li class="list-group-item"><strong>Nome: </strong>{{ $permission->name }}</li>              
               <li class="list-group-item"><strong>Descrição: </strong>{{ $permission->description }}</li>             
               <li class="list-group-item">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                    </form>
               </li>
            </ul>          
        </div>        
    </div>
@endsection