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

Route::get('/','HomeController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard','DashBoardContoller@index')->name('admin.dashboard');
    
    //news types routes
    Route::get('/types','Admin\TypesController@index')->name('types');
    Route::get('/create','Admin\TypesController@create')->name('create');
    Route::post('/types/store','Admin\TypesController@store')->name('types.store');
    Route::get('/types/getData','Admin\TypesController@getData')->name('types.getData');
    Route::get('/types/edit/{id}','Admin\TypesController@edit')->name('types.edit');
    Route::post('/types/update/{id}','Admin\TypesController@update')->name('types.update');
    Route::get('/delete-types/{id}','Admin\TypesController@destroy');
    
});
