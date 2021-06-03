@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('permissions.index') }}">Permissões</a></li>   
    <li class="breadcrumb-item active" aria-current="page">Adicionar permissão</li>   
</ol>
    <h1 class="text-success">Cadastrar nova permissão</h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.permissions._partials.form')              
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection    