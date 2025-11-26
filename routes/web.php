<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/rankings', function () {
    return view('rankings');
})->name('rankings');

Route::get('/resultados', function () {
    return view('resultados');
})->name('resultados');

Route::get('/atletas', function () {
    return view('atletas');
})->name('atletas');

Route::get('/equipes', function () {
    return view('equipes');
})->name('equipes');

Route::get('/provas', function () {
    return view('provas');
})->name('provas');

Route::get('/temporadas', function () {
    return view('temporadas');
})->name('temporadas');

Route::get('/pontuacao', function () {
    return view('pontuacao');
})->name('pontuacao');




Route::resource('cidades', CidadeController::class);
Route::resource('categorias', CategoriaController::class);
