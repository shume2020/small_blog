@extends('layouts.layouts')



@section('content')
    <div class="container">
        @if(Auth::check())
            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h4>Searched Post details</h4>
                <table class="table tab-pane">
                    <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created by</th>
                        <th>Category</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            {{--<td><a href=""> View Post!</a>  </td>--}}

                            <td><a href="{{route('home.post',$post->id)}}">{{$post->title}}</a></td>
                            <td>{{str_limit($post->body,50)}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>{{$post->updated_at->diffForHumans()}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$details->render()}}

                    </div>
                    @else
                        <h4 STYLE="text-align: right; font-style: oblique;color: #2e6da4">{{$message}}</h4>
                        {{--{{$message}}--}}
                    @endif
                    @else
                        <h4 class="bg-warning pull-right" style="font-style: italic">Please login first</h4>
                    @endif



                    <section style="    margin-left: -100px">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="left-sidebar">
                                        @include('shared.sidebar')
                                    </div>
                                </div>

                                <div class="col-sm-9 padding-right">
                                    <div class="features_items"><!--features_items-->
                                        <h2 class="title text-center">Company Advertisement</h2>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="images/services/1.png" alt="" />
                                                        <h2>6</h2>
                                                        <p>WELCOME TO THESE PAGE</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>6</h2>
                                                            <p>WELCOME TO THESE PAGE</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>contact us</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>Services</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="images/services/2.png" alt="" />
                                                        <h2>6</h2>
                                                        <p>WELCOME TO THESE PAGE</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>6</h2>
                                                            <p>WELCOME TO THESE PAGE</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                        </div>
                                                    </div>
                                                    <img src="" class="new" alt="" />
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>contact us</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>Services</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="images/services/3.jpeg" alt="" />
                                                        <h2>6</h2>
                                                        <p>WELCOME TO THESE PAGE</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <div class="overlay-content">
                                                            <h2>6</h2>
                                                            <p>WELCOME TO THESE PAGE</p>
                                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-coffee"></i>Read more..</a>
                                                        </div>
                                                    </div>
                                                    <img src="" class="new" alt="" />
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>contact us</a></li>
                                                        <li><a href="#"><i class="fa fa-plus-square"></i>Services</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--features_items-->




                                </div>
                            </div>
                        </div>
                    </section>
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-10 col-md-offset-1">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">Welcome</div>--}}

    {{--<div class="panel-body">--}}
    {{--Your Application's Landing Page.--}}
    {{--Welcome wait until the admin authenticates--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
    {{--<!-- /.input-group -->--}}
    {{--</div>--}}
@endsection
