<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IntersectionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SecIntersectionController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function() {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    
    // Intersections
    Route::get('/intersection/{type}', [IntersectionController::class, 'intersection'])->name('intersection');
    Route::get('/sec-intersection/{technology}', [SecIntersectionController::class, 'intersection'])->name('secIntersection');
    
    // Entities
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
});

Route::resource('guest/projects', HomeController::class)->parameters(['projects' => 'project:slug']);


require __DIR__.'/auth.php';
