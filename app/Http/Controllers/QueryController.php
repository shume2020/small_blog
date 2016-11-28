<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class QueryController extends Controller
{
    //
    public function index()
    {
       $pots=Post::all();
        return view('queries.index',compact('pots'));
    }
}
