@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Usuarios</h1>
    <hr>
    <div class="table-responsive">
       <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rut</th>
                    <th>Direccion</th>
                    <th>Escuela  </th>
                    <th>Telefono </th>
                    <th>Correo </th>
                    <th>Accion </th>
              
                </tr>
            </thead>

            <tbody>
               @foreach ($usuarios as $usuario)
                <tr>

                    <td> {{$usuario->nombre}}</td>
                    <td> {{$usuario->apellido}}</td>
                    <td> {{$usuario->rut}}</td>
                    <td> {{$usuario->direccion}}</td>
                    <td> {{$usuario->escuela}}</td>
                    <td> {{$usuario->telefono}}</td>
                    <td> {{$usuario->correo}}</td>    
                    <td>
                 


                    <a href="{{ URL::to('usuarios/'.$usuario->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario] ]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                   </td>
                    

              
                </tr>
                @endforeach

            </tbody>
             

        </table>
        <a href="{{ URL::to('usuarios/create') }}" class="btn btn-success">Añadir usuario</a>
    </div>


   
</div>

@endsection

