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
Route::any('/all-massdel', 'HomeController@massdelete')->name('massdelete.all');

//CASH 
Route::get('/cash', 'CashController@index')->name('cash');
Route::get('/cash-create', 'CashController@post')->name('cash.post');
Route::post('/cash-create', 'CashController@send')->name('cash.send');
Route::get('/cash-edit/{cash:id}', 'CashController@edit')->name('cash.edit');
Route::post('/cash-edit/{cash:id}', 'CashController@update')->name('cash.update');
Route::delete('/cash-del/{id}', 'CashController@delete')->name('cash.hapus');
Route::any('/cash-massdel', 'CashController@massdelete')->name('massdelete.cashs');

//COST 
Route::get('/cost', 'CostController@index')->name('cost');
Route::get('/cost-create', 'CostController@post')->name('cost.post');
Route::post('/cost-create', 'CostController@send')->name('cost.send');
Route::get('/cost-edit/{cost:id}', 'CostController@edit')->name('cost.edit');
Route::post('/cost-edit/{cost:id}', 'CostController@update')->name('cost.update');
Route::delete('/cost-del/{id}', 'CostController@delete')->name('cost.hapus');
Route::any('/cost-massdel', 'CostController@massdelete')->name('massdelete.costs');

//Saves
Route::get('/saves', 'SavemoneyController@index')->name('saves');
Route::get('/saves-create', 'SavemoneyController@post')->name('saves.post');
Route::post('/saves-create', 'SavemoneyController@send')->name('saves.send');
Route::get('/saves-edit/{saves:id}', 'SavemoneyController@edit')->name('saves.edit');
Route::post('/saves-edit/{saves:id}', 'SavemoneyController@update')->name('saves.update');
Route::delete('/saves-del/{id}', 'SavemoneyController@delete')->name('saves.hapus');

//Export xls
Route::get('/export-all', 'ExportController@all')->name('all');
Route::get('/export-cash', 'ExportController@cash')->name('print.cash');
Route::get('/export-cost', 'ExportController@cost')->name('print.cost');

//Report
Route::get('/report-all', 'ReportsController@index')->name('report');
Route::get('/report-create', 'ReportsController@post')->name('report.post');
Route::post('/report-create', 'ReportsController@send')->name('report.send');
Route::delete('/report-del/{id}', 'ReportsController@delete')->name('report.hapus');