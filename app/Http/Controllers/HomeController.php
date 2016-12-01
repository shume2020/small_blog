<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Post;
use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all();

        $posts=Post::findOrFail(1)->orderBy('created_at','desc')->groupBy('category_id')->paginate(8);

        return view('welcome',compact('posts','categories'));
    }

    public function create()
    {

        $categories=Category::findOrFail(1)->orderBy('created_at','desc');
        $posts= Service::all();
        return view('shared.sidebar',compact('posts','categories'));
    }

    public function sidebar(){

        $categories=Category::findOrFail(1)->orderBy('created_at','desc');

        $posts=Post::findOrFail(1)->orderBy('created_at','desc')->paginate(8);

        return view('shared.sidebar',compact('posts','categories'));

    }
}
