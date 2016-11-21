@extends('layouts.layouts')

@section('content')


    @if(count($comments)>0)
        <h3 style="margin-left: 105px;"> <i>The comments Page!</i> </h3>


        <table class="table" style="align-self: auto;margin: 20px;margin-left: 120px;font-size: 12px;padding:50px; width: 80%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Owner</th>
                <th>Email</th>
                <th>Body</th>
                <th>created at</th>
                <th>Updated at</th>
                <th>View Posts</th>
                <th>Approve/Not</th>

                {{--<th>updated at</th>--}}
            </tr>
            </thead>
            <tbody>

            @foreach($comments as $comment)

                <tr class="success">
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{str_limit($comment->body,10)}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$comment->post? $comment->post->id:'no')}}"> View Post!</a>  </td>
                    {{--<td><a href="{{route('admin.comment.replies.show',$comment->id)}}" class="href">View Reply</a></td>--}}
                    <td>


                        @if($comment->is_active==1)
                            {!! Form::open(['method'=>'PATCH','action'=>['AuthorCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">

                                {!! Form::submit('Un-approve',['class'=>'btn btn-success']) !!}

                            </div>
                            {!! Form::close() !!}


                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['AuthorCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">

                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}

                            </div>
                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['AuthorCommentsController@destroy',$comment->id]]) !!}

                        <div class="form-group">

                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                        </div>
                        {!! Form::close() !!}


                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>


    @else

        <h1>No Comments</h1>
    @endif


@endsection