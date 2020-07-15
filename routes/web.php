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
    if(Auth::check())
	{
    return redirect('/dashboard');
	}		
	else
	{	
    return view('auth.login');
	}
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/book/add', 'BookController@create');

Route::post('/book/store', 'BookController@store');

Route::get('/book/edit/{id}', 'BookController@edit');

Route::post('/book/update', 'BookController@update');

Route::get('/book/search', 'BookController@search');

Route::get('/book/delete/{id}', 'BookController@destroy');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');