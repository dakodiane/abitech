<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\MebController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ShowVideoController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
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


Route::get('/', 'App\Http\Controllers\LandingController@index')->name('welcome');

Route::get('/newsletter', function () {
  return Redirect::to('/#newsletter');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [LandingController::class, 'contact'])->name('send.contact.mail');
Route::get('/formation', [FormationController::class, 'search'])->name('formation');
Route::get('/actualites', 'App\Http\Controllers\ActualiteController@index')->name('actualite');
Route::get('/details/{id}', 'App\Http\Controllers\ActualiteController@details')->name('detail');
Route::get('/offre', 'App\Http\Controllers\OffreController@offre')->name('offre');
Route::get('/detail/{id}', 'App\Http\Controllers\OffreController@detail')->name('detailoffre');
Route::get('/meb', 'App\Http\Controllers\MebController@search')->name('meb');
Route::get('/video', [ShowVideoController::class, 'search'])->name('video');
Route::get('/formation/{id}/view', [FormationController::class, 'view'])->name('view-formation');
Route::get('/document', 'App\Http\Controllers\DocumentController@index')->name('document');



//formations
Route::get('formations/list', [FormationController::class, 'index'])->name('formations');
Route::get('formations/{id}/view', [FormationController::class, 'details'])->name('formations.details');
Route::post('formations/create', [FormationController::class, 'store'])->name('formations.create');
Route::get('formations/create', [FormationController::class, 'create'])->name('formation.create.view');
Route::get('formations/{id}/edit', [FormationController::class, 'edit'])->name('formations.edit');
Route::post('formations/{id}/activate', [FormationController::class, 'toggleStatus'])->name('formations.toggle');
Route::post('formations/{id}/update', [FormationController::class, 'update'])->name('formations.update');
Route::get('formation/details', [FormationController::class, 'show'])->name('forma.details');

//teams
Route::get('/equipe', 'App\Http\Controllers\TeamController@equipe')->name('equipe');
Route::get('teams/list', 'App\Http\Controllers\TeamController@index')->name('teams');
Route::get('teams/{id}/view', 'App\Http\Controllers\TeamController@details')->name('teams.details');
Route::post('teams/create', 'App\Http\Controllers\TeamController@store')->name('teams.create');
Route::get('teams/create', 'App\Http\Controllers\TeamController@create')->name('team.create.view');
Route::get('teams/{id}/edit', 'App\Http\Controllers\TeamController@edit')->name('teams.edit');
Route::post('teams/{id}/activate', 'App\Http\Controllers\TeamController@toggleStatus')->name('teams.toggle');
Route::post('teams/{id}/update', 'App\Http\Controllers\TeamController@update')->name('teams.update');
Route::get('team/details', 'App\Http\Controllers\TeamController@show')->name('t.details');


//emails
Route::get('/emails', 'App\Http\Controllers\EmailController@index')->name('emails');
Route::get('emails/list', 'App\Http\Controllers\EmailController@index')->name('emails');
Route::get('emails/{id}/view', 'App\Http\Controllers\EmailController@details')->name('emails.details');
Route::post('emails/create', 'App\Http\Controllers\EmailController@sendmail')->name('emails.create');
Route::get('emails/create', 'App\Http\Controllers\EmailController@create')->name('emails.create.view');
Route::get('emails/{id}/edit', 'App\Http\Controllers\EmailController@edit')->name('emails.edit');
Route::post('emails/{id}/activate', 'App\Http\Controllers\EmailController@toggleStatus')->name('emails.toggle');
Route::post('emails/{id}/update', 'App\Http\Controllers\EmailController@update')->name('emails.update');
Route::get('emails/details', 'App\Http\Controllers\EmailController@show')->name('e.details');
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
  Route::get('dashboard',  [HomeController::class, 'home'])->name('dashboard');



  //actualite
  Route::get('actualite/list', 'App\Http\Controllers\ActualitesController@index')->name('actualites');
  Route::post('actualite/create', 'App\Http\Controllers\ActualitesController@store')->name('actualites.create');
  Route::get('actualite/create', 'App\Http\Controllers\ActualitesController@create')->name('actualites.create.view');
  Route::get('actualite/{id}/view', 'App\Http\Controllers\ActualitesController@details')->name('actualites.details');
  Route::get('actualite/{id}/edit', 'App\Http\Controllers\ActualitesController@edit')->name('actualites.edit');
  Route::post('actualite/{id}/activate', 'App\Http\Controllers\ActualitesController@toggleStatus')->name('actualites.toggle');
  Route::post('actualite/{id}/update', 'App\Http\Controllers\ActualitesController@update')->name('actualites.update');

  //offre
  Route::get('offre/list', 'App\Http\Controllers\OffreController@index')->name('offres');
  Route::post('offre/create', 'App\Http\Controllers\OffreController@store')->name('offres.create');
  Route::get('offre/create', 'App\Http\Controllers\OffreController@create')->name('offres.create.view');
  Route::get('offre/{id}/view', 'App\Http\Controllers\OffreController@details')->name('offres.details');
  Route::get('offre/{id}/edit', 'App\Http\Controllers\OffreController@edit')->name('offres.edit');
  Route::post('offre/{id}/activate', 'App\Http\Controllers\OffreController@toggleStatus')->name('offres.toggle');
  Route::post('offre/{id}/update', 'App\Http\Controllers\OffreController@update')->name('offres.update');

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
  Route::get('formations/details', [FormationController::class, 'show'])->name('f.details');


  //Documents
  Route::get('documents/list', 'App\Http\Controllers\DocumentController@list')->name('documents');
  Route::get('documents/{id}/view', 'App\Http\Controllers\DocumentController@details')->name('documents.details');
  Route::post('documents/create', 'App\Http\Controllers\DocumentController@store')->name('documents.create');
  Route::get('documents/create', 'App\Http\Controllers\DocumentController@create')->name('document.create.view');
  Route::get('documents/{id}/edit', 'App\Http\Controllers\DocumentController@edit')->name('documents.edit');
  Route::post('documents/{id}/activate', 'App\Http\Controllers\DocumentController@toggleStatus')->name('documents.toggle');
  Route::post('documents/{id}/update', 'App\Http\Controllers\DocumentController@update')->name('documents.update');
  Route::get('document/details', 'App\Http\Controllers\DocumentController@show')->name('d.details');


  //  show videos

  Route::get('videos/list', [ShowVideoController::class, 'list'])->name('videos');
  Route::post('videos/create', [ShowVideoController::class, 'store'])->name('videos.create');
  Route::post('videos/update', [ShowVideoController::class, 'update'])->name('videos.update');
  Route::post('videos/{id}/activate', [ShowVideoController::class, 'toggleStatus'])->name('videos.activate');

  // mebs

  Route::get('video/list', [MebController::class, 'list'])->name('mebs');
  Route::post('meb/create', [MebController::class, 'store'])->name('meb.create');
  Route::post('meb/update', [MebController::class, 'update'])->name('meb.update');
  Route::post('meb/{id}/activate', [MebController::class, 'toggleStatus'])->name('meb.activate');
  Route::get('/user-profile', [InfoUserController::class, 'create'])->name('profile');
  Route::post('/user-profile', [InfoUserController::class, 'store'])->name('update-profile');



  Route::get('billing', function () {
    return view('billing');
  })->name('billing');

  Route::get('profile', function () {
    return view('profile');
  })->name('profile');

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



Route::get('/login', function () {
  return view('session/login-session');
})->name('login');



Route::get('/service1', function () {
  return view('services/service1');
})->name('service1');



Route::get('/service2', function () {
  return view('services/service2');
})->name('service2');



Route::get('/service3', function () {
  return view('services/service3');
})->name('service3');



Route::get('/service4', function () {
  return view('services/service4');
})->name('service4');



Route::get('/service5', function () {
  return view('services/service5');
})->name('service5');



Route::get('inscription', function () {
  return view('formation');
});

Route::get('succes', function () {
  return view('succes');
});


Route::post('store', 'App\Http\Controllers\PaiementController@store')->name('store');

Route::get('dashboardformation', function () {
  return view('admin');
});

Route::get('liste', 'App\Http\Controllers\AdminController@view')->name('liste');

Route::get('liens', 'App\Http\Controllers\LienController@index')->name('liens');
Route::get('formulaires', 'App\Http\Controllers\LienController@formulaires')->name('formulaires');



Route::post('getmail', 'App\Http\Controllers\EmailController@store')->name('getmail');
