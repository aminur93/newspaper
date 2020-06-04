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
    
    //News Country Routes
    Route::get('/country','Admin\CountryController@index')->name('country');
    Route::get('/country/create','Admin\CountryController@create')->name('country.create');
    Route::get('/country/getData','Admin\CountryController@getData')->name('country.getData');
    Route::post('/country/store','Admin\CountryController@store')->name('country.store');
    Route::get('/country/edit/{id}','Admin\CountryController@edit')->name('country.edit');
    Route::post('/country/update/{id}','Admin\CountryController@update')->name('country.update');
    Route::get('/delete-country/{id}','Admin\CountryController@destroy');
    
    //News Division City Routes
    Route::get('/division_city','Admin\DivisonCityController@index')->name('division_city');
    Route::get('/division_city/create','Admin\DivisonCityController@create')->name('division_city.create');
    Route::post('/division_city/get_country','Admin\DivisonCityController@getCountry')->name('division_city.get_country');
    Route::post('/division_city/store','Admin\DivisonCityController@store')->name('division_city.store');
    Route::get('/division_city/getData','Admin\DivisonCityController@getData')->name('division_city.getData');
    Route::get('/division_city/edit/{id}','Admin\DivisonCityController@edit')->name('division_city.edit');
    Route::post('/division_city/update/{id}','Admin\DivisonCityController@update')->name('division_city.update');
    Route::get('/delete-division_city/{id}','Admin\DivisonCityController@destroy');
    
    //News Zilla State routes
    Route::get('/zilla_state','Admin\ZillaStateController@index')->name('zilla_state');
    Route::get('/zilla_state/create','Admin\ZillaStateController@create')->name('zilla_state.create');
    Route::post('/zilla_state/get_country','Admin\ZillaStateController@getCountry')->name('zilla_state.get_country');
    Route::post('/zilla_state/get_division_state','Admin\ZillaStateController@getDivisionState')->name('zilla_state.get_division_state');
    Route::post('/zilla_state/store','Admin\ZillaStateController@store')->name('zilla_state.store');
    Route::get('/zilla_state/getData','Admin\ZillaStateController@getData')->name('zilla_state.getData');
    Route::get('/zilla_state/edit/{id}','Admin\ZillaStateController@edit')->name('zilla_state.edit');
    Route::post('/zilla_state/update/{id}','Admin\ZillaStateController@update')->name('zilla_state.update');
    Route::get('/delete-zilla_state/{id}','Admin\ZillaStateController@destroy');
    
    
    //News UpZilla or SubState Routes
    Route::get('/upzilla_substate','Admin\UpZillaSubStateController@index')->name('upzilla_substate');
    Route::get('/upzilla_substate/create','Admin\UpZillaSubStateController@create')->name('upzilla_substate.create');
    Route::get('/upzilla_substate/getData','Admin\UpZillaSubStateController@getData')->name('upzilla_substate.getData');
    Route::post('/upzilla_substate/get_country','Admin\UpZillaSubStateController@getCountry')->name('upzilla_substate.get_country');
    Route::post('/upzilla_substate/get_division_city','Admin\UpZillaSubStateController@getDivisionCity')->name('upzilla_substate.get_division_city');
    Route::post('/upzilla_substate/get_zilla_state','Admin\UpZillaSubStateController@getZillaState')->name('upzilla_substate.get_zilla_state');
    Route::post('/upzilla_substate/store','Admin\UpZillaSubStateController@store')->name('upzilla_substate.store');
    Route::get('/upzilla_substate/edit/{id}','Admin\UpZillaSubStateController@edit')->name('upzilla_substate.edit');
    Route::post('/upzilla_substate/update/{id}','Admin\UpZillaSubStateController@update')->name('upzilla_substate.update');
    Route::get('/delete-upzilla_substate/{id}','Admin\UpZillaSubStateController@destroy');
    
    
    //News category Routes
    
    //News Sub category Routes
    
});
