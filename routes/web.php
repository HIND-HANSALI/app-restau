<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatController;
use Livewire\Features\Placeholder;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::resource('dashboard',PlatController::class)->only(['index','show','create','store','edit','update']);
// Route::get('dashboard', [PlatController::class,'index']);
// Route::get('plats/{id}',[PlatController::class,'show']);
// Route::resource('/', PlatController::class ,'landing');

Route::get('/', [PlatController::class,'landing']);
Route::resource('plats', PlatController::class)->middleware('auth');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('dashboard',[PlatController::class,'index'])->name('dashboard');
});



