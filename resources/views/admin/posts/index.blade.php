@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-sm-6"> <h3>All posts</h3></div>

        <div class="col-sm-6">
            <div class="search_box pull-right">
                <form action="/post" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                               placeholder="Search Posts"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                 </button>
                                </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@if(Session::has('Updated_post'))
    <p class="bg-success pull-right">{{session('Updated_post')}}</p>
    @endif
    @if(Session::has('Deleted_post'))
        <p class="bg-danger ">{{session('Deleted_post')}}</p>

        @endif

<table class="table">
    <thead>
      <tr>
          <th>Id</th>
          <th>Owner</th>
          <th>Catagory Id</th>
          <th>Photo</th>
          <th>Title[click to edit]</th>
          <th>Body</th>
          <th>View Posts</th>
          <th>View Comments</th>
          <th>Created_at</th>
          <th>Updated_at</th>
      </tr>
    </thead>
    <tbody>
      @if($posts)

         @foreach($posts as $post)
          <tr class="bg-info">
              <td>{{$post->id}}</td>
              <td> {{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name:'uncatagorized'}}</td>
              <td><img height="50" src="{{ URL::to('/images/' . $post->photo->file)}}" alt="" class="src"></td>
              {{--<td><img height="50" src="{{ URL::to('/images/' . $post->photo->file) }}" alt="" class="src"></td>--}}
              <td><a href="{{route('admin.posts.edit',$post->id)}}" > {{str_limit($post->title,18)}}</a></td>
              <td>{{str_limit($post->body,20)}}</td>
              <td><a href="{{route('home.post',$post->id)}}"> View Post!</a>  </td>
              <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach


          @endif



    </tbody>
  </table>
<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
      {{$posts->render()}}

    </div>


</div>
    @endsection
