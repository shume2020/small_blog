<?php

use App\Comment;
use App\Photo;
use App\Post;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/',function (){
//   $posts=Post::all();
//    return view('welcome',compact('posts'));
//
//});
Route::get('/service',function (){

    $users=Post::paginate(10);
    return view('service',compact('users'));

});



//Contact us route

Route::get('contact',['as'=>'contact','uses'=>'AboutController@create']);
Route::post('contact',['as'=>'contact_store','uses'=>'AboutController@store']);

//Route::any('/contact',function (){
//     $data= [
//         'to'=>Input::get('to'),
//         'from'=>Input::get('from'),
//         'subject'=> Input::get('subject'),
//         'body'=> Input::get('body')
//     ] ;
//
////        $to=Input::get('to');
////        $from= Input::get('from');
////        $subject= Input::get('subject');
////        $body= Input::get('body');
//
//
//    Mail::send('contact', $data, function ($message) {
//
//        $message->to('to', 'shumex')->subject('subject');
//
//    });
//     return view('contact');
////
//});



// sending email directly
// Route::get('/mail',function () {
//
//     $data = [
//
//         'title' => 'The bset student that I hope',
//         'content' => 'Please attend the laravlel tutorial in this link https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel/learn/v4/t/lecture/4960684'
//
//     ];
//
//
//     Mail::send('contact', $data, function ($message) {
//
//         $message->to('shume98@gmail.com', 'shumex')->subject('Hey there');
//
//     });
//     //return view('contact',compact('data'));
//
// });

//Search closure function for the general search

Route::any('/posts',function(){
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
        return view('author.search')->withDetails($post)->withQuery ( $q );
    else
        return view ('author.search')->withMessage('No Details found. Try to search again !');
});

//Search for admin posts

Route::any('/post',function(){
    $q = Input::get ( 'q' );
    $post = Post::whereHas('category',function ($query) use($q){
           $query->where('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');

    })->orWhere('title','LIKE','%'.$q.'%')
        ->orWhere('body','LIKE','%'.$q.'%')
        ->orWhere('user_id','LIKE','%'.$q.'%')
        ->orWhere('category_id','LIKE','%'.$q.'%')
        ->orWhere('created_at','LIKE','%'.$q.'%')
        ->orWhere('updated_at','LIKE','%'.$q.'%')
//        ->orWhere('post()->category->name','LIKE','%'.$q.'%')
        ->paginate(6);


    if(count($post))
        return view('admin.posts.search')->withDetails($post)->withQuery ( $q );
    else
        return view ('admin.posts.search')->withMessage('No Details found. Try to search again !');
});
//Search for admin users
Route::any('/users',function(){
    $q = Input::get ( 'q' );
    $users = User::whereHas('role',function ($query) use ($q){

        $query->where('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');
            })->orwhere('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->paginate(10);
       // $roles = Role::where('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');
        // $user2=  $users
        if(count($users))
            return view('admin.users.welcome2')->withDetails($users)->withQuery ( $q );
        else
            return view ('admin.users.welcome2')->withMessage('No Details found. Try to search again !');

});
//common search
//Route::any('/allsearch',function(){
//    $q = Input::get ( 'q' );
//    $post = Post::whereHas('category',function ($query) use($q){
//        $query->where('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');
//
//    })->orWhere('title','LIKE','%'.$q.'%')
//        ->orWhere('body','LIKE','%'.$q.'%')
//        ->orWhere('user_id','LIKE','%'.$q.'%')
//        ->orWhere('category_id','LIKE','%'.$q.'%')
//        ->orWhere('created_at','LIKE','%'.$q.'%')
//        ->orWhere('updated_at','LIKE','%'.$q.'%')
////        ->orWhere('post()->category->name','LIKE','%'.$q.'%')
//        ->paginate(6);
//
//
//    if(count($post))
//        return view('admin.posts.search')->withDetails($post)->withQuery ( $q );
//    else
//        return view ('admin.posts.search')->withMessage('No Details found. Try to search again !');
//});

//all posts
Route::any('/allsearch',function(){

    $q = Input::get ( 'q' );
    $post = Post::whereHas('user',function ($query) use($q){
        $query->where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%');
    })->orWhereHas('category',function ($query) use($q){
        $query->where('name','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');

       })->orWhereHas('photo',function ($query) use($q){
        $query->where('file','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%');
    })
        ->orWhere('title','LIKE','%'.$q.'%')
        ->orWhere('body','LIKE','%'.$q.'%')
        ->orWhere('user_id','LIKE','%'.$q.'%')
        ->orWhere('category_id','LIKE','%'.$q.'%')
        ->orWhere('created_at','LIKE','%'.$q.'%')
        ->orWhere('updated_at','LIKE','%'.$q.'%')
        ->orderBy('updated_at','desc')
        ->paginate(6);


    if(count($post))
        return view('admin.search')->withDetails($post)->withQuery ( $q );
    else
        return view ('admin.search')->withMessage('No Details found. Try to search again !');
});


//    $q = Input::get ( 'q' );
//    $post= Post::where('title','LIKE','%'.$q.'%')->get();
//    $user = User::where('name', 'LIKE','%'.$q.'%')->get();
//    $photo = Photo::where('file', 'LIKE','%'.$q.'%')->get();
//    $result=array_merge($post->toArray(),$user->toArray(),$photo->toArray());
////    $result->paginate(10);
//
//
////    $users = Comment::where('body','LIKE','%'.$q.'%')
////          ->union($post)
////          ->union($user)
////          ->union($photo)
////         ->paginate(5);
//
//    if(count($result))
//        return view('admin.search')->withDetails($result)->withQuery ( $q );
//    else
//        return view ('admin.search')->withMessage('No Details found. Try to search again !');
//
//});
//Search for admin media
Route::any('/media',function(){
    $q = Input::get ( 'q' );
    $photos =Photo::where('file','LIKE','%'.$q.'%')->orWhere('id','LIKE','%'.$q.'%')->orWhere('created_at','LIKE','%'.$q.'%')->orWhere('updated_at','LIKE','%'.$q.'%')->paginate(10);

    if(count($photos))
        return view('admin.media.welcome3')->withDetails($photos)->withQuery ( $q );
    else
        return view ('admin.media.welcome3')->withMessage('No Details found. Try to search again !');
});

Route::auth();
//Route::get('/admin/users',['as'=>'admin.search','uses'=>'AdminUsersController@search']);

Route::get('/home', 'HomeController@index');
//Route::get('/admin/users',['as'=>'admin.search','uses'=>'AdminUsersController@search']);

Route::group(['middleware'=>'admin'], function (){

    Route::get('/download', 'AdminMediasController@getDownload');
    Route::get('/admin/checktime', 'AdminMediasController@getTimms');
    //Route::get('laracharts', 'ChartController@getLaraChart');
    Route::get('/admin',['as'=>'admin.index','uses'=>'AdminUsersController@directed']);



    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');
    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comments/replies','CommentRepliesController');
    Route::resource('admin/laracharts','ChartController');
});

    Route::resource('queries','QueryController');
    Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);
Route::group(['middleware'=>'auth'],function (){
   Route::resource('author/post','AuthorPostsController');
   Route::resource('author/comment','AuthorCommentsController');
   Route::resource('author/comment/replies','AuthorRepliesController');

    Route::post('comment/reply','CommentRepliesController@createReply');

});