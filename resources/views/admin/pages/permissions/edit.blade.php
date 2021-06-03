@extends('adminlte::page')

@section("title", "Editar permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissão</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
    </ol>
    <h1>Editar permissão <b class="text-success">{{ $permission->name }}</b></h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.permissions._partials.form')             
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection    