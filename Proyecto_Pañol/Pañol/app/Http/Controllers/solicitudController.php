<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestamos;
use Auth;
use Session;
use App\Producto;
use Carbon\Carbon;

class solicitudController extends Controller
{

    public function actualizar(Request $request){
        echo "estoy";
        // $id=$request->input('id');
        // $reserva= SolicitudReserva::where('id','=',$id)->first();
        // $reserva->refugio=$request->input('refugio');
        // $reserva->pais=$request->input('pais');
        // $reserva->fecha_llegada=$request->input('fechaLlegada');

        // $reserva->nombre=$request->input('nombre');
        // $reserva->documentoIdentidad=$request->input('rut');
        // $reserva->email=$request->input('Email');
        // $reserva->telefono=$request->input('telefono');
        // $reserva->cantidadNoches=$request->input('noches');
        // $reserva->cantidadPasajeros=$request->input('personas');
        // $reserva->comentario_agente=$request->input('comentarioAgente');
        // $reserva->estado=$request->input('estado');
        // $reserva->save();

        
        

    }

    
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

        


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
    // public function edit($id)
    // {
    //     $reporte = Prestamos::findOrFail($id);
    //     return view('reportes.edit', compact('reporte'));
    // }

       public function edit($id, $estado)
    {
        $reporte = Prestamos::findOrFail($id);
       // echo $reporte;
        echo $request['estado'];
       
    }

    public function procesar(){
       //  $reporte = Prestamos::findOrFail($id);
       // echo $reporte;
       //  echo $request['estado'];
       //  echo $request->method();

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        if (Auth::check()) {
        
           $producto=Producto::findOrFail($id);

         $prestamo = new Prestamos();
         $prestamo->nombre_producto= $producto->nombre_producto;
         $prestamo->cantidad='1';
         $prestamo->nombre_solicitante='prueba';      //Auth::user()->name;
         $prestamo->nombre_panolero="";
         $prestamo->estado="en espera";
         $prestamo->fecha_pedido=Carbon::now();
         $prestamo->save();
         // $producto->cantidad_disponible=$producto->cantidad_disponible - 1;
         // $producto->save();
         return redirect()->route('productos.index')
            ->with('flash_message',
                'pedido realizado satisfactoriamente');
       }
       return redirect('/iniciar-sesion');

    }

     public function modi(Request $request, Producto $producto)
    {
        
        echo $producto;
         //   $producto=Producto::findOrFail($id);

         // $prestamo = new Prestamos();
         // $prestamo->nombre_producto= $producto->nombre_producto;
         // $prestamo->cantidad='1';
         // $prestamo->nombre_solicitante='prueba';      //Auth::user()->name;
         // $prestamo->nombre_panolero="";
         // $prestamo->estado="en espera";
         // $prestamo->fecha_pedido=Carbon::now();
         // $prestamo->save();
         // // $producto->cantidad_disponible=$producto->cantidad_disponible - 1;
         // // $producto->save();
         // return redirect()->route('productos.index')
         //    ->with('flash_message',
         //        'pedido realizado satisfactoriamente');
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
