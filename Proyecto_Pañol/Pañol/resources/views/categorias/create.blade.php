@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Agregar Categoria </h1>
    <hr>

    {{-- @include ('errors.list') --}}

   
     {{ Form::open(array('url' => 'categorias')) }}



    <div class="form-group">
        {{ Form::label('name', 'Nombre Categoria') }}
        {{ Form::text('nombre', '', array('class' => 'form-control')) }}
    </div>


   



    {{ Form::submit('Agregar Categoria', array('class' => 'btn btn-primary')) }}


    {{ Form::close() }}

</div>

@endsection
