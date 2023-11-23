<?php

use App\Http\Controllers\Controller;
use App\Livewire\HomePage;
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

Route::get('/users/{user}',  UsersPage::class);
Route::get('/',  HomePage::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
