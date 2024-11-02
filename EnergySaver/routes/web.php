<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;


Route::get('/', [ControladorVistas::class, 'welcome'])->name('rutaInicio');
Route::get('/Calculadora', [ControladorVistas::class, 'calculadora'])->name('rutaCalculadora');
Route::get('/registro', [ControladorVistas::class, 'registro'])->name('rutaFormulario');
Route::get('/login', [ControladorVistas::class, 'login'])->name('rutaLogin');
Route::get('/home', [ControladorVistas::class, 'home'])->name('rutaHome');
Route::get('/calcu', [ControladorVistas::class, 'calcula'])->name('rutaCalcu');
Route::get('/vinculaciones', [ControladorVistas::class, 'vinculacion'])->name('rutaVinculaciones');
Route::get('/contactos', [ControladorVistas::class, 'contactos'])->name('rutaContacto');
Route::get('/visual', [ControladorVistas::class, 'visual'])->name('rutaVisual');
Route::get('/consejos', [ControladorVistas::class, 'consejo'])->name('rutaConsejos');
Route::post('/entrar', [ControladorVistas::class, 'inicioSesion'])->name('rutaEntrar');
Route::post('/enviarRegistro', [ControladorVistas::class, 'Registrar'])->name('rutaEnviarRegistro');