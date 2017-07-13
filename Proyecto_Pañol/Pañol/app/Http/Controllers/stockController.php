<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use Auth;
use Session;

class stockController extends Controller
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
        $stock = Stock::all();
        return view('reportesStock.index')->with('stock' ,$stock);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
       $stock = Stock::findOrFail($id);
       return view('reportesStock.show' , compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('reportesStock.edit', compact('stock'));
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
        $this->Validate($request,[
           'cantidad'=> 'required|min:1',   
          
        ]);

        $stock = Stock::findOrFail($id);
        $stock ->cantidad = $request->input('cantidad');
        $stock ->updated_at = timestamps();
        $stock->save();

        return redirect()->route('reportesStock.index',
        $stock->id)->with('flash_message' , 'Producto id :'.$stock->id.' actualizado');
            


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
    }
}
