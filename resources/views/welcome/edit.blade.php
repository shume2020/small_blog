
@extends('layouts.layouts')

@section('content')
<div class="row">

    <div class="col-sm-9" style="background-color: white;width: 60%;padding-left: 5em;margin-left: 100px;align-self: center">


        <table class="table">
            <thead>
            <tr>
                <th>Related category name</th>
                <th>Post Title</th>

                <th>Author</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)


                @foreach($posts as $post)
                    <tr class="bg-info">
                        <td>{{$post->category->name}}<sup>
                            @if($post->created_at > \Carbon\Carbon::now()->subHours(4))
                                <i style="color: red;padding-right: 5em;align-self: center">latest</i>
                            @endif
                            </sup>
                        </td>
                        <td><a href='{{route('home.post',$post->id)}}'> <span class="pull-left color bg-primary"></span>{{str_limit($post->title,20)}} <tab>   </tab></a>
                            {{--<p>  {{$post->category->name}}</p>--}}
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{str_limit($post->created_at->diffForHumans(),10)}}

                        </td>

                    </tr>
                @endforeach
            @else

                <p>There is no post in the current category!</p>
            @endif

            </tbody>
        </table>




    </div>
    <div class="col-sm-3 col-sm-offset-5" >


<h5>Click on the links to see the full post!</h5>





    </div>



</div>




    @endsection