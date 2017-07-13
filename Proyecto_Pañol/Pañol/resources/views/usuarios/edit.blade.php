@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Editar usuario: {{$usuario->nombre}}</h1>
    <hr>
    {{-- @include ('errors.list')
 --}}
    {{ Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('nombre',$usuario->nombre, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Apellido') }}
        {{ Form::text('apellido', $usuario->apellido, array('class' => 'form-control')) }}
    </div>

     <div class="form-group">
        {{ Form::label('name', 'Rut') }}
        {{ Form::text('rut', $usuario->rut, array('class' => 'form-control')) }}
    </div>

       <div class="form-group">
        {{ Form::label('name', 'Direcion') }}
        {{ Form::text('direccion', $usuario->direccion, array('class' => 'form-control')) }}
    </div>

       <div class="form-group">
        {{ Form::label('name', 'Escuela') }}
        {{ Form::text('escuela', $usuario->escuela, array('class' => 'form-control')) }}
    </div>
     

       <div class="form-group">
        {{ Form::label('name', 'Telefono') }}
        {{ Form::text('telefono', $usuario->telefono, array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('name', 'Email') }}
        {{ Form::email('email', $usuario->correo, array('class' => 'form-control')) }}
    </div>
   
   
    <br>
    {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection