<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
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
        $categorias=Categorias::all();
        return view('categoria.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Con esta linea puedo ver lo que estoy mandando en el formulario
        //dd($request->all());
        $data=request()->validate([
            'categoria_id'=>'required',
            'descripcion'=>'required',
            'tamaño'=>'nullable',
            'eje'=>'nullable',
            'color'=>'nullable',
            'forma'=>'nullable',
            'tipo'=>'nullable',
            'funcion'=>'nullable',
            'malla'=>'nullable',
        ]);
        DB::table('categorias')->insert([
            'categoria_id'=>$data['categoria_id'],
            'descripcion'=>$data['descripcion'],
            'tamaño'=>$data['tamaño'],
            'eje'=>$data['eje'],
            'color'=>$data['color'],
            'forma'=>$data['forma'],
            'tipo'=>$data['tipo'],
            'funcion'=>$data['funcion'],
            'malla'=>$data['malla'],
            'user_id'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect()->action('CategoriasController@index');
    }
    public function mostrarCategoria($id)
{
  $categorias = Categorias::find($id);
  return view('item.create', ['categorias' => $categorias]);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
