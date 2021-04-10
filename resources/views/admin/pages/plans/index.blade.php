@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
    </ol>
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark ml-3"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" class="form form-inline" method="POST">
                @csrf              
                <input type="text" name="filter" id="filter" class="form-control mr-3" placeholder="Por nome" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i> Filtrar</button>

            </form>
        </div>
        
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>URL</td>
                        <td>Preço</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->url }}</td>
                            <td>R${{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td>{{ $plan->description }}</td>
                            <td width=250">
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning">
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
                {!! $plans->appends($filters)->links() !!}
            @else 
                {!! $plans->links()  !!}
            @endif
        </div>
    </div>
@stop