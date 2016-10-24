@extends('layouts.admin')

@section('content')
    <h1> Admin Posts!</h1>

    @if(Session::has('Deleted_post'))
        <p class="bg-danger pull-right">{{session('Deleted_post')}}</p>

        @endif

<table class="table">
    <thead>
      <tr>
          <th>Id</th>
          <th>Owner</th>
          <th>Catagory Id</th>
          <th>Photo</th>
          <th>Title</th>
          <th>Body</th>
          <th>Created_at</th>
          <th>Updated_at</th>
      </tr>
    </thead>
    <tbody>
      @if($posts)

         @foreach($posts as $post)
          <tr class="success">
              <td>{{$post->id}}</td>
              <td> <a href="{{route('admin.posts.edit',$post->id)}}" class="hr"> {{$post->user->name}}</a></td>
              <td>{{$post->category?$post->category->name:'unctagorized'}}</td>
              <td><img height="50" src="{{$post->photo ? $post->photo->file:'/images/1477024514HD-White-Pigeon.jpg'}}" alt="" class="src"></td>
              <td>{{$post->title}}</td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach


          @endif



    </tbody>
  </table>

    @endsection
