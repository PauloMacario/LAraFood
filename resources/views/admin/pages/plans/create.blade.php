@extends('adminlte::page')

@section('title', 'Cadastrar novo plano')

@section('content_header')
    <h1>Cadastrar novo plano</h1> 
@stop

@section('content')    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.plans._partials.form')
              
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
@stop    