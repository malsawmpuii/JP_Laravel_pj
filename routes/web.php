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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/','PageController@home')->name('homepage');

Route::get('/','MainController@main')->name('homepage');

Route::get('detail/{id}','MainController@detail')->name('detailpage');

Route::get('main/{key}','PageController@main')->name('mainpage');

Route::get('category/{id}','MainController@category_detail')->name('categorydetail');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['role:admin']], function () {
    //
    Route::resource('staff','StaffController');  

    Route::resource('payrolls','PayrollController');
	
	Route::post('getstaff','PayrollController@getstaff')->name('getstaff');

	Route::post('getastaff','PayrollController@getastaff')->name('getastaff');

	Route::resource('editors','UserController');

});

Route::group(['middleware' => ['role:editor']], function () {
    //
    Route::resource('posts','PostController');

});

Route::get('/home', 'HomeController@index')->name('home');






