<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorPostsController extends Controller
{
    //


    public function index()
        {
            //

            $posts= Post::orderBy('created_at','desc')->paginate(5);

            return view('author.post.index',compact('posts'));



        }
    public function store(PostsCreateRequest $request)
        {
            //

            $input=$request->all();
            $user=Auth::user();
            if($file=$request->file('photo_id')){

                $name=time().$file->getClientOriginalName();
                $file->move('images',$name);
                $photo=Photo::create(['file'=>$name]);
                $input['photo_id']=$photo->id;


            }
            $user->posts()->create($input);
            return redirect('/author/post');


        }
    public function create()
        {
            //

            $categories=Category::lists('name','id')->all();

            return view('author.post.create',compact('categories'));
        }

    public function edit($id)
        {
            //

            $post= Post::findOrFail($id);
            $categories=Category::lists('name','id')->all();
            return view('author.post.edit',compact('post','categories'));
        }
    public function update(Request $request, $id)
        {
            //

            Session::flash('Updated_post','The post has been updated.by'.Auth::user()->name);
            $post= Post::findOrFail($id);
            $input= $request->all();
            if($file= $request->file('photo_id')){

                $name= time() . $file->getClientOriginalName();
                $file->move('images',$name);

                $photo =Photo::create(['file'=>$name]);
                $input['photo_id']=$photo->id;
            }

            $post->update($input);
            return redirect('/author/post');

        }
    public function destroy($id)
        {
            //

            $post=Post::findOrFail($id)->delete();
            //unlink(public_path().$post->photo->file);

            Session::flash('Deleted_post','The user has been deleted');
            $post->delete();
            return redirect('/author/post');
        }
}
