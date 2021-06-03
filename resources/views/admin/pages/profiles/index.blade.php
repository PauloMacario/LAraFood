@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Perfis</li>
    </ol>
    <h1 class="text-success">Perfis <a href="{{ route('profiles.create') }}" class="btn btn-success ml-3"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" class="form form-inline" method="POST">
                @csrf              
                <input type="text" name="filter" id="filter" class="form-control mr-3" placeholder="Por nome" value="{{ $filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search" aria-hidden="true"></i> Filtrar</button>

            </form>
        </div>
        
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome do perfil</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->description }}</td>                          
                            <td width=350">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning" title="Visualizar">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-secondary" title="Permissões">
                                    <i class="fa fa-lock"></i>
                                </a>
                                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-primary" title="Planos">
                                    <i class="fa fa-list-alt"></i>
                                </a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else 
                {!! $profiles->links()  !!}
            @endif
        </div>
    </div>
@stop