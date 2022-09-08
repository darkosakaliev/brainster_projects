<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/projects/all', [HomeController::class, 'projects']);

    Route::post('/academies/all', [HomeController::class, 'academies']);

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');

    Route::get('/profile', [UserController::class, 'edit'])->name('profile');

    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');

    Route::middleware(['completeProfile'])->group(function () {

        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

        Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');

        Route::put('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');

        Route::delete('projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

        Route::post('/projects/{id}/assemble', [ProjectController::class, 'assemble'])->name('projects.assemble');

        Route::post('/applications/apply', [ApplicationController::class, 'apply'])->name('applications.apply');

        Route::delete('/applications/{id}/cancel', [ApplicationController::class, 'cancel'])->name('applications.cancel');

        Route::post('/applications/{id}/accept', [ApplicationController::class, 'accept'])->name('applications.accept');

        Route::get('projects/{id}/applicants', [ProjectController::class, 'applicants'])->name('projects.applicants');

        Route::get('/profile/{id}', [UserController::class, 'show'])->name('users.show');

    });
});

require __DIR__.'/auth.php';
