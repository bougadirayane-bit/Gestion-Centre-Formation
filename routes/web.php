<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FiliereController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\InscriptionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('filieres', FiliereController::class);
Route::resource('stagiaires', StagiaireController::class);
Route::resource('inscriptions', InscriptionController::class);
