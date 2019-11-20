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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('trabajadores', 'TrabajadoresController');

Route::resource('fuera_actividad', 'FueraActividadController');

Route::resource('cargo', 'CargoController');

Route::resource('centro', 'CentroController');

Route::resource('subcentro', 'SubcentroController');

Route::resource('datos_militares', 'DatosMilitaresController');

Route::resource('contratos', 'ContratoController', [ 'only'=>['index','show'] ]);

Route::resource('trabajadores.contratos', 'TrabajadorContratoController', [ 'except'=>['show','edit','create'] ]);
