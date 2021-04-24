@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item "><a href="{{ route('details.plan.index', $plan->url) }}" aria-current="page">Detalhes</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo</li>
    </ol>
    <h1>Adicionar novo detalhe ao plano <b class="text-success">{{ $plan->name }}</b></h1> 
@stop

@section('content')    
    <div class="card">      
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url) }}" method="POST">
                @csrf
                @include('admin.pages.plans.details._partials.form')
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection