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

        $posts=Post::all();
        return view('welcome',compact('posts'));
    }

    public function create()
    {

        $categories=Category::lists('name','id')->all();
        $posts= Service::all();
        return view('shared.sidebar',compact('posts','categories'));
    }

//    public function about(){
//
//
//        return view('blog/about');
//    }
//    public function service(){
//
//
//        return view('blog/service');
//    }
//    public function contact(){
//
//
//        return view('blog/contact');
//    }

//
//    public function store()
//    {
//        $viewer = View::select(DB::raw("SUM(numberofview) as count"))
//            ->orderBy("created_at")
//            ->groupBy(DB::raw("year(created_at)"))
//            ->get()->toArray();
//        $viewer = array_column($viewer, 'count');
//
//        $click = Click::select(DB::raw("SUM(numberofclick) as count"))
//            ->orderBy("created_at")
//            ->groupBy(DB::raw("year(created_at)"))
//            ->get()->toArray();
//        $click = array_column($click, 'count');
//
//        return view('admin.charts.chartjs')
//            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))
//            ->with('click',json_encode($click,JSON_NUMERIC_CHECK));
//    }
}
