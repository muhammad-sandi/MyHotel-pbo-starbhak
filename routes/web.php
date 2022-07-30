<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FasilitasUmumController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('hometamu');
});

Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/fasilitasumum', [FasilitasUmumController::class, 'index']);


Route::post('/pesankamar', [PesanController::class, 'pesan']);
