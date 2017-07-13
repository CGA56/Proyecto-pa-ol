@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Agregar producto </h1>
    <hr>

    {{-- @include ('errors.list') --}}

   
     {{ Form::open(array('url' => 'productos')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre del producto') }}
        {{ Form::text('nombreProducto', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Marca o Proveedor') }}
        {{ Form::text('MarcaProveedor', '', array('class' => 'form-control')) }}
    </div>

    <div> 
        {{ Form::label('name', 'categoria') }}
        
       {{ Form::select('categoria', $categorias, array('class' => 'form-control')) }}
    </div>


     <div class="form-group">
        {{ Form::label('name', 'Cantidad Disponible') }}
        {{ Form::text('cantidadDisponible', '', array('class' => 'form-control')) }}
    </div>

       <div class="form-group">
        {{ Form::label('name', 'Observacion') }}
        {{ Form::text('observacion', '', array('class' => 'form-control')) }}
    </div>

      



    {{ Form::submit('Agregar Producto ', array('class' => 'btn btn-primary')) }}


    {{ Form::close() }}

</div>

@endsection

