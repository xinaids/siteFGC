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


// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Outras páginas soltas (se existirem)
Route::get('/rankings', function () {
    return view('rankings');
})->name('rankings');

Route::get('/resultados', function () {
    return view('resultados');
})->name('resultados');



// CRUDs oficiais — não criar rotas duplicadas
Route::resource('cidades', CidadeController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('equipes', EquipeController::class);
Route::resource('temporadas', TemporadaController::class);
Route::resource('pontuacao', PontuacaoController::class);
Route::resource('provas', ProvaController::class);
Route::resource('atletas', AtletaController::class);
Route::resource('resultados', ResultadoController::class);

Route::get('/resultados', [ResultadoController::class, 'index'])->name('resultados');
