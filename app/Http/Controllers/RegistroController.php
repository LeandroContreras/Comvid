<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Events\NuevoUsuarioEvent;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UsuarioNotification;

class RegistroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function showRegistrationForm()
    {
        // Obtener todos los roles para pasarlos a la vista
        $roles = Role::all();

        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
{
    // Validar los datos del formulario de registro
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|exists:roles,id',
    ]);

    // Crear el nuevo usuario con los datos enviados por el formulario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Asignar el rol correspondiente al nuevo usuario
    $role = Role::findOrFail($request->role);
    $user->assignRole($role->name);
    //auth()->user()->notify(new UsuarioNotification($user));
    // User::all()
    //     ->except($user->id)
    //     ->each(function(User $usuario) use ($user){
    //         $usuario->notify(New UsuarioNotification($user));
    //     });
    // Redirigir al usuario a la página de inicio después del registro
    event(new NuevoUsuarioEvent($user));
    return redirect('/usuario')->with('success', '¡Registro exitoso!');
}
}