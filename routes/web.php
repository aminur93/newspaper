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
Route::post('/email/subscribes','HomeController@emailSubscribes')->name('email.subscribes');
Route::get('/details/{id}','HomeController@details')->name('details');
Route::get('/category_post/{id}','HomeController@categoryPost')->name('category_post');
Route::get('/tag_post/{id}','HomeController@tagPost')->name('tag_post');
Route::get('/autocomplete_search','HomeController@autocomplete')->name('autocomplete');
Route::get('/user/regsiter','HomeController@register')->name('user.register');
Route::post('/user/register/store','HomeController@registerStore')->name('registerStore');
Route::post('/user/login','HomeController@userLogin')->name('userLogin');
Route::get('/user/logout','HomeController@userLogout')->name('userLogout');
Route::get('/contact','HomeController@contact')->name('contact');
Route::post('/contact/message_store','HomeController@message_store')->name('contact.message_store');


Route::group(['middleware' => 'auth'], function () {
    Route::post('/user/comment','CommentController@comment')->name('comment');
});


Auth::routes();

Route::group(['middleware' => ['auth','admin']], function () {
    
    Route::get('dashboard','Admin\DashBoardContoller@index')->name('admin.dashboard');
    Route::get('getNotify','Admin\DashBoardContoller@getNotifyData')->name('getNotify');
    Route::post('notification/{id}','Admin\DashBoardContoller@notify')->name('notify');

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
    Route::get('/category','Admin\CategoryController@index')->name('category');
    Route::get('/category/create','Admin\CategoryController@create')->name('category.create');
    Route::get('/category/getData','Admin\CategoryController@getData')->name('category.getData');
    Route::post('/category/store','Admin\CategoryController@store')->name('category.store');
    Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}','Admin\CategoryController@update')->name('category.update');
    Route::get('/delete-category/{id}','Admin\CategoryController@destroy');
    
    //News Sub category Routes
    Route::get('/sub_category','Admin\SubCategoryController@index')->name('sub_category');
    Route::get('/sub_category/create','Admin\SubCategoryController@create')->name('sub_category.create');
    Route::post('/sub_category/store','Admin\SubCategoryController@store')->name('sub_category.store');
    Route::get('/sub_category/getData','Admin\SubCategoryController@getData')->name('sub_category.getData');
    Route::get('/sub_category/edit/{id}','Admin\SubCategoryController@edit')->name('sub_category.edit');
    Route::post('/sub_category/update/{id}','Admin\SubCategoryController@update')->name('sub_category.update');
    Route::get('/delete-sub_category/{id}','Admin\SubCategoryController@destroy');
    
    //News tag Routes
    Route::get('/tag','Admin\TagController@index')->name('tag');
    Route::get('/tag/create','Admin\TagController@create')->name('tag.create');
    Route::post('/tag/store','Admin\TagController@store')->name('tag.store');
    Route::get('/tag/getData','Admin\TagController@getData')->name('tag.getData');
    Route::get('/tag/edit/{id}','Admin\TagController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}','Admin\TagController@update')->name('tag.update');
    Route::get('/delete-tag/{id}','Admin\TagController@destroy');
    
    //News Gallery Routes
    Route::get('/gallery','Admin\GalleryFolderController@index')->name('gallery');
    Route::post('/gallery/store','Admin\GalleryFolderController@store')->name('gallery.store');
    Route::post('/gallery/update','Admin\GalleryFolderController@update')->name('gallery.update');
    Route::get('/gallery/image/{id}','Admin\GalleryFolderController@image')->name('gallery.image');
    Route::post('/gallery/image_upload/{id}','Admin\GalleryFolderController@upload')->name('gallery.upload');
    Route::post('/gallery/image_delete','Admin\GalleryFolderController@image_delete')->name('gallery.image_delete');
    Route::get('/gallery/image-delete/{id}','Admin\GalleryFolderController@folderImageDelete');
    Route::get('delete-folder/{id}','Admin\GalleryFolderController@destroy');
    
    //News Post Routes
    Route::get('/news','Admin\NewsPostController@index')->name('news');
    Route::get('/news/create','Admin\NewsPostController@create')->name('news.create');
    Route::post('/news/store','Admin\NewsPostController@store')->name('news.store');
    Route::post('/news/get_country','Admin\NewsPostController@get_country')->name('news.get_country');
    Route::post('/news/get_division','Admin\NewsPostController@get_division')->name('news.get_division');
    Route::post('/news/get_zilla','Admin\NewsPostController@get_zilla')->name('news.get_zilla');
    Route::post('/news/get_upzilla','Admin\NewsPostController@get_upzilla')->name('news.get_upzilla');
    Route::post('/news/get_subcategory','Admin\NewsPostController@get_subcategory')->name('news.get_subcategory');
    Route::get('/news/getData','Admin\NewsPostController@getData')->name('news.getData');
    Route::get('/news/edit/{id}','Admin\NewsPostController@edit')->name('news.edit');
    Route::post('/news/update/{id}','Admin\NewsPostController@update')->name('news.update');
    Route::get('/news/delete_image/{id}','Admin\NewsPostController@delete_image')->name('news.delete_image');
    Route::get('destroy-news/{id}','Admin\NewsPostController@destroy')->name('news.destroy');
    Route::get('approve-news/{id}','Admin\NewsPostController@approve')->name('news.approve');
    Route::get('publish-news/{id}','Admin\NewsPostController@publish')->name('news.publish');
    Route::get('feature-news/{id}','Admin\NewsPostController@feature')->name('news.feature');
    Route::get('/news/view/{id}','Admin\NewsPostController@view')->name('news.view');
    
    //News Video Routes
    Route::get('/news/video/{id}','Admin\NewsPostController@video')->name('news.video');
    Route::get('/news/video_create/{id}','Admin\NewsPostController@video_create')->name('news.video_create');
    Route::get('/news/video_getData','Admin\NewsPostController@video_getData')->name('news.video_getData');
    Route::post('/news/video_store','Admin\NewsPostController@video_store')->name('news.video_store');
    Route::get('/news/video/{id}/video_edit/{video_id}','Admin\NewsPostController@video_edit')->name('news.video_edit');
    Route::post('/news/video_update/{id}','Admin\NewsPostController@video_update')->name('news.video_update');
    Route::get('/news/video/video_delete/{id}','Admin\NewsPostController@video_remove')->name('news.video_remove');
    Route::get('/news/video/delete-video/{id}','Admin\NewsPostController@videoDelete');
    Route::get('/news/video/image_delete/{id}','Admin\NewsPostController@imageDelete');
    
    //Email Subscriber Routes
    Route::get('/emailsubscribe','Admin\EmailSubscribeController@index')->name('emailsubscribe');
    Route::get('/emailsubscribe/create','Admin\EmailSubscribeController@create')->name('emailsubscribe.create');
    Route::get('/emailsubscribe/getData','Admin\EmailSubscribeController@getData')->name('emailsubscribe.getData');
    Route::post('/emailsubscribe/send','Admin\EmailSubscribeController@send')->name('emailsubscribe.send');
   
});

