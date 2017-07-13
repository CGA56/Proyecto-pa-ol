@extends('layouts.app')
@section('title', '| Reporte de stock de productos')
@section('content')
{{-- @if (!Auth::user()->hasPermissionTo('Consultar reportes pedidos'))
    <meta http-equiv="refresh" content="0";url="/401">
    <script type="text/javascript">
        window.location.href = "/401"
    </script>
@endif --}}
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Reporte de stock de productos</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>nombre</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha de creacion</th>
                    <th>Ultima actualizacion</th>
                </tr>
            </thead>

          
                @foreach ($stock as $aux)
              {{Form::open(['url'=>'/actualizar','method'=>'POST'])}}
                <tr>
                <td >{{Form::text('nombre',$aux->nombre, ['disabled' => 'disabled'])}}</td>
                <td >{{Form::text('marca',$aux->marca, ['disabled' => 'disabled'])}}</td>
                <td >{{Form::text('cantidad',$aux->cantidad, ['disabled' => 'disabled'])}}</td>
             
                <td>{{Form::select('estado',['disponible'=>'disponible','prestamo'=>'prestamo','dado de baja'=>'dado de baja',''=>''],$aux->estado)}}</td>
                <td >{{Form::text('fecha',$aux->fecha, ['disabled' => 'disabled'])}}</td>
                <td >{{Form::text('updated_at',$aux->updated_at, ['disabled' => 'disabled'])}}</td>
                                     
                    <td>
                   
                    
                    </td> 
                </tr>
                {{Form::close()}}
                @endforeach
           

        </table>
    </div>
   
</div>
 
@endsection