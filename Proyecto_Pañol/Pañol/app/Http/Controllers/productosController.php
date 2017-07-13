<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\categoria_productos;
use App\Stock;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=categoria_productos::all();
        $categorias = $categorias->mapWithKeys(function ($item) {
            return [$item->id => $item->nombre];
        });
        return view('productos.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cantidad=$request['cantidadDisponible'];
        $existe= Producto::where('nombre_producto',$request['nombreProducto'])->where('MarcaProveedor',$request['MarcaProveedor'])->get();
        $count=Producto::where('nombre_producto',$request['nombreProducto'])->where('MarcaProveedor',$request['MarcaProveedor'])->count();

        if($count>0)
        {
               for ($i = 1; $i <= $cantidad; $i++)
                {

                $stock = new Stock();
                $stock->producto_id=1;
                //$stock->fecha= \Carbon\Carbon::now();
                $stock->nombre=$request['nombreProducto'];
                $stock->marca=$request['MarcaProveedor'];
                
                $stock->cantidad=0;
                $stock->save();
                }
                $anterior=$existe[0]->cantidad_disponible;
                $nuevo=$cantidad+$anterior;
                $existe[0]->cantidad_disponible=$nuevo;
                $existe[0]->save();
               

                 return redirect()->route('productos.index')
                ->with('flash_message',
                'producto creado satisfactoriamente');
             
        


        } else{

            $producto= new Producto();
            $producto->nombre_producto=$request['nombreProducto'];
            $producto->MarcaProveedor=$request['MarcaProveedor'];
            $producto->cantidad_disponible=$request['cantidadDisponible'];
            $producto->observacion=$request['observacion'];
            $producto->id_cat_producto=$request['categoria'];
            $producto->save();

            for ($i = 1; $i <= $cantidad; $i++)

                {
                    $stock = new Stock();
                    $stock->producto_id=1;
                   // $stock->fecha=$carbon->now();
                    $stock->nombre=$request['nombreProducto'];
                    $stock->marca=$request['MarcaProveedor'];
                    $stock->cantidad=$request['cantidadDisponible'];
                    $stock->save();
                    
                 
                }
                return redirect()->route('productos.index')
                    ->with('flash_message',
                    'producto creado satisfactoriamente');
            
             }

       
       
        return redirect()->route('productos.index')
            ->with('flash_message',
                'producto creado satisfactoriamente');
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
         $categorias=categoria_productos::all();
        $categorias = $categorias->mapWithKeys(function ($item) {
            return [$item->id => $item->nombre];
        });

        $producto = Producto::findOrFail($id);
       
        return view('productos.edit', compact('producto','categorias'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
       
        return redirect()->route('productos.index')->with('flash_message','producto  eliminada');
    }
}
