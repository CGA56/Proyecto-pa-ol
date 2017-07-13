@extends('layouts.app')

@section('title', '| Add User')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Agregar Pedido</h1>
    <hr>

    {{-- @include ('errors.list') --}}

   
     {{ Form::open(array('url' => 'pedidos')) }}

     <div> 
        {{ Form::label('name', 'categoria') }}
       {{-- {{ Form::select('categoria', $categorias) }} --}}
    </div>
     <div> 
        {{ Form::label('name', 'producto') }}
       {{-- {{ Form::select('categoria', $categorias) }} --}}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Cantidad') }}
        {{ Form::text('cantidad', '', array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('name', 'Observacion') }}
        {{ Form::text('observacion', '', array('class' => 'form-control')) }}
    </div>




     {{-- despues de agregar pedido que redirija a el listado --}}
    {{ Form::submit('Agregar Pedido', array('class' => 'btn btn-primary')) }}




    {{ Form::close() }}

</div>

@endsection
