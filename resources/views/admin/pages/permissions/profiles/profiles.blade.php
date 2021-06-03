@extends('adminlte::page')

@section('title', "Perfis da permissão {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{ route('permissions.index') }}">Permissão</a></li>
        <li class="breadcrumb-item active" aria-current="page">Perfil da permissão {{ $permission->name }}</li>
    </ol>
    <h1 class="text-success">Perfis da permissão <b class="text-success">{{ $permission->name }}</b>
       {{--  <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success ml-3">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Add nova permissão
        </a> --}}
    </h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Perfis da permissão</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td>{{ $profile->description }}</td>                          
                            <td width=150">
                                <a href="{{ route('permissions.profiles.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">
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
                {!! $profiles->appends($filters)->links() !!}
            @else 
                {!! $profiles->links()  !!}
            @endif
        </div>
    </div>
@stop