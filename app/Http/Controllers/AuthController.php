<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }

    // Metodo para guardar la informacion en la base de datos
    public function register(Request $request){
        // Recabar la información desde el formulario
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'password' => 'required|confirmed|min: 8',
    ]);

        // Guardar la información en la base de datos
        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
            // Uso de has() para el manejo del checkbox
        ]);

        //Iniciar sesión de forma automática
        Auth::login($user);

        return redirect()->route('pedidos.index');

    }

    // Método para regresar vista de inicio de sesión
    public function loginForm(){
        return view('auth.login');
    }

    // Método para iniciar sesión
    public function login(Request $request){

    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Realizar intento de inicio de sesión
    if(Auth::attempt($data)){
        // Obtener información de la sesión y generar sus credenciales
        $request -> session()->regenerate();
        // Redireccionar al usuario con su sesión iniciada
        return redirect()->route('pedidos.index');
    }

    // Si los datos son incorrectos, mandar un error
    return back()->withErrors([
        'email' => 'Datos incorrectos'
    ]);

    }

    // Método para cerrar sesión e invalidar las credenciales
    public function logout(Request $request){
       
        // Cerrar sesión
        Auth::logout();
        
        // Cierre de credenciales en las sesiones
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/acceso');

    }

}


