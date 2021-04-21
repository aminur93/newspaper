<?php

//Auth for Admin DashBoard
Route::group(['prefix' => 'auth', 'namespace' => 'Api\Auth'], function (){

    Route::post('login', 'LoginController@login');

    Route::post('register', 'RegisterController@register');

    Route::group(['middleware' => 'auth:api'], function (){

        Route::post('logout', 'LogOutController');

        Route::get('me', 'MeController');

    });

    Route::post('forgetPassword', 'ForgetPasswordController@forgetPassword');

    Route::post('changePassword', 'ChangePasswordController@saveResetPassword');

});

Route::group(['prefix' => 'customer', 'namespace' => 'Api', 'middleware' => 'auth:api'], function (){

    /*newspaper category routes start*/
     Route::get('category','CategoryController@getCategory');
     Route::get('category/news/{id}','CategoryController@getCategoryNews');
     Route::get('subcategory/news/{id}','CategoryController@getSubCategoryNews');
    /*newspaper category routes end*/

    /*newspaper tag routes start*/
    Route::get('tags','TagController@getTag');
    Route::get('tags/news/{id}','TagController@getTagNews');
    /*newspaper tag routes end*/

    /*newspaper types routes start*/
    Route::get('types','TypeController@getType');
    /*newspaper types routes end*/

    /*newspaper division routes start*/
     Route::get('division','DivisionController@getDivision');
    /*newspaper division routes end*/

    /*newspaper all news routes start*/
    Route::get('news','NewsPostController@getNews');
    Route::get('news/details/{id}','NewsPostController@newsDetails');
    Route::get('news/popular','NewsPostController@newsPopular');
    Route::get('news/latest','NewsPostController@getNewsLatest');
    Route::post('news/search','NewsPostController@newsSearch');
    /*newspaper all news routes end*/

    /*newspaper comments routes start*/
    Route::post('comments','CommentsController@store');
    Route::post('comments/getComments','CommentsController@getComments');
    /*newspaper comments routes end*/

    /*newspaper reply comments routes start*/
    Route::post('reply','ReplyController@store');
    Route::post('reply/get_reply','ReplyController@getReply');
    /*newspaper reply comments routes end*/
});