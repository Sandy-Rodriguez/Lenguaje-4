<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;




    // Ruta Proyecto

// INDEX
Route::get('/proyectos',[ProyectoController::class,'index'])->name('proyecto.index');
// SHOW
Route::get('/proyectos/{id}/show',[ProyectoController::class,'show'])->where('id','[0-9]+')->name('proyecto.show');
// CREATE Y STORE
Route::get('/proyectos/crear',[ProyectoController::class,'create'])->name('proyecto.crear');
Route::post('/proyectos/crear',[ProyectoController::class,'store'])->name('proyecto.store');
// EDIT
Route::get('/proyectos/{id}/editar',[ProyectoController::class,'edit'])->whereNumber('id')->name('proyecto.editar');
Route::put('/proyectos/{id}/editar',[ProyectoController::class,'update'])->whereNumber('id')->name('proyecto.update');
//DELETE
Route::delete('/proyectos/{id}/borrar',[ProyectoController::class,'destroy'])->whereNumber('id')->name('proyecto.borrar');



    // Ruta Tarea
// INDEX
Route::get('/tareas',[TareaController::class,'index'])->name('tarea.index');
// SHOW
Route::get('/tareas/{id}/show',[TareaController::class,'show'])->where('id','[0-9]+')->name('tarea.show');
// CREATE Y STORE
Route::get('/tareas/crear',[TareaController::class,'create'])->name('tarea.crear');
Route::post('/tareas/crear',[TareaController::class,'store'])->name('tarea.store');
// EDIT
Route::get('/tareas/{id}/editar',[TareaController::class,'edit'])->whereNumber('id')->name('tarea.editar');
Route::put('/tareas/{id}/editar',[TareaController::class,'update'])->whereNumber('id')->name('tarea.update');
//DELETE
Route::delete('/tareas/{id}/borrar',[TareaController::class,'destroy'])->whereNumber('id')->name('tarea.borrar');



    // Ruta Usuario
// INDEX
Route::get('/usuarios',[UsuarioController::class,'index'])->name('usuario.index');
// SHOW
Route::get('/usuarios/{id}/show',[UsuarioController::class,'show'])->where('id','[0-9]+')->name('usuario.show');
// CREATE Y STORE
Route::get('/usuarios/crear',[UsuarioController::class,'create'])->name('usuario.crear');
Route::post('/usuarios/crear',[UsuarioController::class,'store'])->name('usuario.store');
// EDIT
Route::get('/usuarios/{id}/editar',[UsuarioController::class,'edit'])->whereNumber('id')->name('usuario.editar');
Route::put('/usuarios/{id}/editar',[UsuarioController::class,'update'])->whereNumber('id')->name('usuario.update');
//DELETE
Route::delete('/usuarios/{id}/borrar',[UsuarioController::class,'destroy'])->whereNumber('id')->name('usuario.borrar');


