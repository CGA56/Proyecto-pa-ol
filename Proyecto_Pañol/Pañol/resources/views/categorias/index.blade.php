@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Categorias</h1>
    <hr>
    <div class="table-responsive">
       <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Accion</th>
                    
              
                </tr>
            </thead>

            <tbody>
               @foreach ($categorias as $categoria)
                <tr>

                    <td> {{$categoria->nombre}}</td>
                    <td>{{--  {{$categoria->descripcion}} --}}</td>
                    <td>
                 


                    <a href="{{ URL::to('categorias/'.$categoria->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Editar</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['categorias.destroy', $categoria] ]) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                   </td>
                    

              
                </tr>
                @endforeach

            </tbody>
             

        </table>
        <a href="{{ URL::to('categorias/create') }}" class="btn btn-success">Añadir categoria</a>
    </div>


   
</div>

@endsection

