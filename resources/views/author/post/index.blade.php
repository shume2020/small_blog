@extends('layouts.layouts')

@section('content')


    <h3 style="margin-left: 105px;"> <i>Posts!</i> </h3>

    @if(Session::has('Deleted_post'))
        <p class="bg-danger pull-right">{{session('Deleted_post')}}</p>

    @endif

    @if(Session::has('Updated_post'))
        @endif


        <p class="bg-success pull-right">{{session('Updated_post')}}</p>

    <table class="table" style="align-self: auto;margin: 20px;margin-left: 120px;font-size: 12px;padding:50px; width: 80%" >
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
                <tr class="success">
                    <td>{{$post->id}}</td>
                    <td> {{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name:'uncatagorized'}}</td>
                    <td><img height="50" src="{{ URL::to('/images/' . $post->photo->file)}}" alt="" class="src"></td>
                    {{--<td><img height="50" src="{{ URL::to('/images/' . $post->photo->file) }}" alt="" class="src"></td>--}}
                    <td><a href="{{route('author.post.edit',$post->id)}}" > {{str_limit($post->title,18)}}</a></td>
                    <td>{{str_limit($post->body,20)}}</td>
                    <td><a href="{{route('home.post',$post->id)}}"> View Post!</a>  </td>
                    <td><a href="{{route('author.comment.show',$post->id)}}">View Comments</a></td>
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
