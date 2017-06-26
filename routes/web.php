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

Route::get('/home', 'HomeController@index');

Route::resource('birth', 'BirthCertificateController');
Route::get('birth/show-application/{id}', ['as' => 'birth.application', 'uses' =>'BirthCertificateController@edit']);
Route::get('birth/create-for-existing/{person}', ['as' => 'birth.createExisting', 'uses' => 'BirthCertificateController@createFromInstance']);
Route::resource('people', 'PeopleController');
Route::post('birth/create-for-existing/{person}', ['as' => 'birth.create.Existing', 'uses' => 'BirthCertificateController@createFromExisting']);
Route::get('certificates/attacments/{cert}', ['as' => 'cert.attachments', 'uses' => 'BirthCertificateController@attachments']);
Route::get('attachment/download/uploads/{file}', function ($file) {
    return response()->download(storage_path('app/uploads/'.$file));
});
