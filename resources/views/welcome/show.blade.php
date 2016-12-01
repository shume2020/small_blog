@extends('layouts.layouts')
@section('content')
@if($posts)
    <table class="table" style="width: 70%; margin-left: 150px">
    <thead>
    <tr>
        <th>Category</th>
        <th>Post title[Click on the links to read]</th>
        <th>Body highlight</th>
        <th>created by</th>
    </tr>
    </thead>
    @foreach($posts as $post)


            <tbody>
              <tr class="bg-info">
                  <td>{{$post->category->name}}</td>
                  <td><a href="{{route('home.post',$post->id)}}">{{$post->title}}</a>  <i style="color: #0083C9;"> ...... {{$post->created_at->diffForHumans()}}</i></td>
                <td>{{str_limit($post->body,30)}}</td>
                <td>{{$post->user->name}}</td>
              </tr>




        @endforeach
        </table>
    @endif

    @endsection