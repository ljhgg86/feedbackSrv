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

Route::get('/fbcontent/getFbcontentsApi/{id}/{page}','FbcontentController@getFbcontentsApiAdmin')->middleware('cors');
Route::post('/fbcontent/getFbcontentsApi','FbcontentController@getFbcontentsApi');
Route::post('/fbcontent/storeApi','FbcontentController@storeApi');
Route::post('/image/uploadApi', 'ImageController@uploadImgFileApi');
Route::get('/user/searchByName/{name}','UserController@searchUserName')->middleware('cors');
Route::get('/user/showFbs/{page}','UserController@showFbs')->middleware('cors');
Route::get('/user/searchFbs/{keyword}/{page}','UserController@searchFbs')->middleware('cors');
Route::get('/user/getReplyCounts/{name}','UserController@getReplyCounts')->middleware('cors');
Route::get('/notice/getShowtop','NoticeController@getShowtop')->middleware('cors');
Route::get('/notice/getNoticeList','NoticeController@getNoticeList')->middleware('cors');
Route::get('/notice/getNoticeInfo/{id}','NoticeController@getNoticeInfo')->middleware('cors');
Route::get('/fbcontent/delContent/{id}','FbcontentController@delContent')->middleware('cors');