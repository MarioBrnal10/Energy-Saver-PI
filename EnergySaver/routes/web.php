<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\UsuariosAdminController;
use App\Http\Controllers\usuariosControler;

Route::get('/', [ControladorVistas::class, 'welcome'])->name('rutaInicio');
Route::get('/Calculadora', [ControladorVistas::class, 'calculadora'])->name('rutaCalculadora');
Route::get('/login', [ControladorVistas::class, 'login'])->name('rutaLogin');
Route::get('/home', [ControladorVistas::class, 'home'])->name('rutaHome');
Route::get('/calcu', [ControladorVistas::class, 'calcula'])->name('rutaCalcu');
Route::get('/vinculaciones', [ControladorVistas::class, 'vinculacion'])->name('rutaVinculaciones');
Route::get('/contactos', [ControladorVistas::class, 'contactos'])->name('rutaContacto');
Route::get('/visual', [ControladorVistas::class, 'visual'])->name('rutaVisual');
Route::get('/consejos', [ControladorVistas::class, 'consejo'])->name('rutaConsejos');

Route::post('/entrar', [ControladorVistas::class, 'inicioSesion'])->name('rutaEntrar');


//rutas usuariosController
Route::get('/usuario/create', [usuariosControler::class, 'create'])->name('rutaFormulario');
Route::post('/Registro', [usuariosControler::class, 'store'])->name('EnviarRegistro');

//Rutas de Administrado

// Ruta para mostrar el formulario
Route::get('/usuarioAdmin/create', [UsuariosAdminController::class, 'create'])->name('rutaAdminForm');

// Ruta para procesar el formulario
Route::post('/registroAdmin', [UsuariosAdminController::class, 'store'])->name('EnviarAdmin');

// Ruta para la vista principal del panel de control
Route::get('/admin', [ControladorVistas::class, 'Administrador'])->name('rutaAdmin');

//Ruta visualizar Administradores
Route::get('/Visual/Admins', [UsuariosAdminController::class,'index'])->name('rutaAdmisVisualizacion');
//Ruta para visualizar Usuarios
Route::get('/Visual/Usua', [UsuariosAdminController::class,'indexUsuarios'])->name('rutaAdminVisualUsuarios');

//Ruta para validar si es administrador o usuario
Route::post('/entrar', [AuthController::class, 'login'])->name('login');


