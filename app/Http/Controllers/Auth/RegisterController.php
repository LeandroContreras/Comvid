<?php

namespace App\Http\Controllers\Auth;



use App\User; // Agrega esta línea
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Traits\HasRoles;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RegisterController extends Controller
{
    use RegistersUsers, HasRoles;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

public function __construct()
{
    $this->middleware(['guest', 'role:Administrador']);
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign user role
        $role = Role::where('name', $request->role)->first();
        $user->assignRole($role);

        return redirect()->back()->with('success', 'Usuario creado exitosamente!');
    }
    public function showRegistrationForm()
    {
        if (!Auth::check() || !Auth::user()->hasRoles('Administrador')) {
            return redirect()->back()->withErrors(['error' => 'No tienes permiso para acceder a esta página']);
        }
    
        $roles = Role::all();
        return view('auth.register-user', compact('roles'));
    }
}