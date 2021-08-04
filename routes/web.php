<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HpController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::resources([
    'profiles' => ProfileController::class,
    'hps' => HpController::class,
    'pengalamans' => PengalamanController::class,
    'kontaks' => KontakController::class,
]);
