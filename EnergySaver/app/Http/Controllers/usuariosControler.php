<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Carbon\Carbon;
use App\Http\Requests\validadorRegistro;

class usuariosControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = DB::table('generos')->select('id', 'nombre')->get();

    return view('formulario', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validadorRegistro $request)
{
    DB::table('usuarios')->insert([
        "Nombre" => $request->input('nombre'),
        "Apellidos" => $request->input('apellidos'),
        "Fecha_nacimiento" => $request->input('fecha_nacimiento'),
        "Correo" => $request->input('correo'),
        "Contraseña" => bcrypt($request->input('password')), // Cambiado a "Contraseña"
        "Id_genero" => $request->input('genero'), // Cambiado a "Id_genero"
        "created_at" => Carbon::now(),
        "updated_at" => Carbon::now(),
    ]);

    $usuario = $request->input('nombre');
    session()->flash('exito', 'Se guardó el usuario: ' . $usuario);

    return to_route('rutaLogin');
}


    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
