<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', 'HomeController@index');
//Route::get('/admin/charts/chartjs', 'HomeController@store');
//Route::get('/admin/charts/chartjs','HomeController@store');
//Route::get('admin/media/{file}','AdminMediasController@get');
//Route::get('/home/about','HomeController@about')->name(about);
//Route::get('laracharts', 'ChartController@getLaraChart');
Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
//Route::get('/shows/{id}',['as'=>'home.post','uses'=>'AdminPostsController@shows']);
Route::group(['middleware'=>'admin'], function (){

    Route::get('/download', 'AdminMediasController@getDownload');
    Route::get('/admin/checktime', 'AdminMediasController@getTimms');
    //Route::get('laracharts', 'ChartController@getLaraChart');
    Route::get('/admin',function (){
        return view('admin.index') ;


    });

    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');
    //Route::resource('admin/charts/chartjs', 'HomeController');



    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comments/replies','CommentRepliesController');
    Route::resource('admin/laracharts','ChartController');
   // Route::resource('admin/laracharts/laracharts','ChartController');


//Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediasController@store']);

});
//Route::get('admin/reports/daily', 'ReportsController@daily');
Route::group(['middleware'=>'auth'],function (){

   Route::post('comment/reply','CommentRepliesController@createReply');


    //Route::get('admin/laracharts', 'ChartController@getLaraChart');

});