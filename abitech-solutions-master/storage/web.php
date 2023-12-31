<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShowVideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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

Route::get('/', [LandingController::class, 'index'])->name('welcome');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [LandingController::class, 'contact'])->name('send.contact.mail');
Route::get('/formation', [FormationController::class, 'search'])->name('formation');
Route::get('/actualite', 'App\Http\Controllers\ActualiteController@index')->name('actualite');
Route::get('/detail/{id}', 'App\Http\Controllers\ActualiteController@details')->name('detail');

Route::get('/video', [ShowVideoController::class, 'search'])->name('video');
Route::get('/formation/{id}/view', [FormationController::class, 'view'])->name('view-formation');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
	Route::get('dashboard',  [HomeController::class, 'home']) ->name('dashboard');

        //actualite
        Route::get('actualite/list', 'App\Http\Controllers\ActualitesController@index')->name('actualites');
        Route::post('actualite/create', 'App\Http\Controllers\ActualitesController@store')->name('actualites.create');
        Route::get('actualite/create', 'App\Http\Controllers\ActualitesController@create')->name('actualites.create.view');
        Route::get('actualite/{id}/view', 'App\Http\Controllers\ActualitesController@details')->name('actualites.details');
        Route::get('actualite/{id}/edit', 'App\Http\Controllers\ActualitesController@edit')->name('actualites.edit');
        Route::post('actualite/{id}/activate','App\Http\Controllers\ActualitesController@toggleStatus')->name('actualites.toggle');
        Route::post('actualite/{id}/update','App\Http\Controllers\ActualitesController@update')->name('actualites.update');
    
  //  categories
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('categories/create', [CategoryController::class, 'store'])->name('categories.create');
    Route::post('categories/{id}/activate', [CategoryController::class, 'toggleStatus'])->name('categories.activate');
    Route::post('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

 //   formations
    Route::get('formations/list', [FormationController::class, 'index'])->name('formations');
    Route::get('formations/{id}/view', [FormationController::class, 'details'])->name('formations.details');
    Route::post('formations/create', [FormationController::class, 'store'])->name('formations.create');
    Route::get('formations/create', [FormationController::class, 'create'])->name('formation.create.view');
    Route::get('formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
    Route::post('formations/{id}/activate', [FormationController::class, 'toggleStatus'])->name('formations.toggle');
    Route::post('formations/{id}/update', [FormationController::class, 'update'])->name('formations.update');

  //  show videos
    Route::get('videos/list', [ShowVideoController::class, 'list'])->name('videos');
    Route::post('videos/create', [ShowVideoController::class, 'store'])->name('videos.create');
    Route::post('videos/update', [ShowVideoController::class, 'update'])->name('videos.update');
    Route::post('videos/{id}/activate', [ShowVideoController::class, 'toggleStatus'])->name('videos.activate');

    Route::get('/user-profile', [InfoUserController::class, 'create'])->name('profile');
    Route::post('/user-profile', [InfoUserController::class, 'store'])->name('update-profile');

	Route::get('billing', function () {return view('billing');})->name('billing');
	Route::get('profile', function () {return view('profile');})->name('profile');
    Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');

    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create'])->name('password.request');
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {return view('session/login-session');})->name('login');

Route::get('/service1', function () {return view('services/service1');})->name('service1');

Route::get('/service2', function () {return view('services/service2');})->name('service2');

Route::get('/service3', function () {return view('services/service3');})->name('service3');

Route::get('/service4', function () {return view('services/service4');})->name('service4');

Route::get('/service5', function () {return view('services/service5');})->name('service5');

