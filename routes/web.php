<?php

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
    return view('welcome');
});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

// user protected routes
Route::middleware(['auth', 'user'])->group(function () {
    

Route::get('listTicket','App\Http\Controllers\clientController@view');
Route::get('client/insert','App\Http\Controllers\clientController@insertform');

Route::post('/creat','App\Http\Controllers\clientController@insert');
Route::post('client/search','App\Http\Controllers\clientController@search');

Route::get('client/edit/{id}','App\Http\Controllers\clientController@show_edit_page');
Route::post('client/edit/{id}','App\Http\Controllers\clientController@edit');

Route::get('dashboard', function () {
    return view('client.dashboard');
    });
});

// admin protected routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dashboard', function () {
        return view('admin.admin_dashboard');
    });
    Route::post('admin/search','App\Http\Controllers\adminController@search');
    Route::get('user/insert','App\Http\Controllers\userController@insertform');
    Route::post('create','App\Http\Controllers\userController@insert');
    Route::get('listUser','App\Http\Controllers\userController@view');
    Route::get('admin/listTicket','App\Http\Controllers\adminController@view');
    
    
    Route::get('user/edit/{id}','App\Http\Controllers\userController@show');
    Route::post('user/edit/{id}','App\Http\Controllers\userController@edit');
    Route::get('user/delete/{id}','App\Http\Controllers\userController@destroy');
    
    Route::post('admin/assignement/{id}','App\Http\Controllers\adminController@assignement');
    Route::get('admin/assigner/{id}','App\Http\Controllers\adminController@assigner');
    Route::post('admin/attribuer/{id}','App\Http\Controllers\adminController@attribuerTicker');
    Route::get('admin/management/{id}','App\Http\Controllers\adminController@show');

});


// support protected routes
    Route::middleware(['auth', 'support'])->group(function () {
    Route::get('support_dashboard', function () {
        return view('support.support_dashboard');
    });
    Route::post('support/search','App\Http\Controllers\supportController@search');
    Route::post('support/assignement/{id}','App\Http\Controllers\supportController@assignement');
    Route::get('support/listTicket','App\Http\Controllers\supportController@view');
    Route::get('support/management/{id}','App\Http\Controllers\supportController@show');

});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
