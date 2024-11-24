<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(validadorLogin $request)
    {

        // Buscar el correo en la tabla de usuarios
        $usuario = DB::table('usuarios')->where('Correo', $request->correo)->first();
        if ($usuario && Hash::check($request->contraseña, $usuario->Contraseña)) {
            // Redirigir a la vista de usuario
            return view('home', ['usuario' => $usuario]);
        }

        // Buscar el correo en la tabla de administradores
        $admin = DB::table('administradores')->where('correo', $request->correo)->first();
        if ($admin && Hash::check($request->contraseña, $admin->contraseña)) {
            // Redirigir a la vista de administrador
            return view('Admin', ['admin' => $admin]);
        }

        // Si no se encuentra en ninguna tabla
        return back()->withErrors(['correo' => 'El correo o la contraseña son incorrectos.'])->withInput();
    }
}

