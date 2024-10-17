<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', PokedexController::class);
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::resource('pokemon', PokemonController::class)->except('show');
});

Route::get('pokemon/{id}', [PokemonController::class, 'show'])->name('pokemon.show');
