<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


// admin route

Route::group(['middleware'=>['web','admin']],function(){
    Route::get('/adminPanel','AdminController@index');
    
    // data table ajax
    Route::get('/adminPanel/users/data','UsersController@getAllUsers');
    Route::get('/adminPanel/bu/data/{id?}','BuController@getAllBus');
    
    // site settings
    Route::get('/adminPanel/settings','SettingsController@index');
    Route::post('/adminPanel/settings/store','SettingsController@store');
    
    // users
    Route::get('/adminPanel/user/bu/disabled/{id}','UsersController@buDisabled');
    Route::get('/adminPanel/user/bu/enabled/{id}','UsersController@buEnabled');
    Route::resource('/adminPanel/users','UsersController');
    Route::put('/adminPanel/users/changePassword/{id}','UsersController@changePassword');
    Route::get('/adminPanel/users/{id}/delete','UsersController@destroy');
    
    // bu
    Route::resource('/adminPanel/bu','BuController',['except'=>['index','show']]);
    Route::get('/adminPanel/bu/{id?}','BuController@index');
    
    Route::get('/adminPanel/bu/{id}/delete','BuController@destroy');
    
});

// user route

Route::group(['middleware' => 'web'], function () {
  Route::auth();

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');
    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'HomeController@storeContact');
    
    // bu
    Route::get('/showAllBuildings', 'BuController@showAllBuildings');
    Route::get('/singleBuilding/{id}', 'BuController@singleBuilding');
    Route::get('/forRent', 'BuController@forRent');
    Route::get('/forBuy', 'BuController@forBuy');
    Route::get('/type/{type}', 'BuController@type');
    Route::get('/search', 'BuController@search');
    Route::get('/getBuInfo', 'BuController@getBuInfo');
    
    Route::get('/user/bu/create','UsersController@getBuCreate')->middleWare('auth');
    Route::post('/user/bu/create','UsersController@postBuCreate')->middleWare('auth');
    Route::get('/user/bu/status/{status}','UsersController@userBuStatus')->middleWare('auth');
    Route::get('/user/profile','UsersController@editUserInfo')->middleWare('auth');
    Route::put('/user/profile','UsersController@updateUserInfo')->middleWare('auth');
    Route::put('/user/profile/changePassword','UsersController@updateUserPassword')->middleWare('auth');
});
