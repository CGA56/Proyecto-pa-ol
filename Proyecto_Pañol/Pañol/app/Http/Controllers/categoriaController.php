<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\categoria_productos;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria_productos::all();
        return view('categorias.index')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $categoria= new categoria_productos();
        $categoria->nombre=$request['nombre'];
        // $categoria->descripcion=$request['descripcion'];
        $categoria->save();
        return redirect()->route('categorias.index')
            ->with('flash_message',
                'categoria creada satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categoria = categoria_productos::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = categoria_productos::findOrFail($id);
        // $categoria->descripcion=$request['descripcion'];
        $categoria->nombre=$request['nombre'];
       
        

        
      
        
       // $usuario->users->save();
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('flash_message',
             'categoria "'. $categoria->nombre.'"a sido actualizado!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria_productos $categoria)
    {

        $categoria->delete();
       
        return redirect()->route('categorias.index')->with('flash_message','categoria  eliminada');
        //
    }
}
