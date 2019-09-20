<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/fbcontent/getFbcontentsApi/{typeid}/{id}/{page}','FbcontentController@getFbcontentsApiAdmin')->middleware('cors');
Route::post('/fbcontent/getFbcontentsApi','FbcontentController@getFbcontentsApi');
Route::post('/fbcontent/storeApi','FbcontentController@storeApi');
Route::post('/image/uploadApi', 'ImageController@uploadImgFileApi');
Route::get('/user/searchByName/{name}','UserController@searchUserName')->middleware('cors');
Route::get('/user/showFbs/{typeid}/{page}','UserController@showFbs')->middleware('cors');
Route::get('/user/searchFbs/{typeid}/{keyword}/{page}','UserController@searchFbs')->middleware('cors');
Route::get('/user/getReplyCounts/{name}','UserController@getReplyCounts')->middleware('cors');
Route::get('/user/getTypeidsByName/{name}','UserController@getTypeidsByName')->middleware('cors');
Route::get('/notice/getShowtop/{typeid}','NoticeController@getShowtop')->middleware('cors');
Route::get('/notice/getNoticeList/{typeid}','NoticeController@getNoticeList')->middleware('cors');
Route::get('/notice/getNoticeInfo/{id}','NoticeController@getNoticeInfo')->middleware('cors');
Route::get('/fbcontent/delContent/{id}','FbcontentController@delContent')->middleware('cors');
