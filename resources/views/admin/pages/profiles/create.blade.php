@extends('adminlte::page')

@section('title', 'Cadastrar novo perfil')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('profiles.index') }}">Perfil</a></li>   
    <li class="breadcrumb-item active" aria-current="page">Adicionar perfil</li>   
</ol>
    <h1 class="text-success">Cadastrar novo perfil</h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.profiles._partials.form')              
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection    