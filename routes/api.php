<?php

use App\Http\Controllers\HpController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengalamanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resources([
    'hps' => HpController::class,
    'kontaks' => KontakController::class,
    'profiles' => ProfileController::class,
    'pengalamans' => PengalamanController::class,
]);