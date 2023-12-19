<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\OptionController;
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
    return redirect()->route('student.test');
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('test',[TestController::class, 'index'])->name('student.test');
    Route::post('test',[TestController::class, 'store'])->name('student.test.store');
    Route::get('results/{result_id}',[\App\Http\Controllers\ResultController::class, 'show'])->name('student.results.show');

    // Admin
    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        
        // Categories
        Route::resource('categories', CategoryController::class);
        Route::delete('categoriesDestroyAll', [CategoryController::class, 'DestroyAll'])->name('categories.DestroyAll');

        // Questions
        Route::resource('questions', QuestionController::class);
        Route::delete('questionsDestroyAll', [QuestionController::class, 'DestroyAll'])->name('questions.DestroyAll');

        // Options
        Route::resource('options', OptionController::class);
        Route::delete('optionsDestroyAll', [OptionController::class, 'DestroyAll'])->name('options.DestroyAll');

        // Results
        Route::resource('results', ResultController::class);
        Route::delete('resultsDestroyAll', [ResultController::class, 'DestroyAll'])->name('results.DestroyAll');

         // Roles
         Route::resource('roles', RoleController::class);
         Route::delete('rolesDestroyAll', [RoleController::class, 'DestroyAll'])->name('roles.DestroyAll');
         
         // Users
         Route::resource('users', UserController::class);
         Route::delete('usersDestroyAll', [UserController::class, 'DestroyAll'])->name('users.DestroyAll');
 
    });

});

Auth::routes(['register' => false]);

