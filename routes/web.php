<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CounterpartyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeDetailController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('main');

Route::middleware(['auth', 'verified'])->group(function (){
    Route::prefix('notify')->as('notify.')->group(function (){
        Route::get('show', [NotifyController::class, 'index'])->name('show');
    });

    Route::prefix('counterparty')->as('counterparty.')->group(function (){
        Route::get('show', [CounterpartyController::class, 'index'])->name('show');
        Route::get('show/{id}', [CounterpartyController::class, 'detail'])->name('detail');
    });

    Route::prefix('project')->as('project.')->group(function (){
        Route::get('show', [ProjectController::class, 'index'])->name('show');
        Route::get('show/{id}', [ProjectController::class, 'detail'])->name('detail');
    });

    Route::prefix('task')->as('task.')->group(function (){
        Route::get('show', [TaskController::class, 'index'])->name('show');
        Route::get('show/{id}', [TaskController::class, 'detail'])->name('detail');
    });

    Route::prefix('report')->as('report.')->group(function (){
        Route::get('show', [ReportController::class, 'index'])->name('show');
    });

    Route::prefix('password')->as('password.')->group(function (){
        Route::get('show', [PasswordController::class, 'index'])->name('show');
    });

    Route::prefix('contacts')->as('contact.')->group(function (){
        Route::get('show', [ContactController::class, 'index'])->name('show');
        Route::get('show/{contact}', [ContactController::class, 'detail'])->name('detail');
    });

    Route::prefix('staff')->as('staff.')->group(function (){
        Route::get('show', [StaffController::class, 'index'])->name('show');
        Route::get('show/{id}', [StaffController::class, 'detail'])->name('detail');
        Route::get('profile', [StaffController::class, 'profile'])->name('profile');
        Route::get('time/detail/{id}', [TimeDetailController::class, 'userTimeDetail'])->name('time-detail');
    });
});
