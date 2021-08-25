<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\auxiliar;
use App\Models\universidad;
use App\Models\facultad;
use App\Models\carrera;
use App\Models\materia;
use App\Models\materia_grupom;
use App\Models\grupom;
use App\Models\modulo;
use App\Models\tipo_aula;
use App\Models\gestion_academica;

use App\Models\docente;
use App\Models\grupo;
use App\Models\jefe_lab;
use App\Models\persona;
use App\Models\tipo_auxiliar;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminRole;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*DB_CONNECTION=pgsql
DB_HOST=ec2-54-83-82-187.compute-1.amazonaws.com
DB_PORT=5432
DB_DATABASE=dchqfk38f1ticu
DB_USERNAME=avxcspzvojdxoz
DB_PASSWORD=c9e4208e6e1976e92e45bd5a711fea2ffa23c426a847fa198ef482aaf6866d18*/


Route::get('/', function () {
    return redirect(\route('gestionar_usuario_c'));
})->name('w');


Route::middleware(['auth', 'role:all'])->group(function () {
    Route::get('/reservas', \App\Http\Livewire\Reserva\Reservas::class)->name('reservas');
    Route::get('/aula/{id}/calendario',\App\Http\Livewire\Reserva\Calendario::class )->name('reserva.calendario');
    Route::get('/reserva/{id?}', \App\Http\Livewire\Reserva\CrearReserva::class)->name('reserva.crear');
    //Route::get('/reserva/editar/{id}',\App\Http\Livewire\Reserva\EditarReserva::class)->name('reserva.editar');
});

Route::middleware(['auth','role:Jefe Laboratorio'])->group(function (){
    Route::get('/reporte',\App\Http\Livewire\Pdfs::class)->name('reporte');

    Route::get('/gestionar_modulo_c/{id}',\App\Http\Livewire\GestionarModuloC::class)
        ->name('gestionar_modulo_c')->middleware('auth');

    Route::get('/gestionar_aula_c/{id}',\App\Http\Livewire\GestionarAulaC::class)
        ->name('gestionar_aula_c')->middleware('auth');

    Route::get('/gestionar_facultad_c',\App\Http\Livewire\GestionarFacultadC::class)
        ->name('gestionar_facultad_c')->middleware('auth');
    Route::get('/gestionar_usuario_c',\App\Http\Livewire\GestionarUsuarioC::class)
        ->name('gestionar_usuario_c')->middleware('auth');
    Route::get('/reporte',\App\Http\Livewire\Pdfs::class)
        ->name('reporte');
    Route::get('/ver/{fecha_inicio?}/{fecha_fin?}', [\App\Http\Controllers\ReporteController::class, 'index'])
        ->name('ver');;

});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Route::get('/repo',function (){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('reportenuevo');
    return $pdf->stream();
});*/

/*Route::get('/ver/{fecha_inicio?}/{fecha_fin?}',function (){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('reporte',[
        'users' => user::all() ]);
    return $pdf->stream();
})->name('ver');*/


Route::get('/login',function(){
    return view('auth.login');
})->name('/');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

/*Route::get('profile', function () {
  // Only authenticated users may enter...
  return "Hola";
})->middleware('auth','role:all');*/

Route::post('/login',[LoginController::class,'login'])->name('login');


