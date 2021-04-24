@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item active" aria-current="page">Permissões do perfil {{ $profile->name }}</li>
    </ol>
    <h1 class="text-success">Permissões do perfil <b class="text-success">{{ $profile->name }}</b>
        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success ml-3">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add nova permissão
        </a>
    </h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Permissões do perfil</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>                          
                            <td width=150">
                                <a href="{{ route('profiles.permissions.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
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