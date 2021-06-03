@extends('adminlte::page')

@section('title', "Planos disponíveis para o perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
       {{--  <li class="breadcrumb-item "><a href="{{ route('profiles.index') }}">Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.permissions', $profile->id) }}">Permissões do perfil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Adicionad permissões do perfil</li> --}}
    </ol>
    <h1 class="text-success">Planos disponíveis para o perfil <b class="text-success">{{ $profile->name }}</b></h1> 
@endsection

@section('content')    
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.plans.available', $profile->id) }}" class="form form-inline" method="POST">
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
                        <td>#</td>
                        <td>Nome da permissão</td>
                        <td>Descrição</td>                        
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('plans.profiles.attach', $profile->id) }}" method="POST">
                        @csrf
                        @foreach ($plans as $plan)
                            <tr>
                                <td>
                                    <input type="checkbox" name="plans[]" id="" value="{{ $plan->id }}">
                                </td>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->description }}</td>                          
                            </tr>                        
                        @endforeach
                        <tr>
                            <td colspan="500">
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
@endsection