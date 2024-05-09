<?php

use App\Http\Controllers\RoupasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cadastroRoupas',[RoupasController::class,'cadastroRoupas']);
Route::get('pesquisaCategoria',[RoupasController::class,'pesquisarPorCategoria']);
Route::delete('excluir/{id}',[RoupasController::class,'excluir']);
Route::get('vizualizar',[RoupasController::class,'retornarTodos']);
Route::put('editar/{id}',[RoupasController::class,'editarRoupas']);


