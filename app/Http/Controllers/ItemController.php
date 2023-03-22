<?php

namespace App\Http\Controllers;

use App\Item;
use App\Contactos;
use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
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
        $item = Item::all();
        return view('item.index', compact('item',$item));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto= Contactos::where('tipo', 'Proveedor')->get();
        $categoria = Categorias::all(); 
        $porcentaje = 0; 
        return view('item.create', compact('porcentaje'))
        ->with('categoria', $categoria)
        ->with('contacto', $contacto);

    }
    public function mostrarCategoria($id)
    {
        $categoria = Categorias::find($id);
        if ($categoria) {
            return view('mostrar-categoria', ['categoria' => $categoria]);
          } else {
            return view('error-categoria');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id'=>'required',
            'item_id'=>'required',
            'contacto_id'=>'required',
            'nombre'=>'required',
            'precio'=>'required',
            'cantidad'=>'required',
            'fecha'=>'required',
            'obs'=>'required'
        ]);
        try{
        DB::table('items')->insert([
            'item_id'=>$data['item_id'],
            'categoria_id'=>$data['categoria_id'],
            'nombre'=>$data['nombre'],
            'precio'=>$data['precio'],
            'cantidad'=>$data['cantidad'],
            'fecha'=>$data['fecha'],
            'contacto_id'=>$data['contacto_id'],
            'obs'=>$data['obs'],
            'user_id'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $cont=0;
        $imp=$data['precio'];
        $cant=$data['cantidad']-1;
        while ($cont <= $cant) {
            $cont ++;
            DB::table('unidades')->insert([
                'item_id'=>$data['item_id'],
                'estado'=>0,
                'imp'=>$imp,
            ]);
        }
        } catch(\Exception $e){}
        return redirect()->action('ItemController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
