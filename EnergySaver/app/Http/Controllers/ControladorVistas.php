<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorLogin;
use App\Http\Requests\validadorRegistro;
use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    public function calculadora(){
        return view('calculadora');
    }

    public function registro(){
        return view('formulario');
    }

    public function login(){
        return view('login');
    }

    public function home(){
        return view('home');
    }

    public function calcula(){
        return view('calcu');
    }

    public function vinculacion(){
        return view('vinculaciones');
    }

    public function contactos(){
        return view('contacto');
    }

    public function visual(){
        return view('visualizacion');
    }

    public function consejo(){
        return view('consejos');
    }

    public function inicioSesion(validadorLogin $peticion){
    $correo = $peticion->input('correo');

    session()->flash('exito', 'Inicio de sesión correcto para: ' . $correo);

    return to_route('rutaLogin');
    }

    public function Registrar(validadorRegistro $peticion2){
        $usuario = $peticion2->input('nombre');

        session()->flash('Guardado', 'Se ha Hecho un Registro Exitoso');

        return to_route('rutaFormulario');
    }

}
