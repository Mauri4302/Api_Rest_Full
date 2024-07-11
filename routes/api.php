<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// RUTAS DE LA API
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'], function ()
{
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::post('invoices/bulk',['use' => 'InvoiceController@bulkStore']);
});

// ACA SE EXIGE LA AUTENTICACION Y TENER LOS PERMISOS Y ROLES EN LOS TOKEN QUE ESTAN
// EN EL ARCHIVO web.php
// Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers', 'middleware' => 'auth:sanctum'], function ()
// {
//     Route::apiResource('customers', CustomerController::class);
//     Route::apiResource('invoices', InvoiceController::class);
//     Route::post('invoices/bulk',['use' => 'InvoiceController@bulkStore']);
// });
