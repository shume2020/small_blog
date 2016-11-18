<?php

use App\Post;
use App\User;
use Illuminate\Support\Facades\Input;

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
Route::get('/',function (){
   $posts=Post::all();
    return view('welcome',compact('posts'));

});

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $post = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->orWhere('user_id','LIKE','%'.$q.'%')->orWhere('category_id','LIKE','%'.$q.'%')->paginate(3);
    $users = User::where('name','LIKE','%'.$q.'%')->orWhere('role_id','LIKE','%'.$q.'%')->orWhere('photo_id','LIKE','%'.$q.'%')->paginate(3);

    if(count($post))
        return view('welcome')->withDetails($post,$users)->withQuery ( $q );
    else
        return view ('welcome')->withMessage('No Details found. Try to search again !');
});
Route::auth();

Route::get('/home', 'HomeController@index');
//Route::get('/admin/charts/chartjs', 'HomeController@store');
//Route::get('/admin/charts/chartjs','HomeController@store');
//Route::get('admin/media/{file}','AdminMediasController@get');
//Route::get('/home/about','HomeController@about')->name(about);
//Route::get('laracharts', 'ChartController@getLaraChart');


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

    Route::resource('queries','QueryController');
    Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
//    Route::get('/shows/{id}',['as'=>'home.post','uses'=>'AdminPostsController@shows']);

//Route::get('admin/reports/daily', 'ReportsController@daily');
Route::group(['middleware'=>'auth'],function (){

   Route::post('comment/reply','CommentRepliesController@createReply');

    //Route::get('admin/laracharts', 'ChartController@getLaraChart');

});