<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* DB::listen(function($query){
    echo "<pre>{$query->sql}</pre>";
    //echo "<pre>{$query->time}</pre>";
}); */

Route::resource('marca', 'MarcaController')->except(['create', 'edit']);
Route::resource('agencia', 'AgenciaController')->except(['create', 'edit']);