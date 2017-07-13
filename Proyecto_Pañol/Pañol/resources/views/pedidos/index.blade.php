@extends('layouts.app')

@section('title', '| Atenciones')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>
        Prestamos
    </h1>
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                {{-- si es pañolero se listan todos los pedidos, si no lo es se listan solo los del usuario --}}
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>Estado</th>
                    <th>Observacion</th>
                {{-- solo para el pañolero  se habilita la edicion--}} 
                    <th>Operacion</th>
                </tr>
            </thead>

           {{--  <tbody>
                @foreach ($productos as $producto)
                <tr>

                    <td>{{ $producto->nombre }}</td>

                    <td>{{ $atencproductoion->cantidad}}</td>
                    <td>{{ $producto->estado}}</td>
                    <td>{{ $producto->observacion }}</td>
 --}}
                    {{-- solo para el pañolero --}}
                  {{--   <td>
                    <a href="{{ URL::to('pedidos/'.$pedido->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                     !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody> --}}

        </table>
    </div>
     {{-- solo para el usuario profesor por online y el alumno solo en totem--}}
     <a href="{{ URL::to('pedidos/create') }}" class="btn btn-success">Añadir Pedido</a>

    

</div>

@endsection