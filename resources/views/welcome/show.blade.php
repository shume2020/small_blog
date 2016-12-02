@extends('layouts.layouts')
@section('content')
@if($posts)
    <table class="table" style="width: 70%; margin-left: 150px;">
    <thead>
    <tr>
        <th>Category</th>
        <th>Post title[Click on the links to read]</th>
        <th>Body highlight</th>
        <th>Author</th>
    </tr>
    </thead>
    @foreach($posts as $post)


            <tbody>
              <tr class="bg-info" >
                  <td>{{$post->category->name}}</td>
                  <td><a href="{{route('home.post',$post->id)}}">{{$post->title}}</a>  <i style="color: #2ca02c;padding-right: 10em"> ...... {{$post->created_at->diffForHumans()}}
                  @if($post->created_at > \Carbon\Carbon::now()->subHours(4))
                      <span style="color: red;padding-right: 10em;"> latest </span>
                      @endif
                      </i></td>
                <td>{{str_limit($post->body,30)}}</td>
                <td>{{$post->user->name}}</td>
              </tr>




        @endforeach
        </table>
    @endif

    @endsection