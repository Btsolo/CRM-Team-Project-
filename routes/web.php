<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('customers', CustomerController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('interactions', InteractionController::class);
    Route::resource('projects',ProjectController::class);
    
    Route::get('/contact', function(){
        return view('contact');
    })->name('contacts');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::patch('/customers/{id}/restore', [CustomerController::class, 'restore'])->name('customers.restore');
    Route::delete('/customers/{id}/force-delete', [CustomerController::class, 'forceDelete'])->name('customers.forceDelete');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('/tasks/{id}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
    Route::delete('/tasks/{id}/force-delete', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');
    

    Route::delete('/interactions/{interaction}', [InteractionController::class, 'destroy'])->name('interactions.destroy');
    Route::patch('/interactions/{id}/restore', [InteractionController::class, 'restore'])->name('interactions.restore');
    Route::delete('/interactions/{id}/force-delete', [InteractionController::class, 'forceDelete'])->name('interactions.forceDelete');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::patch('/projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');

Route::get('customers/download', [CustomerController::class, 'generateCsv'])->name('customers.download');
Route::get('tasks/download', [TaskController::class, 'generateCsv'])->name('tasks.download');
Route::get('interactions/download', [InteractionController::class, 'generateCsv'])->name('interactions.download');
Route::get('projects/download', [ProjectController::class, 'generateCsv'])->name('projects.download');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
