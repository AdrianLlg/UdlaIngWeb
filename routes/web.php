<?php

use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
//  });

Route::get('/', function () {

    $user=Auth::user();

    if(Auth::user()){

        if($user->isAdmin()){
           
            return redirect('/admin/dashboard');
        }else{
            
            return view('home');
        }
    }else{
        return view('welcome');
    }
});

 Route::get('/login', function () {
    return view('auth.login');
 });

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/admin', 'AdminController@index')->name('index')->middleware('auth');
    Route::get('/admin/dashboard/comparation', 'AdminController@comparation')->name('comparation')->middleware('auth');
    Route::get('/admin/dashboard/comparation2', 'AdminController@comparation2')->name('comparation2')->middleware('auth');
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard')->middleware('auth');
    
    Route::get('/mascotas', 'MascotasController@index')->name('index')->middleware('auth');
    Route::resource('mascotas', 'MascotasController')->middleware('auth');

    Route::get('/postalcode', 'PostalCodeController@index')->name('index')->middleware('auth');
    Route::resource('postalcode', 'PostalCodeController')->middleware('auth');

    Route::get('/users', 'UsersController@index')->name('index')->middleware('auth');
    Route::resource('users', 'UsersController')->middleware('auth');

    Route::get('/clientes', 'ClientesController@index')->name('index')->middleware('auth');
    Route::resource('clientes', 'ClientesController')->middleware('auth');

    Route::get('/adopciones', 'AdopcionesController@index')->name('index')->middleware('auth');
    Route::resource('adopciones', 'AdopcionesController')->middleware('auth');

    Route::get('/roles', 'RolesController@index')->name('index')->middleware('auth');
    Route::resource('roles', 'RolesController')->middleware('auth');
});

// Route::resource('estudiantes', 'EstudiantesController')->middleware('auth');

Auth::routes(['reset'=>false]);
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', 'EstudiantesController@index')->name('index');
