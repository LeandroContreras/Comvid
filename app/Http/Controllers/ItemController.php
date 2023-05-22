<?php

namespace App\Http\Controllers;

use App\Item;
use App\Unidades;
use App\Contactos;
use App\Categorias;
use App\Events\ItemEvent;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'categoria_id'=>'required',
    //         'item_id'=>'required',
    //         'contacto_id'=>'required',
    //         'nombre'=>'required',
    //         'precio'=>'required',
    //         'cantidad'=>'required',
    //         'fecha'=>'required',
    //         'obs'=>'required', 
    //     ]);
    //     try{
    //     DB::table('items')->insert([
    //         'item_id'=>$data['categoria_id']. '-'.  $data['item_id'],
    //         'categoria_id'=>$data['categoria_id'],
    //         'nombre'=>$data['nombre'],
    //         'precio'=>$data['precio'],
    //         'cantidad'=>$data['cantidad'],
    //         'fecha'=>$data['fecha'],
    //         'contacto_id'=>$data['contacto_id'],
    //         'obs'=>$data['obs'],
    //         'user_id'=>Auth::user()->id,
    //         'created_at'=>date('Y-m-d H:i:s'),
    //         'updated_at'=>date('Y-m-d H:i:s'),
    //     ]);
    //     $cont=0;
    //     $imp=$data['precio'];
    //     $cant=$data['cantidad']-1;
    //     while ($cont <= $cant) {
    //         $cont ++;
    //         DB::table('unidades')->insert([
    //             'item_id'=>$data['categoria_id']. '-'.  $data['item_id'],
    //             'estado'=>0,
    //             'imp'=>$imp,
    //         ]);
    //     }
    //     } catch(\Exception $e){}
        
    //     event(new ItemEvent($item));
    //     return redirect()->action('ItemController@index');
    // }
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
        'obs'=>'required',
        'punto_r'=>'required' 
    ]);

    $item = new Item();
    $item->item_id = $data['categoria_id']. '-'.  $data['item_id'];
    $item->categoria_id = $data['categoria_id'];
    $item->nombre = $data['nombre'];
    $item->precio = $data['precio'];
    $item->cantidad = $data['cantidad'];
    $item->fecha = $data['fecha'];
    $item->contacto_id = $data['contacto_id'];
    $item->obs = $data['obs'];
    $item->punto_r = $data['punto_r'];
    $item->user_id = Auth::user()->id;
    $item->created_at = date('Y-m-d H:i:s');
    $item->updated_at = date('Y-m-d H:i:s');

    try {
        DB::table('items')->insert([
            'item_id'=>$data['categoria_id']. '-'.  $data['item_id'],
            'categoria_id'=>$data['categoria_id'],
            'nombre'=>$data['nombre'],
            'precio'=>$data['precio'],
            'cantidad'=>$data['cantidad'],
            'fecha'=>$data['fecha'],
            'contacto_id'=>$data['contacto_id'],
            'punto_r'=>$data['punto_r'],
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
                'item_id'=>$data['categoria_id']. '-'.  $data['item_id'],
                'estado'=>0,
                'imp'=>$imp,
            ]);
        }
        event(new ItemEvent($item));
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
    public function edit($id)
    {
        $item = Item::where('item_id', $id)->firstOrFail();
        return view('item.edit', compact('item'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validar los campos del formulario
    $validatedData = $request->validate([
        'nombre' => 'required',
        'categoria_id' => 'required',
        'cantidad' => 'required|numeric',
        'precio' => 'required|numeric',
    ]);

    // Buscar el item en la base de datos
    $item = Item::where('item_id', $id)->first();
    $puntoReorden = $item->punto_reorden;

    // Calcular la diferencia entre la cantidad anterior y la nueva cantidad
    $cantidadAnterior = $item->cantidad;
    $cantidadNueva = $validatedData['cantidad'];
    $diferencia = $cantidadNueva - $cantidadAnterior;

    // Actualizar los campos del item con los valores del formulario
    $item->nombre = $validatedData['nombre'];
    $item->categoria_id = $validatedData['categoria_id'];
    $item->cantidad = $cantidadNueva;
    $item->precio = $validatedData['precio'];

    // Guardar los cambios en la base de datos
    $item->save();

    // Obtener el precio del producto
    $precio = $item->precio;

    // Si la cantidad ha aumentado, crear nuevas unidades
    if ($diferencia > 0) {
        for ($i = 0; $i < $diferencia; $i++) {
            $unidad = new Unidades();
            $unidad->item_id = $item->item_id;
            $unidad->imp = $precio;
            $unidad->save();
        }
    }

    // Si la cantidad ha disminuido, eliminar unidades
    if ($diferencia < 0) {
        $unidades = Unidades::whereHas('item', function($query) use ($item) {
            $query->where('item_id', $item->item_id);
        })->pluck('unidad_id');
        $unidadesParaEliminar = $unidades->take(-$diferencia);
        Unidades::whereIn('unidad_id', $unidadesParaEliminar)->delete();
    }
    $cantidadActual = $item->cantidad;
    if ($cantidadActual < $puntoReorden) {
        session()->flash('alert', '¡Alerta! La cantidad actual es menor que el punto de reorden. Por favor, reabastécete de productos.');
    }
        // Redirigir al usuario de vuelta a la página de detalle del item
        return redirect()->route('item.index', ['item_id' => $id]);
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
