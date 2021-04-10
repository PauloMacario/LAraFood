@extends('adminlte::page')

@section("title", "Editar plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.edit', $plan->id) }}">Editar</a></li>
    </ol>
    <h1>Editar plano <b>{{ $plan->name }}</b></h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans._partials.form')
             
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@stop    