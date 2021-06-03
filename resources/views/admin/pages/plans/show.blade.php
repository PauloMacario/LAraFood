@extends('adminlte::page')

@section('title', "Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
    <h1>Detalhes do plano <b class="text-success">{{ $plan->name }}</b></h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-header">
        
        </div>        
        <div class="card-body">
            @include('admin.includes.alerts')
           <ul class="list-group">
               <li class="list-group-item"><strong>Nome: </strong>{{ $plan->name }}</li>
               <li class="list-group-item"><strong>Url: </strong>{{  $plan->url }}</li>   
               <li class="list-group-item"><strong>Preço: </strong>R${{ number_format($plan->price, 2, ',', '.') }}</li> 
               <li class="list-group-item"><strong>Descrição: </strong>{{ $plan->description }}</li> 
               <li class="list-group-item"><strong>Criado em: </strong>{{ date("d/m/Y", strtotime($plan->created_at)) }}</li>      
               <li class="list-group-item"><strong>Última atualização: </strong>{{ date("d/m/Y", strtotime($plan->updated_at)) }}</li>
               <li class="list-group-item">
                    <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Deletar</button>
                    </form>
               </li>
            </ul>          
        </div>        
    </div>
@stop