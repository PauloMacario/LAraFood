@extends('adminlte::page')

@section('title', "Detalhes {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item "><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes <b class="text-success">{{ $detail->name }}</b></h1> 
@stop

@section('content')    
    <div class="card">      
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item"><strong>Nome: </strong>{{ $detail->name }}</li>
                <li class="list-group-item">
                     <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                     </form>
                </li>
             </ul>  
        </div>
    </div>
@endsection