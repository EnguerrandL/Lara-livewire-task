<?php

use App\Http\Controllers\Controller;
use App\Livewire\Calendar;
use App\Livewire\HomePage;
use App\Livewire\TaskPage;
use App\Livewire\UserManagement;
use App\Livewire\UsersPage;
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

// Route::view('/', 'welcome', [Controller::class, 'SearchUsers']);


// Route::get('/', [Controller::class, 'index'])->name('index');

// Route::get('/users/{user}',  UsersPage::class);
Route::get('/tasks',  TaskPage::class);
Route::get('/users', UserManagement::class);
Route::get('/', Calendar::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
