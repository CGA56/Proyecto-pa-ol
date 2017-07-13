@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Agregar usuario</h1>
    <hr>

    {{-- @include ('errors.list') --}}

   
     {{ Form::open(array('url' => 'usuarios')) }}

    <div class="form-group">
        {{ Form::label('name', 'Rut') }}
        {{ Form::text('Rut', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('name', 'Apellido') }}
        {{ Form::text('apellido', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Escuela') }}
        {{ Form::text('escuela', '', array('class' => 'form-control')) }}
    </div>

       <div class="form-group">
        {{ Form::label('name', 'Domicilio') }}
        {{ Form::text('domicilio', '', array('class' => 'form-control')) }}
    </div>

      <div class="form-group">
        {{ Form::label('name', 'Telefono') }}
        {{ Form::text('telefono', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Correo') }}
        {{ Form::email('correo', '', array('class' => 'form-control')) }}
    </div>
  
   <div class="form-group">
        {{ Form::label('name', 'rol') }}
        <br>
        {{ Form::select('roles', $roles,array('class' => 'form-control')) }}

    </div>



    {{ Form::submit('agregar', array('class' => 'btn btn-primary')) }}


    {{ Form::close() }}

</div>

@endsection

