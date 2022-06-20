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
    return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

//CASH 
Route::get('/cash', 'CashController@index')->name('cash');
Route::get('/cash-create', 'CashController@post')->name('cash.post');
Route::post('/cash-create', 'CashController@send')->name('cash.send');
Route::get('/cash-edit/{cash:id}', 'CashController@edit')->name('cash.edit');
Route::post('/cash-edit/{cash:id}', 'CashController@update')->name('cash.update');
Route::delete('/cash-del/{id}', 'CashController@delete')->name('cash.hapus');

//COST 
Route::get('/cost', 'CostController@index')->name('cost');
Route::get('/cost-create', 'CostController@post')->name('cost.post');
Route::post('/cost-create', 'CostController@send')->name('cost.send');
Route::get('/cost-edit/{cost:id}', 'CostController@edit')->name('cost.edit');
Route::post('/cost-edit/{cost:id}', 'CostController@update')->name('cost.update');
Route::delete('/cost-del/{id}', 'CostController@delete')->name('cost.hapus');