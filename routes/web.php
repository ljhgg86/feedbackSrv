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
    Route::resource('user','UserController');
    Route::resource('role','RoleController');
    Route::post('upload/file', 'UploadController@uploadFile')->name('upload.file');
    Route::post('image/upload', 'ImageController@uploadImgFile')->name('image.upload');
});
Route::get('/auth/password', function (\Illuminate\Http\Request $request){
    // $http = new \GuzzleHttp\Client();

    // $response = $http->post('http://127.0.0.1:8000/oauth/token', [
    //     'form_params' => [
    //         'grant_type' => 'password',
    //         'client_id' => '2',
    //         'client_secret' => 'b8e0K6QDdrGv7yko6IBrrbGeHEhDDehKtHYtpjXB',
    //         'username' => 'admin',
    //         'password' => 'admin123',
    //         'scope' => '',
    //     ],
    // ]);

    // return json_decode((string)$response->getBody(), true);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/show/{id}', 'HomeController@show')->name('home.show');
// Route::get('/feedbackClt',function(){
//     return view('feedbackClt');
// });
