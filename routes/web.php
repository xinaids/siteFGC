<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipeController;

// Página inicial → Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Páginas simples (ainda sem CRUD)
Route::get('/rankings', function () {
    return view('rankings');
})->name('rankings');

Route::get('/resultados', function () {
    return view('resultados');
})->name('resultados');

Route::get('/atletas', function () {
    return view('atletas');
})->name('atletas');

Route::get('/provas', function () {
    return view('provas');
})->name('provas');

Route::get('/temporadas', function () {
    return view('temporadas');
})->name('temporadas');

Route::get('/pontuacao', function () {
    return view('pontuacao');
})->name('pontuacao');

// CRUDs
Route::resource('cidades', CidadeController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('equipes', EquipeController::class); // CORRETO
