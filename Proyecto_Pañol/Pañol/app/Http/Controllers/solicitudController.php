<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestamos;
use Auth;
use Session;
use App\Prestamos;
use App\Producto;

class solicitudController extends Controller
{

    
    // public function __construct() 
    // {
    //     $this->middleware(['auth']);
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Prestamos::all();
        return view('reportesPrestamos.index')->with('solicitudes',$solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Producto $producto)
    {
         $prestamo = new Prestamos();
         $prestamo->nombre_producto=$producto->nombre_producto;
         $prestamo->cantidad='1';
         $prestamo->nombre_solicitante='prueba';      //Auth::user()->name;
         $prestamo->nombre_pañolero="";
         $prestamo->estado="en espera";
         $prestamo->fecha_pedido=hoy;
         $prestamo->save();
         return redirect()->route('productos.index')
            ->with('flash_message',
                'pedido realizado satisfactoriamente');


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $reporte = Prestamos::findOrFail($id);
       return view('reportes.show' , compact('reporte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporte = Prestamos::findOrFail($id);
        return view('reportes.edit', compact('reporte'));
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
    public function destroy($id)
    {
        $reporte= Prestamos::findOrFail($id);
        $reporte->delete();

        return redirect()->route('reportes.index')->with('flash_message' ,'Reporte eliminado con exito');
    }
    
}
