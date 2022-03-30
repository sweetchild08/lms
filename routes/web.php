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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('userauth:admin')
    ->name('admin.')
    ->prefix('admin')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',['uses'=>'AdminController@dashboard','as'=>'dashboard']);
        Route::get('/teachers',['uses'=>'AdminController@teachers','as'=>'teachers']);
        Route::resource('teachers',UserController::class)->only(['store','destroy']);
        Route::get('/students',['uses'=>'AdminController@students','as'=>'students']);
        Route::resource('students',StudentController::class)->only(['store','destroy']);
        Route::get('/classes',['uses'=>'AdminController@classes','as'=>'classes']);

        // Route::post('/teachers',['uses'=>'UserController@store','as'=>'teacher.store']);
        // Route::post('/teachers',['uses'=>'UserController@store','as'=>'teacher.destroy']);
});
Route::middleware('userauth:student')
    ->name('student.')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',['uses'=>'StudentController@dashboard','as'=>'dashboard']);
});

Route::middleware('userauth:teacher')
    ->name('teacher.')
    ->prefix('teacher')
    ->namespace('App\Http\Controllers')
    ->group(function(){
        Route::get('/dashboard',['uses'=>'TeacherController@dashboard','as'=>'dashboard']);
});

require __DIR__.'/auth.php';

// todo
// grade and section management
// enrollment to grade and section many user to many grade and section
