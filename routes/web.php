<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\PontuacaoController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\RankingController;

// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


// CRUDs — sem rotas duplicadas
Route::resource('cidades', CidadeController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('equipes', EquipeController::class);
Route::resource('temporadas', TemporadaController::class);
Route::resource('pontuacao', PontuacaoController::class);
Route::resource('provas', ProvaController::class);
Route::resource('atletas', AtletaController::class);
Route::resource('resultados', ResultadoController::class);
Route::get('/rankings', [RankingController::class, 'index'])->name('rankings');
