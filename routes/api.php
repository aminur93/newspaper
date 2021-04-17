<?php

//Auth for Admin DashBoard
Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function (){

    Route::post('login', 'LoginController@login');

    Route::post('register', 'RegisterController@register');

    Route::group(['middleware' => 'auth:api'], function (){

        Route::post('logout', 'LogOutController');

        Route::get('me', 'MeController');

    });

    //Route::post('forgetPassword', 'ForgetPasswordController@forgetPassword');

    //Route::post('changePassword', 'ChangePasswordController@saveResetPassword');

});