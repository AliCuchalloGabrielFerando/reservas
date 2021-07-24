<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\auxiliar;
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

Route::get('/', function () {
    return view('welcome');
})->name('w');
//Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login',function(){
    return view('auth.login');
})->name('/');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('profile', function () {
  // Only authenticated users may enter...
  return "Hola";
})->middleware('auth','role:all');

Route::post('/login',[LoginController::class,'login'])->name('login');;

Route::get('/cargacion',function(){
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
    "ci"=>"8874491",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"ali"
  ]);
  $persona2 = persona::create([
    "ci"=>"8875691",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"miranda"
  ]);
  $persona3 = persona::create([
    "ci"=>"8875591",
    "apellidoM"=>"materno",
    "apellidoP"=>"paterno",
    "nombre"=>"rafael"
  ]);
  $docente = docente::create([
      "cod"=>"1",
      "persona_ci"=>"8874491"
  ]);
  $jefe = jefe_lab::create([
    "cod"=>"2",
    "correo"=>"miranda@gmail.com",
    "telefono"=>"751615",
    "persona_ci"=>"8875691"
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
    "persona_ci"=>"8875591",
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

    "jefe_lab_cod"=>"2",

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

//Route::get('/gestionar_usuario_c', \App\Http\Livewire\GestionarUsuarioC::class)
Route::get('/gestionar_usuario_c', [\App\Http\Livewire\GestionarUsuarioC::class, 'render'])
    ->name('gestionar_usuario_c');