Route::group(['middleware' => ['auth','editor']], function () {

    Route::get('/editordashboard', 'Editor\DashboradController@index')->name('editor.dashboard');

    //News Post Routes
    Route::get('/news','Admin\NewsPostController@index')->name('news');
    Route::get('/news/create','Admin\NewsPostController@create')->name('news.create');
    Route::post('/news/store','Admin\NewsPostController@store')->name('news.store');
    Route::post('/news/get_country','Admin\NewsPostController@get_country')->name('news.get_country');
    Route::post('/news/get_division','Admin\NewsPostController@get_division')->name('news.get_division');
    Route::post('/news/get_zilla','Admin\NewsPostController@get_zilla')->name('news.get_zilla');
    Route::post('/news/get_upzilla','Admin\NewsPostController@get_upzilla')->name('news.get_upzilla');
    Route::post('/news/get_subcategory','Admin\NewsPostController@get_subcategory')->name('news.get_subcategory');
    Route::get('/news/getData','Admin\NewsPostController@getData')->name('news.getData');
    Route::get('/news/edit/{id}','Admin\NewsPostController@edit')->name('news.edit');
    Route::post('/news/update/{id}','Admin\NewsPostController@update')->name('news.update');
    Route::get('/news/delete_image/{id}','Admin\NewsPostController@delete_image')->name('news.delete_image');
    Route::get('destroy-news/{id}','Admin\NewsPostController@destroy')->name('news.destroy');
    Route::get('approve-news/{id}','Admin\NewsPostController@approve')->name('news.approve');
    Route::get('publish-news/{id}','Admin\NewsPostController@publish')->name('news.publish');
    Route::get('feature-news/{id}','Admin\NewsPostController@feature')->name('news.feature');
    Route::get('/news/view/{id}','Admin\NewsPostController@view')->name('news.view');

    //News Video Routes
    Route::get('/news/video/{id}','Admin\NewsPostController@video')->name('news.video');
    Route::get('/news/video_create/{id}','Admin\NewsPostController@video_create')->name('news.video_create');
    Route::get('/news/video_getData','Admin\NewsPostController@video_getData')->name('news.video_getData');
    Route::post('/news/video_store','Admin\NewsPostController@video_store')->name('news.video_store');
    Route::get('/news/video/{id}/video_edit/{video_id}','Admin\NewsPostController@video_edit')->name('news.video_edit');
    Route::post('/news/video_update/{id}','Admin\NewsPostController@video_update')->name('news.video_update');
    Route::get('/news/video/video_delete/{id}','Admin\NewsPostController@video_remove')->name('news.video_remove');
    Route::get('/news/video/delete-video/{id}','Admin\NewsPostController@videoDelete');
    Route::get('/news/video/image_delete/{id}','Admin\NewsPostController@imageDelete');

});
