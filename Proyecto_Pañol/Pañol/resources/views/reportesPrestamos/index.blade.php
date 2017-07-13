@extends('layouts.app')
@section('title', '| Solicitudes')
@section('content')
{{-- @if (!Auth::user()->hasPermissionTo('Consultar reportes pedidos'))
    <meta http-equiv="refresh" content="0";url="/401">
    <script type="text/javascript">
        window.location.href = "/401"
    </script>
@endif --}}
<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Solicitudes</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>nombre producto</th>
                    <th>cantidad</th>
                    <th>nombre solicitante</th>
                    <th>nombre pañolero</th>
                    <th>fecha pedido</th>
                    <th>fecha entrega</th>
                    <th>estado</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($solicitudes as $solicitud)
                <tr>

                    <td>{{ $solicitud->nombre_producto }}</td>
                    <td>{{ $solicitud->cantidad }}</td>
                    <td>{{ $solicitud->nombre_solicitante }}</td>
                    <td>{{ $solicitud->nombre_panolero }}</td>
                    <td>{{ $solicitud->fecha_pedido }}</td>
                    <td>{{ $solicitud->fecha_entrega }}</td>
                 
                    <td id="estado" name="estado"> {{Form::select('estado',['en espera'=>'en espera','aceptada'=>'aceptada','debuelta'=>'debuelta',''=>''],$solicitud->estado)}}</td>

                                    
                    <td>
              

                   <a href="/pedidos/modi" class="btn btn-success">Ingresar atención</a>

                  
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
   {{--  @if (Auth::user()->hasPermissionTo('Ingresar atención'))
    <a href="/atenciones/ingresar-atencion" class="btn btn-success">Ingresar atención</a>
    @endif --}}
</div>
 
@endsection