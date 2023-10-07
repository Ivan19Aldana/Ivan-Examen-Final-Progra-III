<?php

use Illuminate\Support\Facades\Route;

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


Route:: view('/','auth.login');
route::get("/ver",[\App\Http\Controllers\empleadoscontroller::class,'listado'])->name("Listar");
route::get("/mas",[\App\Http\Controllers\empleadoscontroller::class,'crear']);
route::get("/GUARDAR",[\App\Http\Controllers\empleadoscontroller::class,'save'])->name("save");
route::get("/EDITAR/{id}",[\App\Http\Controllers\empleadoscontroller::class,'modificar'])->name('modificar');
route::get("/edita/{id}",[\App\Http\Controllers\empleadoscontroller::class,'edit'])->name('edit');
route::delete("/delete/{id}",[\App\Http\Controllers\empleadoscontroller::class,'delete'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
