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
    return view('welcome');
})->name('w');


Route::middleware(['auth', 'role:all'])->group(function () {
    Route::get('/reservas', \App\Http\Livewire\Reserva\Reservas::class)->name('reservas');
    Route::get('/aula/{id}/calendario',\App\Http\Livewire\Reserva\Calendario::class )->name('reserva.calendario');
    Route::get('/reserva/{id?}', \App\Http\Livewire\Reserva\CrearReserva::class)->name('reserva.crear');
    //Route::get('/reserva/editar/{id}',\App\Http\Livewire\Reserva\EditarReserva::class)->name('reserva.editar');
});


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gestionar_usuario_c',\App\Http\Livewire\GestionarUsuarioC::class)
    ->name('gestionar_usuario_c')->middleware('auth');
Route::get('/reporte',\App\Http\Livewire\Pdf::class);

Route::get('/gestionar_modulo_c',\App\Http\Livewire\GestionarModuloC::class)
    ->name('gestionar_modulo_c')->middleware('auth');

Route::get('/gestionar_aula_c',\App\Http\Livewire\GestionarAulaC::class)
    ->name('gestionar_aula_c')->middleware('auth');

Route::get('/login',function(){
    return view('auth.login');

})->name('/');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('profile', function () {
  // Only authenticated users may enter...
  return "Hola";
})->middleware('auth','role:all');

Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/poblado',function (){
    $universidad = universidad::create([
        "nombre"=>"universidad autonoma gabriel rene moreno",
        "abreviatura"=>"UAGRM"
    ]);
    $facultad = facultad::create([
        "nombre"=>"facultad de ingenieria en ciencias de la computacion y telecomunicacion",
        "abreviatura"=>"FICTT",
        "codigo"=>"1000",
        "universidad_id"=>"1"
    ]);
    $modulo = modulo::create([
        "nro"=>"236",
        "facultad_id"=>"1"
    ]);
    $carrera1 = carrera::create([
        "nombre"=>"ingenieria en sistemas",
        "facultad_id"=>"1",
        "sigla"=>"187-4"
    ]);
    $carrera1 = carrera::create([
        "nombre"=>"ingenieria en sistemas",
        "facultad_id"=>"1",
        "sigla"=>"187-4"
    ]);
    $carrera2 = carrera::create([
        "nombre"=>"ingenieria Informatica",
        "facultad_id"=>"1",
        "sigla"=>"187-3"
    ]);
    $carrera3 = carrera::create([
        "nombre"=>"ingenieria en Redes",
        "facultad_id"=>"1",
        "sigla"=>"187-2"
    ]);
    $materia1 = materia::create([
        "nombre"=>"programacion 1",
        "sigla"=>"inf-100",
        "creditos"=>"5",
        "nivel"=>"3",
        "carrera_id"=>"1"
    ]);
    $materia2 = materia::create([
        "nombre"=>"programacion 2",
        "sigla"=>"inf-101",
        "creditos"=>"5",
        "nivel"=>"4",
        "carrera_id"=>"2"
    ]);
    $materia3 = materia::create([
        "nombre"=>"estructura de datos 1",
        "sigla"=>"inf-200",
        "creditos"=>"5",
        "nivel"=>"5",
        "carrera_id"=>"3"
    ]);
    $grupo1 = grupom::create([
            "nombre"=>"sa"
    ]);
    $grupo1 = grupom::create([
        "nombre"=>"sb"
    ]);
    $grupo1 = grupom::create([
        "nombre"=>"sc"
    ]);
    $materiag = materia_grupom::create([
        "materia_id"=>"1",
        "grupom_id"=>"1",
    ]);
    $materiag = materia_grupom::create([
        "materia_id"=>"1",
        "grupom_id"=>"2",
    ]);
    $materiag = materia_grupom::create([
        "materia_id"=>"2",
        "grupom_id"=>"2",
    ]);
    $materiag = materia_grupom::create([
        "materia_id"=>"3",
        "grupom_id"=>"1",
    ]);
    $materiag = materia_grupom::create([
        "materia_id"=>"3",
        "grupom_id"=>"3",
    ]);
    $gestion = gestion_academica::create([
        "alta_baja"=>"nose",
        "anio"=>"2021",
        "estado"=>"abierto",
        "semestre"=>"1",
        "usuario"=>"gestionador",
        "fechaR"=>"2021-03-22"
    ]);
    return "poblado completo";
});

