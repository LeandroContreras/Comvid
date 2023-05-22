<?php

namespace App\Http\Controllers;
use App\Item;
use App\Contactos;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Categorias;
use Illuminate\Http\Request;
use App\Exports\InventarioExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventarioController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $contacto = Contactos::where('tipo', 'Cliente')->get();
        $items = Item::all();
        $categoria = Categorias::all();
        $porcentaje = 0;
        return view('inventario.index')
        ->with('contacto', $contacto)
        ->with('categoria', $categoria)
        ->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $item = Item::find($id);
        return view('item.edit', compact('item'));
    }

    public function reporte(){
        $contacto = Contactos::where('tipo', 'Cliente')->get();
        $items = Item::all();
        $categoria = Categorias::all();
        return view('inventario.reporte')
        ->with('contacto', $contacto)
        ->with('categoria', $categoria)
        ->with('items', $items);
    }

    public function reporteexcel(){
        $items = Item::all();
        return view('inventario.reporteexcel')
        ->with('items', $items);
        ;
    }

    public function exportarexcel()
    {
        $items = Item::all();
        return Excel::download(
            new InventarioExport($items),
            'inventario.xlsx'
        );
    }

    public function reportepdf(){
        $items=DB::table('items')->paginate();
        
        // Crea una nueva instancia de Dompdf
        $dompdf = new Dompdf();

        // Renderiza la plantilla de Blade y almacena el HTML en una variable
        $html = view('inventario.reporte', compact('items'))->render();
        //&$html = '<h1>Hola mundo!</h1><p>Este es un ejemplo de PDF generado con Dompdf.</p>';

        // Carga el contenido HTML
        $dompdf->loadHtml($html);

        // Establece el tamaño y orientación del papel
        $dompdf->setPaper('letter', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Salida del PDF al navegador
        $dompdf->stream();
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
