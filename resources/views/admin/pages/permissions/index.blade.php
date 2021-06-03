@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Permissões</li>
    </ol>
</nav>
    <h1 class="text-success">Permissões <a href="{{ route('permissions.create') }}" class="btn btn-success ml-3"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a></h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" class="form form-inline" method="POST">
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
                        <th>Nome da permissão</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>                          
                            <td width=350">                                
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning" title="Visualizar">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-secondary" title="Perfis">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else 
                {!! $permissions->links()  !!}
            @endif
        </div>
    </div>
@stop