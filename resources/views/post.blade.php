@extends('layouts.layout2')
<body style=" margin-left: 40px;">

@section('content')


    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{URL::to('/images/' . $post->photo->file)}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{!! nl2br(e($post->body)) !!}</p>
    @if(\Illuminate\Support\Facades\Session::has('comment_message'))

        <p class="bg-info pull-right">{{session('comment_message')}}</p>



    @endif

    {{--<p class="lead">Catagory   <tab>  </tab>{{$post->category->name}}</p>--}}
    <hr>



    <!-- Blog Comments -->

    @if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="author" value="{{$post->user->name}}">
           
            <div class="form-group">
            {!! Form::label('body','Body:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}


            </div>
            <div class="form-group">

            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

            </div>
              {!! Form::close() !!}



    </div>
    @endif

    <hr>

    <!-- Posted Comments -->
    @if(count($comments)>0)
        @foreach($comments as $comment)

            <div class="media">
                     <a class="pull-left" href="#">
                     <img class="media-object" height="64" src={{URL::to('/images/' . $post->user->photo->file)}}>

                      </a>
                <div class="media-body">
                            <h4 class="media-heading">{{$comment->title}} By {{$comment->author}}
                                <small>{{$comment->updated_at}}</small>
                            </h4>
                            <p>{{$comment->body}}</p>

                        <!-- Nested Comment -->
                       @if(count($comment->replies)>0)

                           @foreach($comment->replies as $reply)

                              @if($reply->is_active==1)


                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" height="64" src={{URL::to('/images/' . $reply->photo->file)}}>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->title}} By {{$reply->author}}
                                            <small>{{$reply->updated_at}}</small>
                                        </h4>
                                      <p>{{$reply->body}}</p>
                                    </div>
                                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                                    <div class="form-group">
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        {!! Form::label('body','Body:') !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                                    </div>
                                    {!! Form::close() !!}



                                 </div>
                               @endif
                             @endforeach
                           @endif


                        <!-- End Nested Comment -->

                </div>
            </div>
        @endforeach
    @endif
@stop
</body>
@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");

        });



    </script>

@stop