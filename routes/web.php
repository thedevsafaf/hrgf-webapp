<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcavationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

//user defined middleware
Route::middleware('authenticate')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::get('/maintenance', function () {
        return view('maintenance');
    })->name('maintenance');

    //Implementation Services
    Route::get('to-implement', [DashboardController::class, 'toImplement'])->name('to_implement');
    Route::resource('excavations', ExcavationController::class);
    //Project Services
    Route::get('project', [DashboardController::class, 'project'])->name('project');
    //Emergency Services
    Route::get('emergency', [DashboardController::class, 'emergency'])->name('emergency');
});

