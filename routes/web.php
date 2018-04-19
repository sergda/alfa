<?php

// Home
Route::get('/', 'HomeController')->name('home');
Route::get('/contatto', 'HomeController@contatto');
Route::get('/collezione', 'HomeController@collezione');
// Language
Route::get('language/{lang}', 'LanguageController')
    ->where('lang', implode('|', config('app.languages')));

// Admin
Route::get('admin', 'AdminController')->name('admin');

// Medias
Route::get('medias', 'FilemanagerController')->name('medias');


/* ******** Beds { ************** */

Route::get('adm_beds/order', 'BedsController@indexOrder')->name('beds.order');
Route::resource('adm_beds', 'BedsController', ['except' => 'show']);
Route::put('adm_bedspostactive/{id}', 'BedsAjaxController@updateActive');
Route::put('adm_bedspostis_menu/{id}', 'BedsAjaxController@updateIsMenu');
Route::put('adm_bedspostis_main/{id}', 'BedsAjaxController@updateIsMain');

// rout front
Route::get('beds', 'BedsFrontController@index');
Route::get('beds/{code}', 'BedsFrontController@show')->name('beds.show');

/* ******** } Beds ************** */

/* ******** Mattress { ************** */

Route::get('adm_mattress/order', 'MattressController@indexOrder')->name('mattress.order');
Route::resource('adm_mattress', 'MattressController', ['except' => 'show']);
Route::put('adm_mattresspostactive/{id}', 'MattressAjaxController@updateActive');
Route::put('adm_mattresspostis_menu/{id}', 'MattressAjaxController@updateIsMenu');
Route::put('adm_mattresspostis_main/{id}', 'MattressAjaxController@updateIsMain');

// rout front
Route::get('mattress', 'MattressFrontController@index');
Route::get('mattress/{code}', 'MattressFrontController@show')->name('mattress.show');

/* ******** } Mattress ************** */

/* ******** Curbstones { ************** */

Route::get('adm_curbstones/order', 'CurbstonesController@indexOrder')->name('curbstones.order');
Route::resource('adm_curbstones', 'CurbstonesController', ['except' => 'show']);
Route::put('adm_curbstonespostactive/{id}', 'CurbstonesAjaxController@updateActive');
Route::put('adm_curbstonespostis_menu/{id}', 'CurbstonesAjaxController@updateIsMenu');
Route::put('adm_curbstonespostis_main/{id}', 'CurbstonesAjaxController@updateIsMain');

// rout front
Route::get('curbstones', 'CurbstonesFrontController@index');
Route::get('curbstones/{code}', 'CurbstonesFrontController@show')->name('curbstones.show');

/* ******** } Curbstones ************** */

/* ******** Pouffes { ************** */

Route::get('adm_pouffes/order', 'PouffesController@indexOrder')->name('pouffes.order');
Route::resource('adm_pouffes', 'PouffesController', ['except' => 'show']);
Route::put('adm_pouffespostactive/{id}', 'PouffesAjaxController@updateActive');
Route::put('adm_pouffespostis_menu/{id}', 'PouffesAjaxController@updateIsMenu');
Route::put('adm_pouffespostis_main/{id}', 'PouffesAjaxController@updateIsMain');

// rout front
Route::get('pouffes', 'PouffesFrontController@index');
Route::get('pouffes/{code}', 'PouffesFrontController@show')->name('pouffes.show');

/* ******** } Pouffes ************** */

/* ******** Design { ************** */
Route::get('adm_design/order', 'DesignController@indexOrder')->name('design.order');
Route::resource('adm_design', 'DesignController', ['except' => 'show']);
Route::put('adm_designpostactive/{id}', 'DesignAjaxController@updateActive');
Route::put('adm_designpostis_menu/{id}', 'DesignAjaxController@updateIsMenu');
/* ******** } Design ************** */

/* ******** Main { ************** */
Route::get('adm_main/order', 'MainController@indexOrder')->name('main.order');
Route::resource('adm_main', 'MainController', ['except' => 'show']);
Route::put('adm_mainpostactive/{id}', 'MainAjaxController@updateActive');
Route::put('adm_mainpostis_menu/{id}', 'MainAjaxController@updateIsMenu');
/* ******** } Main ************** */

Route::put('delete-image/{id}', 'ImagesProjectController@destroy');

//mail
Route::post('/send.json', 'HomeController@postSend');

// Roles
Route::get('roles', 'RoleController@edit');
Route::post('roles', 'RoleController@update');

// Users
Route::get('user/sort/{role?}', 'UserController@index');
Route::get('user/blog-report', 'UserController@blogReport')->name('user.blog.report');
Route::resource('user', 'UserController', ['except' => 'index']);
Route::put('uservalid/{id}', 'UserAjaxController@valid');
Route::put('userseen/{user}', 'UserAjaxController@updateSeen');

// Authentication 
Auth::routes();

// Email confirmation 
Route::get('resend', 'Auth\RegisterController@resend');
Route::get('confirm/{token}', 'Auth\RegisterController@confirm');

// Notifications
Route::get('notifications/{user}', 'NotificationController@index');
Route::put('notifications/{notification}', 'NotificationController@update');

/*

// Comment
Route::resource('comment', 'CommentController', [
    'except' => ['create', 'show', 'update']
]);
Route::put('comment/{comment}', 'CommentAjaxController@update')->name('comment.update');
Route::put('commentseen/{id}', 'CommentAjaxController@updateSeen');

// Contact
Route::resource('contact', 'ContactController', ['except' => ['show', 'edit']]);

*/