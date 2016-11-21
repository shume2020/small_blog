<?php

use App\Post;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/',function (){
//   $posts=Post::all();
//    return view('welcome',compact('posts'));
//
//});
Route::get('/service',function (){

    $users=Post::paginate(10);
    return view('service',compact('users'));

});
Route::get('/contact',function (){

    return view('contact');

});
 Route::get('/mail',function () {

     $data = [

         'title' => 'The bset student that I hope',
         'content' => 'Please attend the laravlel tutorial in this link https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel/learn/v4/t/lecture/4960684'

     ];


     Mail::send('contact', $data, function ($message) {

         $message->to('shume98@gmail.com', 'shumex')->subject('Hey there');

     });
     //return view('contact',compact('data'));

 });

Route::any('/',function(){
    $q = Input::get ( 'q' );
    $post = Post::where('title','LIKE','%'.$q.'%')
        ->orWhere('body','LIKE','%'.$q.'%')
        ->orWhere('user_id','LIKE','%'.$q.'%')
        ->orWhere('category_id','LIKE','%'.$q.'%')
        ->orWhere('created_at','LIKE','%'.$q.'%')
        ->orWhere('updated_at','LIKE','%'.$q.'%')
//        ->orWhere('post()->category->name','LIKE','%'.$q.'%')
        ->paginate(5);


    if(count($post))
        return view('welcome')->withDetails($post)->withQuery ( $q );
    else
        return view ('welcome')->withMessage('No Details found. Try to search again !');
});
Route::any('/admin/users',function(){
    $q = Input::get ( 'q' );
    $users = User::where('name','LIKE','%'.$q.'%')->orWhere('role_id','LIKE','%'.$q.'%')->orWhere('photo_id','LIKE','%'.$q.'%')->paginate(3);

    if(count($users))
        return view('welcome')->withDetails($users)->withQuery ( $q );
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

//    Route::resource('author')
   // Route::resource('admin/laracharts/laracharts','ChartController');



//Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediasController@store']);

});

    Route::resource('queries','QueryController');
    Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
//    Route::get('/shows/{id}',['as'=>'home.post','uses'=>'AdminPostsController@shows']);

//Route::get('admin/reports/daily', 'ReportsController@daily');
Route::group(['middleware'=>'auth'],function (){
   Route::resource('author/post','AuthorPostsController');
   Route::resource('author/comment','AuthorCommentsController');
   Route::resource('author/comment/replies','AuthorRepliesController');

    Route::post('comment/reply','CommentRepliesController@createReply');
//   Route::post('author/create',['as'=>'author.create','uses'=>'AuthorPostsController@createPost']);
    //Route::get('admin/laracharts', 'ChartController@getLaraChart');

});