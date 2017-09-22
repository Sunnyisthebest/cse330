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

// Route::get('/story', function () {

//     $stories = DB::table('posts')->get();
   

//     return view('story.index', compact('stories'));
// });

Route::get('/home/{story}', function ($id) {
     
    $story = DB::table('posts')->find($id);

    return view('story.edit', compact('story'));
});

Route::get('/create', function () {


    return view('story.create');
});

Route::get('/changePWD', function () {


    return view('story.changePWD');
});

Route::post('/changePWD', 'UserController@update');

Route::post('/home', 'PostController@store');

Route::delete('/home/{story}', 'PostController@delete');

Route::post('/home/{story}', 'PostController@edit');
// Route::get('/story/{story}', function () {
//     $stories = DB::table('posts')->find($id);

//     return view('story.delete', compact('story'));
// });

 // Route::post('/Register', [
 //    'users'=>'UserController@postRegister',
 //    'as' =>'Register'
 //        ]);


 // Route::group(['middleware'=>['web']], function () {
 // });

// Route::get('/signup', 'RegistrationController@create');
// Route::get('/login', 'SessionController@create');

 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