Route::get('/carga',function(){
  $grupo = grupo::create([
    "alta_baja"=>"dfs",
    "descripcion"=>"descripcion chafa",
    "nombre"=>"docentes",
    "usuario"=>"ali",
    "fechaR"=>"2021-07-22"
  ]);

  $grupo = grupo::create([
    "alta_baja"=>"dfs",
    "descripcion"=>"descripcion chafa",
    "nombre"=>"jefe laboratorio",
    "usuario"=>"ali",
    "fechaR"=>"2021-07-22"
  ]);
  $grupo = grupo::create([
    "alta_baja"=>"dfs",
    "descripcion"=>"descripcion chafa",
    "nombre"=>"auxiliares",
    "usuario"=>"ali",
    "fechaR"=>"2021-07-22"
  ]);
  $persona1 = persona::create([
    "ci"=>"5574491",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"ali"
  ]);
  $persona2 = persona::create([
    "ci"=>"4475691",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"miranda"
  ]);
  $persona3 = persona::create([
    "ci"=>"9975591",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"rafael"
  ]);
  $docente = docente::create([
      "cod"=>"1",
      "persona_ci"=>"5574491"
  ]);
  $jefe = jefe_lab::create([
    "cod"=>"2",
    "correo"=>"miranda@gmail.com",
    "telefono"=>"751615",
    "persona_ci"=>"4475691"
  ]);
  $tipo_a = tipo_auxiliar::create([
    "alta_baja"=>"nose",
    "descripcion"=>"es auxiliar",
    "usuario"=>"a de auxiliar",
    "carga_horaria"=>"10",
    "fechaR"=>"2021-07-22"
  ]);
  $auxiliar = auxiliar::create([
    "cod"=>"3",
    "alta_baja"=>"nose",
    "ciudad"=>"mifacultad",
    "correo"=>"taborga@gmail.com",
    "usuario"=>"asociado",
    "fechaR"=>"2021-07-22",
    "fecha_nacimiento"=>"2001-07-22",
    "codigo_aux"=>"100",
    "registro"=>"1500",
    "telefono"=>"54221",
    "numero_formulario"=>"100",
    "cv"=>"100101010",
    "persona_ci"=>"9975591",
    "tipo_auxiliar_id"=>"1"
  ]);

  $usuario1 = User::create([
    'name'=>"ali",
    'email'=>"ali@gmail.com",
    'password'=>Hash::make("password"),
    "alta_baja"=>"nose",
    "usuario"=>"megali",
    "fechaR"=>"2001-07-22",
    "grupo_id"=>"1",
    "docente_cod"=>"1"

  ]);
  $usuario2 = User::create([
    'name'=>"miranda",
    'email'=>"miranda@gmail.com",
    'password'=>Hash::make("password"),
    "alta_baja"=>"nose",
    "usuario"=>"megamiranda",
    "fechaR"=>"2001-07-22",
    "grupo_id"=>"2",
    "jefe_lab_cod"=>"2"

  ]);
  $usuario3 = User::create([
    'name'=>"rafael",
    'email'=>"rafael@gmail.com",
    'password'=>Hash::make("password"),
    "alta_baja"=>"nose",
    "usuario"=>"megali",
    "fechaR"=>"2001-07-22",
    "grupo_id"=>"3",
    "auxiliar_cod"=>"3"
  ]);
  return "hola";

});

Route::get('/prueba',function(){
    return "hola mundo";
});
