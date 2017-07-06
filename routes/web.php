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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('death', 'DeathCertificateController');
Route::resource('notifications', 'NotificationsController');
Route::resource('birth', 'BirthCertificateController');
Route::resource('marriage', 'MarriageCertificateController');
Route::get('birth/show-application/{id}', ['as' => 'birth.application', 'uses' => 'BirthCertificateController@edit']);
Route::get('death-certificate/show-application/{id}', ['as' => 'death.application', 'uses' => 'DeathCertificateController@edit']);
Route::get('marriage/show-application/{id}', ['as' => 'marriage.application', 'uses' => 'MarriageCertificateController@edit']);
Route::get('birth/create-for-existing/{person}', ['as' => 'birth.createExisting', 'uses' => 'BirthCertificateController@createFromInstance']);
Route::resource('people', 'PeopleController');
Route::post('birth/create-for-existing/{person}', ['as' => 'birth.create.Existing', 'uses' => 'BirthCertificateController@createFromExisting']);
Route::get('certificates/attacments/{cert}', ['as' => 'cert.attachments', 'uses' => 'BirthCertificateController@attachments']);
Route::get('attachment/download/uploads/{file}', function ($file) {
    return response()->download(storage_path('app/uploads/'.$file));
});
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    Route::resource('users', 'UsersController');
    Route::get('users/block/{user}', ['as' => 'users.block', 'uses' => 'UsersController@block']);
    Route::get('users/unblock/{user}', ['as' => 'users.unblock', 'uses' => 'UsersController@unblock']);
});

Route::resource('notifications', 'NotificationsController');
Route::get('notifications/mark-as-read/all', ['as' => 'notifications.read', 'uses' =>'NotificationsController@markAsRead']);
Route::get('notifications/delete/{id}', ['as' => 'notifications.delete', 'uses' =>'NotificationsController@destroy']);
