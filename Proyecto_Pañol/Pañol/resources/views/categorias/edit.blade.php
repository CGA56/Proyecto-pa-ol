@extends('layouts.app')

@section('title', '| Actualizar médicos')

@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Actualizar categoria</h1>
        <hr>
            {{ Form::model($categoria, array('route' => array('categorias.update', $categoria->id), 'method' => 'PUT')) }}
          

            {{ Form::label('nombre', 'Nombre:') }}
            {{ Form::text('nombre', $categoria->nombre, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('especialidad', 'Descripcion:') }}
            {{ Form::text('descripcion', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection