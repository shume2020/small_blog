
<!DOCTYPE html>
<html>
<head>
    <title>@yield('page-title')</title>
    <link rel="icon" href="{!! asset('images/iride-ui-icon-pack-300x300.ico') !!}"/>
    <style>
        div.img {
            border: 1px solid #ccc;
        }

        div.img:hover {
            border: 1px solid #c7254e;
        }

        div.img img {
            width: 30%;
            height: auto;
        }

    </style>

</head>

@extends('layouts.layouts')

@section('content')

    <div style="width: 80%;margin: 100px;margin-top:1px;border: rgba(255, 193, 36, 0.68);background-color: #8c8c88" class="img">
    @if($photos)
    
    @foreach($photos as $photo)
                <a href="#"> <img width="300" class="active img" src="{{URL::to('/images/'.$photo->file)}} " alt="{{$photo->file}}" style="align-self: center;"></a>

        
        @endforeach
        @else
        <p>Unknown</p>
    @endif


    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-5">
        {{$photos->render()}}
        </div>
    </div>
@endsection