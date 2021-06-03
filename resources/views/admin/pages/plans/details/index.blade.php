@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
    </ol>
    <h1>Detalhes do plano <b class="text-success">{{ $plan->name }}</b> <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-success ml-3"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></h1> 
@stop

@section('content')    
    <div class="card">      
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>                       
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td width=250">
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else 
                {!! $details->links()  !!}
            @endif
        </div>
    </div>
@stop