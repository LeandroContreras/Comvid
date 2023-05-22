<?php

namespace App\Http\Controllers;

use App\Item;
use App\Ventas;
use App\Contactos;
use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index()
    {
        return view('ventas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = Contactos::where('tipo', 'Cliente')->get();
        $items = Item::all();
        $categoria = Categorias::all();
        $porcentaje = 0;
        return view('ventas.create', compact('porcentaje', $porcentaje))
        ->with('contacto', $contacto)
        ->with('categoria', $categoria)
        ->with('items', $items);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
             'categoria'=>'required',
             'producto'=>'required',
             'cliente'=>'required',
             'cantidad'=>'required',
             'fecha'=>'required',
             'total'=>'required',
             'precio'=>'required'
         ]);
    
         try {
            DB::table('ventas')->insert([
                 'item_id'=>$data['producto'][0],
                 'precio' => $data['precio'][0],
                 'cantidad'=>$data['cantidad'][0],
                 'fecha'=>$data['fecha'],
                 'total'=>$data['total'],
                 'contacto_id'=>$data['cliente'],
                 'user_id'=>Auth::user()->id,
                 'created_at'=>date('Y-m-d H:i:s'),
                 'updated_at'=>date('Y-m-d H:i:s'),
             ]);
    
             return redirect()->action('ItemController@index');
         } catch (\Exception $e) {
             return back()->with('error', 'Error al insertar en la base de datos');
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventas $ventas)
    {
        //
    }
}
