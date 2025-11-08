<?php

use Illuminate\Support\Facades\Route;

// Página inicial (login)
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@autenticar')->name('autenticar');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

// Rotas protegidas (após login)
Route::middleware(['web', 'auth'])->group(function() {
    
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    // Setores
    Route::get('/setores', 'App\Http\Controllers\SetorController@index')->name('setores.index');
    Route::get('/setores/criar', 'App\Http\Controllers\SetorController@create')->name('setores.create');
    Route::post('/setores', 'App\Http\Controllers\SetorController@store')->name('setores.store');
    Route::get('/setores/{id}/editar', 'App\Http\Controllers\SetorController@edit')->name('setores.edit');
    Route::put('/setores/{id}', 'App\Http\Controllers\SetorController@update')->name('setores.update');
    Route::delete('/setores/{id}', 'App\Http\Controllers\SetorController@destroy')->name('setores.destroy');

    // Consumos
    Route::get('/consumos', 'App\Http\Controllers\ConsumoController@index')->name('consumos.index');
    Route::get('/consumos/criar', 'App\Http\Controllers\ConsumoController@create')->name('consumos.create');
    Route::post('/consumos', 'App\Http\Controllers\ConsumoController@store')->name('consumos.store');
    Route::get('/consumos/{id}/editar', 'App\Http\Controllers\ConsumoController@edit')->name('consumos.edit');
    Route::put('/consumos/{id}', 'App\Http\Controllers\ConsumoController@update')->name('consumos.update');
    Route::delete('/consumos/{id}', 'App\Http\Controllers\ConsumoController@destroy')->name('consumos.destroy');

    // Ações sustentáveis
    Route::get('/acoes', 'App\Http\Controllers\AcaoController@index')->name('acoes.index');
    Route::get('/acoes/criar', 'App\Http\Controllers\AcaoController@create')->name('acoes.create');
    Route::post('/acoes', 'App\Http\Controllers\AcaoController@store')->name('acoes.store');
    Route::get('/acoes/{id}/editar', 'App\Http\Controllers\AcaoController@edit')->name('acoes.edit');
    Route::put('/acoes/{id}', 'App\Http\Controllers\AcaoController@update')->name('acoes.update');
    Route::delete('/acoes/{id}', 'App\Http\Controllers\AcaoController@destroy')->name('acoes.destroy');
});
