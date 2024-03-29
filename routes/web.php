<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
Route::get('/logout','HomeController@logout')->name('logout');

Route::get('/dashboard','DashboardController@view');


//OrderList
Route::get('/orderlist','OrderlistController@view');
Route::get('/orderlistdetails/{id}','OrderlistController@details');
Route::get('/deleteorder/{id}','OrderlistController@deleteorder');
Route::post('/orderliststatus/{id}','OrderlistController@statusupdate');



//Sales REPORT
Route::get('/salesreport','SalesReportController@sales');
Route::post('/status','SalesReportController@report');
Route::post('/daterange/fetch_data', 'SalesReportController@fetch_data')->name('daterange.fetch_data');
});

