@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Editar producto: {{$producto->nombre_producto}}</h1>
    <hr>
    {{-- @include ('errors.list')
 --}}
    {{ Form::model($producto, array('route' => array('usuarios.update', $producto->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre del producto') }}
        {{ Form::text('nombreProducto', $producto->nombre_producto, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Marca o Proveedor') }}
        {{ Form::text('MarcaProveedor', $producto->MarcaProveedor, array('class' => 'form-control')) }}
    </div>

    <div> 
        {{ Form::label('name', 'categoria') }}
        
       {{ Form::select('categoria', $categorias,$producto->id_cat_producto, array('class' => 'form-control')) }}
    </div>


     <div class="form-group">
        {{ Form::label('name', 'Cantidad Disponible') }}
        {{ Form::text('cantidadDisponible', $producto->cantidad_disponible, array('class' => 'form-control')) }}
    </div>

       <div class="form-group">
        {{ Form::label('name', 'Observacion') }}
        {{ Form::text('observacion', $producto->observacion, array('class' => 'form-control')) }}
    </div>
   
   
    <br>
    {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection