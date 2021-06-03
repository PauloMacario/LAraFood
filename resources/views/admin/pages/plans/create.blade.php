@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>  
    <li class="breadcrumb-item active"v aria-current="page">Adicionar plano</li>   
</ol>
    <h1 class="text-success">Cadastrar novo plano</h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.plans._partials.form')              
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection    