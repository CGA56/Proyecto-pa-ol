<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\User;
use App\Usuario;

class usuarioController extends Controller
{
     public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index')->with('usuarios',$usuarios);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
        $roles = Role::all();
        $roles=$roles->mapWithKeys(function ($item){
        	return [$item->name=> $item->name];
        });
        return view('usuarios.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new Usuario();
         $usuario->rut=$request['Rut'];
         $usuario->nombre=$request['name'];
         $usuario->apellido=$request['apellido'];
         $usuario->direccion=$request['domicilio'];
         $usuario->telefono=$request['telefono'];
         $usuario->escuela=$request['escuela'];
         $usuario->correo=$request['correo'];
        $usuario->save();

      

		$user=new User();

        $user->name= $request->input('name');
        $user->rut= $request->input('Rut');  
        $user->email= $request->input('correo'); 
        $user->password= $request->input('Rut'); 
        $user->save();
        $rol=$request['roles'];
        
         $user->assignRole($rol);
        $usuario->users()->save($user);
     
          return redirect()->route('usuarios.index')
            ->with('flash_message',
                'usuario creada satisfactoriamente');


       
             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $usuario = Usuario::findOrFail($id);
      

        return view('usuarios.edit', compact('usuario'));
       
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
         $usuario = Usuario::findOrFail($id);
         $usuario->rut=$request['rut'];
         $usuario->nombre=$request['nombre'];
       
         $usuario->apellido=$request['apellido'];
         $usuario->direccion=$request['direccion'];
         $usuario->telefono=$request['telefono'];
         $usuario->escuela=$request['escuela'];
         $usuario->correo=$request['email'];
         $usuario->users->name=$request['nombre'];
         $usuario->users->rut=$request['rut'];
         $usuario->users->correo=$request['email'];
        
        
      
        
       // $usuario->users->save();
        $usuario->save();

        return redirect()->route('usuarios.index')
            ->with('flash_message',
             'usuario "'. $usuario->nombre.'"a sido actualizado!');
        
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->users->delete();
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('flash_message','usuario  eliminado');
        
    }
}
