<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatisticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('tasks', TaskController::class)->only(['create', 'store', 'index']);
Route::get('users/statistics', [UserStatisticsController::class, 'showUserTaskStatistics'])->name('user.statistics');

Route::get('/search/users', [UserController::class, 'search'])->name('users.search');
Route::get('/search/admins', [AdminController::class, 'search'])->name('admins.search');