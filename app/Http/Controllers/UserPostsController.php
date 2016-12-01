<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\CountryUser;

//use App\Http\Requests;

class UserPostsController extends Controller
{
    //
    public function create()
    {
        $lavas = new Lavacharts; // See note below for Laravel

        $popularity = $lavas->DataTable();
        $data = CountryUser::select("name as 0", "total_users as 1")->get()->toArray();

        $popularity->addStringColumn('Country')
            ->addNumberColumn('Our Service Users')
            ->addRows($data);

        $lavas->GeoChart('Our Service Users', $popularity, ['titleTextStyle' => [
            'fontName' => 'Times',
            'fontColor' => '#eb6b2c'], 'title' => 'List of our service users in different countries',
            'legend' => ['position' => 'right']]);
        return view('welcome.create', compact('lavas'));
    }

    public function index()
    {
        $lava = new Lavacharts; // See note below for Laravel

        $popularity = $lava->DataTable();
        $data = CountryUser::select("name as 0", "total_users as 1")->get()->toArray();

        $popularity->addStringColumn('Country')
            ->addNumberColumn('Popularity')
            ->addRows($data);

        $lava->AreaChart('Popularity', $popularity, ['titleTextStyle' => [
            'fontName' => 'Times',
            'fontColor' => '#eb6b2c',
            'fontSize' => 14],
            'legend' => ['position' => 'right'],
            'enableRegionInteractivity' => true,
            'is3D' => true,
            'width' => 1000,
            'greenFrom' => 0,
            'greenTo' => 69,
            'yellowFrom' => 70,
            'yellowTo' => 89,
            'redFrom' => 90,
            'redTo' => 100,
            'blueFrom' => 101,
            'blueTo' => 110
//            'majorTicks' => [
//                'Safe',
//                'Critical'
            //]
        ]);

        return view('welcome.index', compact('lava', 'lavas'));
    }

    public function getphoto()
    {
    $photos=Photo::paginate(15);

        return view('welcome.photolist',compact('photos'));

    }

    public function show(){

        $posts=Post::findOrFail(1)->orderBy('created_at','desc')->get();
        return view('welcome.show',compact('posts'));

    }


}

