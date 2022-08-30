<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contactos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Con esta linea podemos mostrar consultando la base de datos de la tabla contactos
        //Con el comando pluck mostramos que atributos queremos que se muestren
        DB::table('contactos')->get()->pluck('nombres','id', 'apellidos')->dd();
        return view('contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Con esta linea podemos ver todo lo que mandamos en una ventana que parece consola
        //dd( $request->all());
        $data=request()->validate([
            'nombres'=>'required|min:4',
            'apellidos'=>'required|min:6',
            'telefono'=>'required',
            'tipo'=>'required',
            'departamento'=>'required',
            'descripcion'=>'required',
        ]);
        DB::table('contactos')->insert([
            'nombres'=>$data['nombres'],
            'apellidos'=>$data['apellidos'],
            'telefono'=>$data['telefono'],
            'descripcion'=>$data['descripcion'],
        ]);
        return redirect()->action('ContactoController@index');
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
        //
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
        //
    }
}
