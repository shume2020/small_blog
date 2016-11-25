@extends('layouts.admin')



@section('content')
    <div class="container">

            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Searched Post details</h2>
                <table class="table bg-info" style="width: 80%">
                    <thead>
                    <tr>
                        {{--<th>Post ID</th>--}}
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created by</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $post)
                        <tr>


                            <td><a href="{{route('home.post',$post->id)}}">{{str_limit($post->title,15)}}</a></td>
                            <td>{{str_limit($post->body,20)}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->user->email}}</td>
                            <td>{{$post->user->role->name}}</td>
                           <td>{{$post->category->name}}</td>
                            <td>
                                <img height="10" width="30" src="{{$post->user->photo? URL::to('/images/' .$post->user->photo->file):URL::to('/images/1478243356sample_01.jpg')}}" alt="" class="img-responsive img-rounded">
                            </td>
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
                        <h4 STYLE="text-align: left; font-style: oblique;color: #2e6da4">{{$message}}</h4>
                        {{--{{$message}}--}}
                    @endif


@endsection
