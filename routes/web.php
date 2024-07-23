<?php

use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

//Route::get('contact', [PrimerControlador::class, 'index'])->name('contact');

Route::resource('contact', PrimerControlador::class);

