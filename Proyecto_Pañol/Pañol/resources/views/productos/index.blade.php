@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> productos</h1>
    <hr>
    <div class="table-responsive">
       <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Nombre Producto</th>
                    <th>Marca o proveedor</th>
                    <th>Cantidad</th>
                    <th>observacion</th>

                    <th>Accion </th>
              
                </tr>
            </thead>

            <tbody>
               @foreach ($productos as $producto)
                <tr>

                    <td id="nombre"> {{$producto->nombre_producto}}</td>
                    <td> {{$producto->MarcaProveedor}}</td>
                    <td> {{$producto->cantidad_disponible}}</td>
                    <td> {{$producto->observacion}}</td>
                   
                    <td>
                 

                     @role('AdmPanol')       
                    <a href="{{ URL::to('productos/'.$producto->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['productos.destroy', $producto] ]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endrole
                    
                    {{ Form::model($producto, array('route' => array('pedidos.update', $producto->id), 'method' => 'PUT')) }}
                      {{ Form::submit('Crear Pedido', array('class' => 'btn btn-primary')) }}

                      {{ Form::close() }}   
                    
              

                    {{-- para estudiantes o profesores --}}
                



                   </td>
                    

              
                </tr>
                @endforeach

            </tbody>
             

        </table>
        @role('AdmPanol') 
        <a href="{{ URL::to('productos/create') }}" class="btn btn-success">Añadir Producto</a>
        @endrole
    </div>


   
</div>

@endsection

