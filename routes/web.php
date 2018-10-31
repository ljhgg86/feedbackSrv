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
    return redirect()->route('home');
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('/fbcontent/getFbcontents','FbcontentController@getFbcontents')->name('fbcontent.getFbcontents');
    //Route::resource('fblist','FblistController');
    Route::resource('fbcontent','FbcontentController');
    Route::get('user/showAdmin','UserController@showAdmin')->name('user.showAdmin');
    Route::get('reset', 'UserController@getReset')->name('user.showReset');
    Route::post('reset', 'UserController@postReset')->name('user.reset');
    Route::get('user/createMB','UserController@createMB')->name('user.createMB');
    Route::post('user/updateMB','UserController@updateMB')->name('user.updateMB');
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::post('upload/file', 'UploadController@uploadFile')->name('upload.file');
    Route::post('image/upload', 'ImageController@uploadImgFile')->name('image.upload');
    Route::post('image/uploadApi', 'ImageController@uploadImgFileApi')->name('image.uploadApi');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/show/{id}', 'HomeController@show')->name('home.show');
