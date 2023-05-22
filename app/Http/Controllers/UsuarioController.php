<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Events\NuevoUsuarioCreado;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UsuarioController extends Controller
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
    $usuario = User::get();
    return view('usuario.index', compact('usuario'));
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
        // Lógica para crear un nuevo usuario

        $usuario = User::create([
            // ...
        ]);

        event(new NuevoUsuarioCreado($usuario));

        $administradores = User::whereHas('roles', function($q){
            $q->where('name', 'administrador');
        })->get();

        Notification::send($administradores, new NuevoUsuarioCreado($usuario));

        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $usuario = User::find($id);
       return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
{
    $roles = Role::all();
    return view('usuario.edit', ['usuario' => $usuario, 'roles' => $roles]);
}

    public function editarus($id)
    {
        $user = User::findOrFail($id);
        return view('usuario.editarus', ['user' => $user]);
    }

    public function updateus(Request $request, $id)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|min:6',
    ]);

    // Actualizar el usuario en la base de datos
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }
    $user->save();

    // Redirigir al usuario a la página de detalles del usuario
    return redirect()->route('usuario.index', ['id' => $user->id])->with('status', 'El usuario ha sido actualizado correctamente');
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);

        return redirect()->route('usuario.edit', $usuario)->with('info', 'Se asigno el rol de usuario correctamente');
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
