<?php

namespace App\Http\Controllers;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AdminMediasController extends Controller
{
    //

    public function index(){


        $photos=Photo::orderBy('created_at','desc')->paginate(5);

            return view('admin.media.index',compact('photos'));
        }
    public function create(){



            return view('admin.media.create');

            }

    public function store(Request $request){

        $file = $request->file('file');
        $name= time().$file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]);


      }
    public function destroy($id)
        {

        $photo = Photo::findOrFail($id);
        //unlink(public_path().$photo->name);
        $photo->delete();


        return redirect('/admin/media');
        }
    public function show($id)
       {
        $file = public_path('images/'.$id);
        return response()->download($file);
        ob_flush();
        flush();
      }

    public function update(){

     }
    public function getDownload($filename){

        Session::flash('media_downloded','The media has been downloaded');
        $entry= Photo::where('file','=',$filename)->firstOrFail();
        $path= public_path()."/images/".$entry->file;
        return response()->download($path);
              //       return response()->download(public_path()."/images/1477981407image_1.jpg");(used download single picture)
      }
    public function getTimms(){
        // Carbon testing not
        // not related with the progrram

        $x = Carbon::now()->addDays(4)->diffForHumans();
        $y = Carbon::createFromDate(1987,07,12)->age.'<br>';
        $z= $x+ $y.'<br>';

        //$x= Carbon::setTestNow(Carbon::createFromDate(2000, 1, 1));
        echo $x,$y, $z;
     }


 }
